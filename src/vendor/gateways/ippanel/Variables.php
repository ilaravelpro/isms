<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:58 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;


trait Variables
{
    public $model = null;
    public $gate = 'ippanel';

    public $token = null;
    public $client = null;
    public $sender = null;

    public $countries = [
        '98'
    ];
}
