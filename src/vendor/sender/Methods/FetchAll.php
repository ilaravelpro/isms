<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:36 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;

trait FetchAll
{
    public function fetchAll($page = 0, $limit = 10)
    {
        return $this->provider->fetchAll($page, $limit);
    }
}
