<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 7:08 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;

trait FetchAll
{
    public static function fetchAll($page, $limit, $sender = null)
    {
        return (new self($sender))->_fetchAll(...func_get_args());
    }

    public function _fetchAll($page = 0, $limit = 10)
    {
        list($messages, $paginationInfo) = $this->client->fetchInbox($page, $limit);
        return $messages;
    }
}
