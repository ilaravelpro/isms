<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:36 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service\Methods;

trait FetchAll
{
    public static function fetchAll($page, $limit, $gateway = null)
    {
        return (new self($gateway))->_fetchAll(...func_get_args());
    }

    public function _fetchAll($page = 0, $limit = 10)
    {
        return $this->gateway->_fetchAll($page, $limit);
    }
}
