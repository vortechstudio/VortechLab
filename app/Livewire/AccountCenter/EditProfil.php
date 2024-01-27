<?php

namespace App\Livewire\AccountCenter;

use Exception;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfil extends Component
{
    use LivewireAlert, WithFileUploads;

    public $user;

    public $name;

    public $profil_img;

    public $header_img;

    public $signature;

    public function mount()
    {
        $apiUser = new \App\Services\VortechAPI\User();
        $this->user = $apiUser->info()->user;
        $this->name = $this->user->info->name;
        $this->signature = $this->user->info->social->signature;

    }

    public function save()
    {
        $apiUser = new \App\Services\VortechAPI\User();
        $this->validate([
            'name' => 'required',
            'profil_img' => 'nullable|image',
            'header_img' => 'nullable|image',
        ]);

        if (isset($this->profil_img)) {
            try {
                $profil_img = $this->profil_img;
                $profil_img->storePubliclyAs('user/'.$this->user->info->id.'/', 'profil.'.$profil_img->extension(), 'sftp');
            } catch (Exception $e) {
                \Log::emergency("Erreur lors de l'upload de l'image de profil : ".$e->getMessage(), [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);
                $this->alert('error', 'Erreur lors de l\'upload de l\'image de profil');
            }
        }

        if (isset($this->header_img)) {
            try {
                $header_img = $this->header_img;
                $header_img->storePubliclyAs('user/'.$this->user->info->id.'/', 'header_profil.'.$header_img->extension(), 'sftp');
            } catch (Exception $e) {
                \Log::emergency("Erreur lors de l'upload de l'image de profil : ".$e->getMessage(), [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);
                $this->alert('error', 'Erreur lors de l\'upload de l\'image de header');
            }
        }

        $update = $apiUser->update([
            'name' => $this->name,
            'signature' => $this->signature,
            'profil_img' => isset($this->profil_img) ? \Storage::disk('sftp')->url('user/'.$this->user->info->id.'/profil.'.$this->profil_img->extension()) : null,
            'header_img' => isset($this->header_img) ? \Storage::disk('sftp')->url('user/'.$this->user->info->id.'/header_profil.'.$this->header_img->extension()) : null,
        ]);

        if ($update->status == 'success') {
            $this->alert('success', 'Profil mis à jour');
            $this->redirectRoute('account-center.postList');
        } else {
            $this->alert('error', 'Erreur lors de la mise à jour du profil');
        }
    }

    #[Title('Profil')]
    public function render()
    {
        //dd($this->user);
        return view('livewire.account-center.edit-profil')
            ->layout('components.layouts.app');
    }
}
