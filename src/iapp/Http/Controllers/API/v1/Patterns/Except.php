<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 7:55 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\Patterns;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Except
{
    public function except(Request $request, $action)
    {
        switch ($action) {
            case 'update':
            case 'store':
                return ['sections'];
        }
    }
}
