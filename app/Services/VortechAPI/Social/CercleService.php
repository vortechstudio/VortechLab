<?php

namespace App\Services\VortechAPI\Social;

use App\Services\VortechAPI\Api;

class CercleService extends Api
{

    public function all()
    {
        return $this->get('cercles');
    }

    public function search(array $query)
    {
        $cercles = $this->all();
        $cercles = collect($cercles);

        foreach ($query as $field => $value) {
            $cercles = $cercles->where($field, $value);
        }

        return $cercles;
    }

    public function info(string $slug)
    {
        $cercles = $this->all();
        $cercles = collect($cercles);

        return $cercles->where('slug', $slug)->first();
    }

}
