<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:58 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

return [
    'routes' => [
        'api' => [
            'status' => true
        ]
    ],
    'database' => [
        'migrations' => [
            'include' => true
        ],
    ],
    'providers' => [
        'ippanel' => [
            'name' => 'ippanel',
            'title' => 'IPPanle',
            'model' => \iLaravel\iSMS\Vendor\GateWays\IPPanel::class
        ],
        'sabapayamak' => [
            'name' => 'sabapayamak',
            'title' => 'SabaPayamak',
            'model' => \iLaravel\iSMS\Vendor\GateWays\SabaPayamak::class
        ],
        'kavenegar' => [
            'name' => 'kavenegar',
            'title' => 'Kavenegar',
            'model' => \iLaravel\iSMS\Vendor\GateWays\Kavenegar::class
        ],
        'telegram' => [
            'name' => 'telegram',
            'title' => 'Telegram',
            'model' => \iLaravel\iSMS\Vendor\GateWays\Telegram::class
        ]
    ]
];
?>
