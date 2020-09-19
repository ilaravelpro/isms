<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:35 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service\Methods;


trait Fetch
{
    public static function fetch($model, $gateway = null)
    {
        return (new self())->_fetch(...func_get_args());
    }

    public function _fetch($model)
    {
        return $this->gateway->_fetch($model);
    }
}
