<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\Patterns;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'type',
                'title' => _t('name'),
                'type' => 'text'
            ],
            [
                'name' => 'title',
                'title' => _t('code'),
                'type' => 'text'
            ],
            [
                'name' => 'value',
                'title' => _t('provider'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }
}
