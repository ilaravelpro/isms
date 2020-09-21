<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 6:21 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;


trait Construct
{
    public function __construct($sender = null)
    {
        $this->model = imodal('ISMSMessage');
        $this->token = ipreference('isms.ippanel.key');
        $this->sender = $sender ? : ipreference('isms.ippanel.sender');
        $this->client = new \IPPanel\Client($this->token);
    }
}
