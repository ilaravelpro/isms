<?php

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
