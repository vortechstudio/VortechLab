<?php

if (! function_exists('carbonify')) {
    function carbonify($date): \Carbon\Carbon
    {
        return \Carbon\Carbon::parse($date);
    }
}

if (! function_exists('storageToUrl')) {
    function storageToUrl(string $uri): string
    {
        return '//s3.'.config('app.domain').'/'.$uri;
    }
}
