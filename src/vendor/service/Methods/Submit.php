<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:27 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service\Methods;


trait Submit
{
    public static function submit($receiver, $message, $method = null, $type = null, $sender = null, $sent_at = null, $gateway = null)
    {
        return (new self($gateway, $sender))->_submit(...func_get_args());
    }

    public function _submit($receiver, $message, $method = null, $type = null, $sender = null, $sent_at = null)
    {
        return $this->gateway->_submit(...func_get_args());
    }
}
