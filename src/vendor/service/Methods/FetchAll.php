<?php


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
