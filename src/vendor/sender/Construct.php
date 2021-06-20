<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:31 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender;


trait Construct
{
    public function __construct($gateway = null)
    {
        $this->model = imodal('SMSMessage');
        $this->gateway = $gateway;
        $this->provider = new $gateway->vendor($gateway);
    }
}
