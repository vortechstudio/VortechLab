<?php

namespace App\Livewire\Post;

use Alaouy\Youtube\Facades\Youtube;
use App\Services\VortechAPI\Social\CercleService;
use App\Services\VortechAPI\Social\PostCercle;
use App\Services\VortechAPI\User;
use Illuminate\Http\File;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Joelwmale\LivewireQuill\Traits\HasQuillEditor;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use RCerljenko\LaravelOpenAIModeration\Rules\OpenAIModeration;

class Create extends Component
{
    use HasQuillEditor, LivewireAlert, WithFileUploads;

    public $type;

    public $title = '';

    public $content = '';

    public $visibility = 'public';

    public $tags = '';

    public $cercle = 0;

    public $couverture;

    public $images = [];

    public $video_link = '';

    public $cercleList;

    public $tagsList;

    public $user;

    public $publish = false;

    public function mount()
    {
        $apiCercle = new CercleService();
        $apiPosts = new PostCercle();
        $apiUser = new User();
        $this->cercleList = $apiCercle->all();
        $this->tagsList = $apiPosts->tags();
        $this->user = \Session::has('user_uuid') ? $apiUser->info()->user->info : null;
        //dd($this->tagsList);
    }

    public function create()
    {
        match ($this->type) {
            'text' => $this->createText(),
            'image' => $this->createImage(),
            'video' => $this->createVideo(),
        };
    }

    public function contentChanged($editorId, $content)
    {
        // $editorId is the id use when you initiated the livewire component
        // $content is the raw text editor content

        // save to the local variable...
        $this->content = $content;
    }

    public function previewPost()
    {
        if ($this->type == 'text') {
            $this->validate([
                'title' => 'required|max:200',
                'content' => 'required',
                'cercle' => 'required',
            ]);
        } elseif ($this->type == 'images') {
            $this->validate([
                'title' => 'required|max:200',
                'images' => 'required',
                'cercle' => 'required',
            ]);
        } elseif ($this->type == 'video') {
            $this->validate([
                'title' => 'required|max:200',
                'video_link' => 'required',
                'cercle' => 'required',
            ]);
        }
        $this->redirectRoute('posts.preview', [
            'title' => $this->title,
            'content' => $this->content,
            'visibility' => $this->visibility,
            'tags' => $this->tags,
            'cercle' => $this->cercle,
            'couverture' => ! empty($this->couverture) ? $this->couverture->temporaryUrl() : null,
            'images' => $this->images,
            'video_link' => $this->video_link,
            'type' => $this->type,
            'user' => $this->user,
        ]);
    }

    #[Title("Création d'un poste")]
    public function render()
    {
        return view('livewire.post.create')
            ->layout('components.layouts.app');
    }

    private function createText()
    {
        $this->verifyContent();

        $this->validate([
            'title' => 'required|max:200',
            'content' => 'required',
            'visibility' => 'required',
            'cercle' => 'required',
        ]);

        $api = new PostCercle();
        $arrayFileImg = collect();
        if ($this->user == null) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }
        $response = $api->create([
            'title' => $this->title,
            'contenue' => $this->content,
            'visibility' => $this->visibility,
            'cercle' => $this->cercle,
            'tags' => $this->tags,
            'type' => 'text',
            'user_id' => $this->user->id,
            'status' => $this->publish,
        ]);

        if ($response && ! empty($this->couverture)) {
            $this->couverture->storePubliclyAs('posts/text/'.now()->year.'/'.now()->month.'/'.now()->day, $response->id.'.'.$this->couverture->extension(), 's3');
            $arrayFileImg->push([
                '/posts/text/'.now()->year.'/'.now()->month.'/'.now()->day.'/'.$response->id.'.'.$this->couverture->extension(),
            ]);
        }
        if ($response) {
            $this->alert('success', 'Poste créé avec succès');
            $this->redirectRoute('home');
        } else {
            $this->alert('error', 'Une erreur est survenue lors de la création du poste');
        }
    }

    public function createImage()
    {
        $this->verifyContent();
        $this->validate([
            'title' => 'required|max:200',
            'visibility' => 'required',
            'cercle' => 'required',
        ]);

        $api = new PostCercle();
        $content = empty($this->content) ? $this->defineImagesContent() : $this->content;
        $arrayFileImg = collect();
        if ($this->user == null) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }

        $response = $api->create([
            'title' => $this->title,
            'contenue' => $content,
            'visibility' => $this->visibility,
            'cercle' => $this->cercle,
            'tags' => $this->tags,
            'type' => 'image',
            'user_id' => $this->user->id,
            'img_file' => $arrayFileImg->toJson(),
            'status' => $this->publish,
        ]);

        foreach ($this->images as $k => $image) {
            \Storage::putFileAs('/posts/images/'.now()->year.'/'.now()->month.'/'.now()->day, new File($image['path']), $response->id.'-'.$k.'.'.$image['extension']);
            $arrayFileImg->push([
                '/posts/images/'.now()->year.'/'.now()->month.'/'.now()->day.'/'.$response->id.'-'.$k.'.'.$image['extension'],
            ]);
        }

        if ($response) {
            $this->alert('success', 'Poste créé avec succès');
            $this->redirectRoute('home');
        } else {
            $this->alert('error', 'Une erreur est survenue lors de la création du poste');
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

    public function createVideo()
    {
        $this->validate([
            'video_link' => 'required',
            'cercle' => 'required',
            'visibility' => 'required',
        ]);
        $videoId = Youtube::parseVidFromURL($this->video_link);
        $video = Youtube::getVideoInfo($videoId);

        $title = $video->snippet->title;
        $description = $video->snippet->description;
        $tags = $video->snippet->tags;

        $api = new PostCercle();
        if ($this->user == null) {
            $this->alert('error', 'Vous devez être connecté pour créer un poste');

            return;
        }
        $response = $api->create([
            'title' => $title,
            'contenue' => $description,
            'visibility' => $this->visibility,
            'cercle' => $this->cercle,
            'tags' => $tags,
            'type' => 'video',
            'user_id' => $this->user->id,
            'video_link' => $this->video_link,
            'status' => $this->publish,
        ]);

        if ($response) {
            $this->alert('success', 'Poste créé avec succès');
            $this->redirectRoute('home');
        } else {
            $this->alert('error', 'Une erreur est survenue lors de la création du poste');
        }
    }

    private function verifyContent()
    {
        $moderation = new OpenAIModeration();
        $apiUser = new User();

        $moderation->validate('title', $this->title, function ($apiUser) {
            $apiUser->post('user/avertissement', [
                'user_uuid' => \Session::get('user')[0]->info->uuid,
            ]);

            $this->alert('error', 'Votre titre contient des propos inappropriés');
        });

        $moderation->validate('content', $this->content, function ($apiUser) {
            $apiUser->post('user/avertissement', [
                'user_uuid' => \Session::get('user')[0]->info->uuid,
            ]);

            $this->alert('error', 'Votre contenu contient des propos inappropriés');
        });
    }
}
