<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;


use Carbon\Carbon;

trait SendByPattern
{
    public static function sendByPattern($model, $names, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPattern(...func_get_args());
    }

    public static function sendByPatternFast($type,$pattern, $names, $receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPatternFast(...func_get_args());
    }

    public function _sendByPattern($model, $names)
    {
        if ($model->pattern->type == 'sender') {
            return $this->gateway::sendByPattern($model, $names);
        }else{
            $patterns = array_map(function($pattern) {return "{{$pattern}}";}, $names);
            $model->send_message = str_replace($patterns, $model->message, $model->pattern->value);
            return $this->_send($model);
        }
        return false;
    }

    public function _sendByPatternFast($type,$pattern, $names, $receiver, $message)
    {
        return $this->gateway::sendByPatternFast(...func_get_args());
    }
}
