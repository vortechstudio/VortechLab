<?php

namespace App\Services\VortechAPI\Social;

use App\Services\VortechAPI\Api;

class BlogService extends Api
{

    public function all()
    {
        return $this->get('blog');
    }

    public function search(array $query)
    {
        $blogs = $this->all();
        $blogs = collect($blogs);

        foreach ($query as $field => $value) {
            $blogs = $blogs->where($field, $value);
        }

        return $blogs;
    }

    public function info(string $slug)
    {
        $blogs = $this->all();
        $blogs = collect($blogs);

        return $blogs->where('slug', $slug)->first();
    }

}
