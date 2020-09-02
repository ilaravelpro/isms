<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;


use Carbon\Carbon;
use iLaravel\iSMS\iApp\SMSMessage;

trait SendByPattern
{
    public static function sendByPattern(SMSMessage $model, $names, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPattern(...func_get_args());
    }

    public static function sendByPatternFast($type,$pattern, $names, $receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPatternFast(...func_get_args());
    }

    public function _sendByPattern(SMSMessage $model, $names)
    {
        return $this->gateway::sendByPattern(...func_get_args());
    }

    public function _sendByPatternFast($type,$pattern, $names, $receiver, $message)
    {
        return $this->gateway::sendByPatternFast(...func_get_args());
    }
}
