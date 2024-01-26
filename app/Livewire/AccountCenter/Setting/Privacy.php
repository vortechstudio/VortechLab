<?php

namespace App\Livewire\AccountCenter\Setting;

use App\Services\VortechAPI\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Privacy extends Component
{
    use LivewireAlert;
    public $user;
    public $optin;
    public $notifin;

public function mount()
    {
        $apiUser = new User();
        $this->user = $apiUser->info()->user;
        $this->optin = $this->user->info->social->optin;
        $this->notifin = $this->user->info->social->notifin;

        //dd($this->optin, $this->notifin);
    }

    public function updateOptin()
    {
        $apiUser = new User();
        try {
            $apiUser->updateOptin($this->optin);
            $this->alert('success', 'Vos paramètres ont été mis à jour');
        }catch (\Exception $e){
            \Log::emergency($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            $this->alert('error', $e->getMessage());
        }
    }

    public function updateNotifin()
    {
        $apiUser = new User();
        try {
            $apiUser->updateNotifin($this->notifin);
            $this->alert('success', 'Vos paramètres ont été mis à jour');
        }catch (\Exception $e){
            \Log::emergency($e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            $this->alert('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.account-center.setting.privacy');
    }
}
