<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:58 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;

use iLaravel\iSMS\iApp\SMSMessage;

trait Variables
{
    public $model = SMSMessage::class;
    public $gate = 'ippanel';

    public $token = null;
    public $client = null;
    public $sender = null;

    public $countries = [
        '98'
    ];
}
