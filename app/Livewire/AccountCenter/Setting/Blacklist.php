<?php

namespace App\Livewire\AccountCenter\Setting;

use App\Services\VortechAPI\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Blacklist extends Component
{
    use LivewireAlert;

    public $user;

    public $blacklists;

    public function mount()
    {
        $apiUser = new User();
        $this->user = $apiUser->info()->user;
        $this->blacklists = collect($this->user->info->blockeds);
    }

    public function uban(int $id)
    {
        $apiUser = new User();
        try {
            $apiUser->uban($id);
            $this->alert('success', 'Vos paramètres ont été mis à jour');
        } catch (\Exception $e) {
            \Log::emergency($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            $this->alert('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.account-center.setting.blacklist');
    }
}
