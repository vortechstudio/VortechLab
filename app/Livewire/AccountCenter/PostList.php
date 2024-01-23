<?php

namespace App\Livewire\AccountCenter;

use Livewire\Attributes\Title;
use Livewire\Component;
use Session;

class PostList extends Component
{
    public $posts;
    public $user;

    public function mount()
    {
        $apiUser = new \App\Services\VortechAPI\User();
        $this->user = $apiUser->info()->user;
        $this->posts = $this->user->posts;
    }
    #[Title("Profil")]
    public function render()
    {
        //dd($this->user->info->uuid, Session::get('user_uuid'));
        return view('livewire.account-center.post-list')
            ->layout('components.layouts.app');
    }
}
