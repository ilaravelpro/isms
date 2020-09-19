<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class WindyPointController extends Controller
{
    use Index,
        Show,
        WindyPoint\Rules,
        WindyPoint\RequestData,
        WindyPoint\Filters,
        WindyPoint\FilterWithLonLat,
        WindyPoint\FilterWithValidAt,
        WindyPoint\SearchQ;
}
