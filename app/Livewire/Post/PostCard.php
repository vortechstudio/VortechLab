<?php

namespace App\Livewire\Post;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PostCard extends Component
{
    use LivewireAlert, WithPagination;
    public $post;
    public $user;
    public $isLiked = false;
    public $countLikes = 0;

    protected $listeners = [
        'confirmeDeletedPost',
        'deletePost'
    ];

    public function mount($post, $user)
    {
        $this->post = $post;
        $this->user = $user;
        $this->isLiked = collect($this->post->likes)->where('user_id', $this->user->info->id)->count() > 0;
        $this->countLikes = count($this->post->likes);
    }

    public function deletePost($id)
    {
        $apiPost = new \App\Services\VortechAPI\Social\PostCercle();
        try {
            $posts = collect($apiPost->all([]))->where('id', $id)->first();
            if($posts->user_id != $this->user->info->id) {
                $this->alert('error', "Vous n'avez pas le droit de supprimer ce post");
                return;
            }

            $images = json_decode($posts->img_file);
            if(!empty($images)) {
                foreach ($images as $image) {
                    if(file_exists($image)) {
                        unlink($image);
                    }
                }
            }

            $apiPost->destroy($id);
            $this->alert('success', "Le post a été supprimé avec succès");
            $this->resetPage();
        }catch (\Exception $e){
            \Log::emergency($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
            $this->alert('error', "Une erreur s'est produite lors de la suppression du post: " . $e->getMessage());
        }
    }

    public function like()
    {
        try {
            if($this->post->user_id == $this->user->info->id) {
                $this->alert('error', "Vous ne pouvez pas liker votre propre post");
                return;
            }

            $apiPost = new \App\Services\VortechAPI\Social\PostCercle();
            $like = $apiPost->like($this->post->id);
            if($like->status == 'like') {
                $this->isLiked = true;
                $this->countLikes++;
                $this->alert('success', "Le like a été ajouté avec succès");
            } else {
                $this->isLiked = false;
                $this->countLikes--;
                $this->alert('success', "Le like a été supprimé avec succès");
            }

        }catch (\Exception $e) {
            \Log::emergency($e->getMessage(), ['file' => $e->getFile(), 'line' => $e->getLine()]);
            $this->alert('error', "Une erreur s'est produite lors de l'ajout du like: " . $e->getMessage());
        }
    }
    public function render()
    {
        //dd($this->post);
        return view('livewire.post.post-card');
    }
}
