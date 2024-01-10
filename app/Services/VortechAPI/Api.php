<?php

namespace App\Services\VortechAPI;

use Illuminate\Support\Facades\Http;

class Api
{
    protected string $endpoint;
    public function __construct() {
        $this->endpoint = "https://auth.".config('app.domain').'/api/';
    }

    private function getResponse($request)
    {
        try {
            $response = $request->throw();
            if(request()->wantsJson()) {
                return $response->json();
            } else {
                return $response->object();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get(string $action, array $params = [])
    {
        $builder = http_build_query($params);
        $url = $this->endpoint.$action.'?'.$builder;

        $request = Http::withoutVerifying()
            ->get($url);

        return $this->getResponse($request);
    }

    public function post(string $action, array $params = [])
    {
        $url = $this->endpoint.$action;

        $request = Http::withoutVerifying()
            ->post($url, $params);

        return $this->getResponse($request);
    }

    public function put(string $action, array $params = [])
    {
        $url = $this->endpoint.$action;

        $request = Http::withoutVerifying()
            ->put($url, $params);

        return $this->getResponse($request);
    }

    public function delete(string $action, array $params = [])
    {
        $url = $this->endpoint.$action;

        $request = Http::withoutVerifying()
            ->delete($url, $params);

        return $this->getResponse($request);
    }

    public function patch(string $action, array $params = [])
    {
        $url = $this->endpoint.$action;

        $request = Http::withoutVerifying()
            ->patch($url, $params);

        return $this->getResponse($request);
    }
}
