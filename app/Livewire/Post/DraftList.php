<?php

namespace App\Livewire\Post;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DraftList extends Component
{
    use LivewireAlert;

    public $posts;

    public function mount()
    {
        $apiPost = new \App\Services\VortechAPI\Social\PostCercle();
        $this->posts = collect($apiPost->all([
            'user_id' => \Session::get('user')[0]->info->id,
            'status' => false,
        ]));
    }

    public function deleting(int $id)
    {
        $apiPost = new \App\Services\VortechAPI\Social\PostCercle();
        $apiPost->destroy($id);

        $this->alert('success', 'Post supprimé avec succès');
        $this->mount();
    }

    public function editing(int $id)
    {
        $this->redirectRoute('posts.draft.edit', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.post.draft-list', [
            'texte' => $this->posts->where('type', 'text'),
            'image' => $this->posts->where('type', 'image'),
            'video' => $this->posts->where('type', 'video'),
        ])
            ->layout('components.layouts.app');
    }
}
