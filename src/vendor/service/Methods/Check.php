<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:35 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service\Methods;

trait Check
{
    public static function check($model, $gateway = null)
    {
        return (new self($gateway))->_check(...func_get_args());
    }

    public function _check($model)
    {
        return $this->gateway->_check($model);
    }
}
