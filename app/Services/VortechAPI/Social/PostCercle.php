<?php

namespace App\Services\VortechAPI\Social;

use App\Services\VortechAPI\Api;
use Illuminate\Http\Request;

class PostCercle extends Api
{

    public function tags()
    {
        try {
            return $this->get('posts/tags/all');
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function create(array $request)
    {
        try {
            return $this->post('posts', $request);
        }catch (\Exception $e) {
            \Log::emergency($e->getMessage(), [
                'request' => $request,
                "file" => "app/Services/VortechAPI/Social/PostCercle.php",
            ]);
            return $e->getMessage();
        }
    }

    public function all(array|null $request)
    {
        try {
            return $this->get('posts', $request);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(int $id)
    {
        try {
            return $this->delete('posts/'.$id);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
