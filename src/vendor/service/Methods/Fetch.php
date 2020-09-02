<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;


use iLaravel\iSMS\iApp\SMSMessage;

trait Fetch
{
    public static function fetch(SMSMessage $model, $gateway = null)
    {
        return (new self())->_fetch(...func_get_args());
    }

    public function _fetch(SMSMessage $model)
    {
        return $this->gateway::fetch($model);
    }
}
