<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;

trait FetchAll
{
    public static function fetchAll($page, $limit)
    {
        return (new self())->_fetchAll(...func_get_args());
    }

    public function _fetchAll($page = 0, $limit = 10)
    {
        list($messages, $paginationInfo) = $this->client->fetchInbox($page, $limit);
        return $messages;
    }
}
