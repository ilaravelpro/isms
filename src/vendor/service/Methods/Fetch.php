<?php


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
