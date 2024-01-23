<?php

namespace App\Services\VortechAPI;

use Illuminate\Http\Request;

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
}
