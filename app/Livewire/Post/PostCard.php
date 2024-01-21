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

    protected $listeners = [
        'confirmeDeletedPost',
        'deletePost'
    ];

    public function mount($post, $user)
    {
        $this->post = $post;
        $this->user = $user;
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
    public function render()
    {
        //dd($this->all());
        return view('livewire.post.post-card', [
            "post" => $this->post,
        ]);
    }
}
