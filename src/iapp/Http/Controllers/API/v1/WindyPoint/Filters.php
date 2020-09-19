<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\WindyPoint;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $user = auth()->user();
        $filters = [];
        $current = [];
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'title' => _t('type'),
                'type' => 'text'
            ],
            [
                'name' => 'model',
                'title' => _t('model'),
                'type' => 'text'
            ],
            [
                'name' => 'registration',
                'title' => _t('registration'),
                'type' => 'text'
            ],
        ];
        $this->requestFilter($request, $model, $parent, $filters, $operators);
        if ($request->q) {
            $this->searchQ($request, $model, $parent);
            $current['q'] = $request->q;
        }
        $this->filterWithLonLat($request, $model, $parent, $filters, $operators);
        $this->filterWithValidAt($request, $model, $parent, $filters, $operators);
        return [$filters, $current, $operators];
    }
}
