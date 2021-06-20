<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\Methods;


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
                'name' => 'name',
                'title' => _t('name'),
                'type' => 'text'
            ],
            [
                'name' => 'code',
                'title' => _t('code'),
                'type' => 'text'
            ],
            [
                'name' => 'provider',
                'title' => _t('provider'),
                'type' => 'text'
            ],
            [
                'name' => 'number',
                'title' => _t('number'),
                'type' => 'text'
            ],
            [
                'name' => 'number_pattern',
                'title' => _t('number_pattern'),
                'type' => 'text'
            ],
        ];
        return [$filters, [], $operators];
    }
}
