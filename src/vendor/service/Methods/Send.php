<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;


use Carbon\Carbon;
use iLaravel\iSMS\iApp\SMSMessage;

trait Send
{
    public static function sendFast($receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendFast(...func_get_args());
    }

    public static function send(SMSMessage $model, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_send(...func_get_args());
    }

    public function _send(SMSMessage $model)
    {
        return $this->gateway::send(...func_get_args());
    }

    public function _sendFast($receiver, $message)
    {
        return $this->gateway::sendFast(...func_get_args());
    }
}
