<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:35 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;

trait Check
{
    public function check($mid = null)
    {
        if ($this->message) $mid = $this->message;
        return $this->provider->check($mid instanceof $this->model? $mid->mid : $mid);
    }
}
