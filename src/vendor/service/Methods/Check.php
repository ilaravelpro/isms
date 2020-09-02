<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;

use iLaravel\iSMS\iApp\SMSMessage;

trait Check
{
    public static function check(SMSMessage $model, $gateway = null, $sender  = null)
    {
        return (new self($gateway, $sender))->_sendFast(...func_get_args());
    }

    public function _check(SMSMessage $model)
    {
        return $this->gateway::check($model, $this->sender);
    }
}
