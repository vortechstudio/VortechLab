<?php

namespace App\Services\VortechAPI\Social;

use App\Services\VortechAPI\Api;
use Log;

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

    public function like(int $id)
    {

        try {
            return $this->post('posts/'.$id.'/like', [
                "user_id" => \Session::get('user')[0]->info->id,
            ]);
        } catch (\Exception $e) {
            Log::emergency($e->getMessage(), [
                'request' => $id,
                'file' => 'app/Services/VortechAPI/Social/PostCercle.php',
                'line' => $e->getLine(),
            ]);
            return $e->getMessage();
        }
    }

    public function unlike(int $id)
    {

        try {
            $post = collect($this->all([]))->where('id', $id)->first();
            return $this->post('posts/'.$id.'/unlike', [
                "user_id" => \Session::get('user')[0]->info->id,
                "likeable_type" => get_class($post),
                "id" => $post->id
            ]);
        } catch (\Exception $e) {
            Log::emergency($e->getMessage(), [
                'request' => $id,
                'file' => 'app/Services/VortechAPI/Social/PostCercle.php',
                'line' => $e->getLine(),
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
