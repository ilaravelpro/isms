<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\WindyPoint;

trait FilterWithLonLat
{
    public function filterWithLonLat($request, $model, $parent = null, $filters = [], $operators = [])
    {
        if (isset($request->lat) && isset($request->lon)){
            $request->validate([
                'lat' => explode('|', $this->rules($request, 'store', null, 'latitude')),
                'lon' => explode('|', $this->rules($request, 'store', null, 'longitude')),
            ]);
            $model->where('latitude', round($request->lat, 4))
                ->where('longitude', round($request->lon, 4));
        }
    }
}
