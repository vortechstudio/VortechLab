<?php

namespace App\Services\VortechAPI;

class User extends Api
{
    public function info()
    {
        return $this->get('user/profil', [
            'user_uuid' => \Session::get('user_uuid'),
        ]);
    }

    public function update(array $request)
    {
        //dd($request['profil_img']->getRealPath());
        return $this->put('user/profil', [
            'user_uuid' => \Session::get('user_uuid'),
            'name' => $request['name'],
            'signature' => $request['signature'],
            'profil_img' => $request['profil_img'],
            'header_img' => $request['header_img'],
        ]);
    }

    public function updateOptin($optin)
    {
        return $this->put('user/profil/optin', [
            'user_uuid' => \Session::get('user_uuid'),
            'optin' => $optin,
        ]);
    }

    public function updateNotifin($notifin)
    {
        return $this->put('user/profil/notifin', [
            'user_uuid' => \Session::get('user_uuid'),
            'notifin' => $notifin,
        ]);
    }

    public function logout()
    {
        return $this->delete('user/logout', [
            'user_uuid' => \Session::get('user_uuid'),
        ]);
    }

    public function ban($id)
    {
        return $this->post('user/ban', [
            'user_uuid' => \Session::get('user_uuid'),
            'user_blocked_id' => $id,
        ]);
    }

    public function uban($id)
    {
        return $this->delete('user/uban', [
            'user_uuid' => \Session::get('user_uuid'),
            'user_blocked_id' => $id,
        ]);
    }
}
