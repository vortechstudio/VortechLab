<?php

namespace App\Livewire\Component;

use App\Services\VortechAPI\User;
use Livewire\Component;

class Notification extends Component
{
    public $user;

    public function mount()
    {
        $userApi = new User();
        $this->user = $userApi->info();
    }
    public function render()
    {
        //dd($this->user);
        return view('livewire.component.notification');
    }
}
