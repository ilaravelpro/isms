<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service;


trait Variables
{
    public $model = null;

    public $gateway = null;
    public $gateways = [
        'ippanel' => 'IPPanel'
    ];
    public $sender = null;
}
