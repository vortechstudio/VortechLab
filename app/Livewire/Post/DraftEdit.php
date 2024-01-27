<?php

namespace App\Livewire\Post;

use Alaouy\Youtube\Facades\Youtube;
use App\Services\VortechAPI\Social\CercleService;
use App\Services\VortechAPI\Social\PostCercle;
use App\Services\VortechAPI\User;
use Illuminate\Http\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Joelwmale\LivewireQuill\Traits\HasQuillEditor;
use Livewire\Component;
use Livewire\WithFileUploads;
use RCerljenko\LaravelOpenAIModeration\Rules\OpenAIModeration;

class DraftEdit extends Component
{
    use HasQuillEditor, LivewireAlert, WithFileUploads;

    public $post;

    public $cercle;

    public $cercleList;

    public $tagsList;

    public $couverture;

    public $images = [];

    public $video_link = '';

    public $tags;

    public function mount(int $id)
    {
        $apiPost = new PostCercle();
        $apiCercle = new CercleService();
        $this->post = $apiPost->info($id)->data;
        $this->cercleList = $apiCercle->all();
        $this->tagsList = $apiPost->tags();
        //dd($this->post);
        $this->cercle = $this->post->cercles[0]->id;
        if ($this->post->type == 'image') {
            if (! empty($this->post->img_file)) {
                $this->images = json_decode($this->post->img_file, true);
            } else {
                $this->images = [];
            }
        }
        if ($this->post->type == 'video') {
            $this->video_link = $this->post->video_link;
        }
        if ($this->post->type == 'text') {
            if (! empty($this->post->img_file)) {
                $this->couverture = json_decode($this->post->img_file, true)[0];
            } else {
                $this->couverture = '';
            }
        }
        $this->tags = collect($this->post->tags)->pluck('tag')->toJson();
    }

    public function save()
    {
        match ($this->post->type) {
            'text' => $this->saveText(),
            'image' => $this->saveImage(),
            'video' => $this->saveVideo(),
        };
    }

    public function render()
    {
        return view('livewire.post.draft-edit');
    }

    private function saveText()
    {
        $this->verifyContent();
        $api = new PostCercle();
        $arrayFileImg = collect();
        if (! \Session::has('user')) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }

        $response = $api->update([
            'title' => $this->post->title,
            'contenue' => $this->post->content,
            'visibility' => $this->post->visibility,
            'cercle' => $this->cercle,
            'tags' => $this->tags,
            'type' => 'text',
            'status' => $this->post->status,
            'user_id' => \Session::get('user')[0]->info->id,
        ], $this->post->id);

        if ($response && ! empty($this->couverture)) {
            $this->couverture->storePubliclyAs('posts/text/'.now()->year.'/'.now()->month.'/'.now()->day, $response->id.'.'.$this->couverture->extension(), 's3');
            $arrayFileImg->push([
                \Storage::disk('s3')->url('posts/text/'.now()->year.'/'.now()->month.'/'.now()->day.'/'.$response->id.'.'.$this->couverture->extension()),
            ]);
        }

        if ($response) {
            $this->alert('success', 'Post modifié avec succès');
            $this->redirectRoute('posts.draft.list');
        } else {
            $this->alert('error', 'Une erreur est survenue');
        }
    }

    private function saveImage()
    {
        $this->verifyContent();
        $api = new PostCercle();
        $content = empty($this->content) ? $this->defineImagesContent() : $this->post->content;
        $arrayFileImg = collect();

        if (! \Session::has('user')) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }

        $response = $api->update([
            'title' => $this->post->title,
            'contenue' => $content,
            'visibility' => $this->post->visibility,
            'cercle' => $this->cercle,
            'tags' => $this->tags,
            'type' => 'image',
            'user_id' => \Session::get('user')[0]->info->id,
            'img_file' => null,
            'status' => $this->post->status,
        ], $this->post->id);

        foreach ($this->images as $k => $image) {
            \Storage::disk('s3')->putFileAs('/posts/images/'.now()->year.'/'.now()->month.'/'.now()->day, new File($image['path']), $response->id.'-'.$k.'.'.$image['extension'], 'public');
            $arrayFileImg->push([
                '/posts/images/'.now()->year.'/'.now()->month.'/'.now()->day.'/'.$response->id.'-'.$k.'.'.$image['extension'],
            ]);
        }

        $api->update([
            'img_file' => $arrayFileImg->toJson(),
        ], $this->post->id);

        if ($response) {
            $this->alert('success', 'Post modifié avec succès');
            $this->redirectRoute('posts.draft.list');
        } else {
            $this->alert('error', 'Une erreur est survenue');
        }
    }

    private function defineImagesContent(): string
    {
        $content = '';
        foreach ($this->images as $k => $image) {
            $content .= '<img src="'.$image['temporaryUrl'].'" alt="'.$image['name'].'" />';
        }

        return $content;
    }

    private function saveVideo()
    {
        $videoId = Youtube::parseVidFromURL($this->video_link);
        $video = Youtube::getVideoInfo($videoId);

        $title = $video->snippet->title;
        $description = $video->snippet->description;
        $tags = $video->snippet->tags;

        $api = new PostCercle();
        if (! \Session::has('user')) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }

        $response = $api->update([
            'title' => $title,
            'contenue' => $description,
            'visibility' => $this->post->visibility,
            'cercle' => $this->cercle,
            'tags' => $tags,
            'type' => 'video',
            'user_id' => \Session::get('user')[0]->info->id,
            'video_link' => $this->video_link,
            'status' => $this->post->status,
        ], $this->post->id);

        if ($response) {
            $this->alert('success', 'Post modifié avec succès');
            $this->redirectRoute('posts.draft.list');
        } else {
            $this->alert('error', 'Une erreur est survenue');
        }
    }

    private function verifyContent()
    {
        $moderation = new OpenAIModeration();
        $apiUser = new User();

        $moderation->validate('title', $this->post->title, function ($apiUser) {
            $apiUser->post('user/avertissement', [
                'user_uuid' => \Session::get('user')[0]->info->uuid,
            ]);

            $this->alert('error', 'Votre titre contient des propos inappropriés');
        });

        $moderation->validate('content', $this->post->content, function ($apiUser) {
            $apiUser->post('user/avertissement', [
                'user_uuid' => \Session::get('user')[0]->info->uuid,
            ]);

            $this->alert('error', 'Votre contenu contient des propos inappropriés');
        });
    }
}
