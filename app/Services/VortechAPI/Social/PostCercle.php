<?php

namespace App\Services\VortechAPI\Social;

use App\Services\VortechAPI\Api;

class PostCercle extends Api
{
    public function tags()
    {
        try {
            return $this->get('posts/tags/all');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(array $request)
    {
        try {
            return $this->post('posts', $request);
        } catch (\Exception $e) {
            \Log::emergency($e->getMessage(), [
                'request' => $request,
                'file' => 'app/Services/VortechAPI/Social/PostCercle.php',
            ]);

            return $e->getMessage();
        }
    }
}
