<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\WindyPoint;


trait SearchQ
{
    public function searchQ($request, $model, $parent)
    {
        $q = $request->q;
        $model->where(function ($query) use ($q) {
            $query->where('windy_points.latitude', 'LIKE', "%$q%")
                ->orWhere('windy_points.longitude', 'LIKE', "%$q%")
                ->orWhere('windy_points.model', 'LIKE', "%$q%");
        });
    }
}
