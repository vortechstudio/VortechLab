<?php

if (! function_exists('carbonify')) {
    function carbonify($date): \Carbon\Carbon
    {
        return \Carbon\Carbon::parse($date);
    }
}
