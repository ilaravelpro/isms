<?php

function isms_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function isms($key = null, $default = null)
{
    return iconfig('isms' . ($key ? ".$key" : ''), $default);
}
