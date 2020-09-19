<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:58 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

function isms_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function isms($key = null, $default = null)
{
    return iconfig('isms' . ($key ? ".$key" : ''), $default);
}
