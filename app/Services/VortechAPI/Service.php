<?php

namespace App\Services\VortechAPI;

class Service extends Api
{
    public function all()
    {
        return $this->get('services');
    }

    public function info(int $id)
    {
        $article = collect($this->all());

        return $article->where('id', $id)->first();
    }
}
