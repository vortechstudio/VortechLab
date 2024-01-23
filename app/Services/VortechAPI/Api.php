<?php

namespace App\Services\VortechAPI;

use Illuminate\Support\Facades\Http;

class Api
{
    protected string $endpoint;

    public function __construct()
    {
        $this->endpoint = 'https://auth.' . config('app.domain') . '/api/';
    }

    public function searching($terme, $category = null)
    {
        return $this->post('search', ['query' => $terme, 'category' => $category]);
    }

    private function getResponse($request)
    {
        try {
            $response = $request->throw();
            if (request()->wantsJson()) {
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
        $url = $this->endpoint . $action . '?' . $builder;

        $request = Http::withoutVerifying()
            ->get($url);

        return $this->getResponse($request);
    }

    public function post(string $action, array $params = [])
    {
        $url = $this->endpoint . $action;

        try {
            $request = Http::withoutVerifying()
                ->post($url, $params);
        } catch (\Exception $exception) {
            \Log::emergency($exception->getMessage(), [
                'request' => $params,
                'url' => $url,
            ]);

            return $exception->getMessage();
        }

        return $this->getResponse($request);
    }

    public function put(string $action, array $params = [])
    {
        $url = $this->endpoint . $action;

        $request = Http::withoutVerifying()
            ->put($url, $params);

        return $this->getResponse($request);
    }

    public function putWithFile(string $action, array $params = [], array $files = [])
    {
        $url = $this->endpoint . $action;

        $request = Http::withoutVerifying();

        if (!empty($params)) {
            $request = $request->asForm()->withBody(http_build_query($params), 'application/x-www-form-urlencoded');
        }

        foreach ($files as $key => $fileData) {
            if (is_array($fileData) && count($fileData) == 3) {
                $filePath = $fileData[0];
                $fileName = $fileData[1];
                $fileHandle = fopen($filePath, 'r');
                $request->attach($key, $fileHandle, $fileName);
            }
        }

        $response = $request->put($url);

        foreach ($files as $fileData) {
            if (is_array($fileData) && count($fileData) == 2) {
                fclose($fileData[0]);
            }
        }

        return $this->getResponse($response);
    }

    public function delete(string $action, array $params = [])
    {
        $url = $this->endpoint . $action;

        $request = Http::withoutVerifying()
            ->delete($url, $params);

        return $this->getResponse($request);
    }

    public function patch(string $action, array $params = [])
    {
        $url = $this->endpoint . $action;

        $request = Http::withoutVerifying()
            ->patch($url, $params);

        return $this->getResponse($request);
    }
}
