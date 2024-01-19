<?php

namespace App\Services\VortechAPI;

use App\Services\VortechAPI\Api;

class User extends Api
{
    public function info()
    {
        return $this->get('user/profil', [
            "user_uuid" => \Session::get('user_uuid')
        ]);
    }
}
