<?php

namespace App\Livewire\AccountCenter;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Session;

class PostList extends Component
{
    use WithPagination;
    public $posts;
    public $user;
    public $comments;
    public $limit = 5;

    public function mount()
    {
        $apiUser = new \App\Services\VortechAPI\User();
        $this->user = $apiUser->info()->user;
        $this->posts = collect($this->user->posts)->where('status', true);
        $this->comments = collect($this->user->comments);
        //dd($this->comments->take($this->limit));
    }

    public function loadMore()
    {
        $this->limit += 5;
    }

    #[Title("Profil")]
    public function render()
    {
        //dd($this->user->info->uuid, Session::get('user_uuid'));
        return view('livewire.account-center.post-list', [
            'posts' => $this->posts->take($this->limit),
            'comments' => $this->comments->take($this->limit),
        ])
            ->layout('components.layouts.app');
    }
}
