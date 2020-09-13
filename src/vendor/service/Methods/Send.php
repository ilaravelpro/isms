<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;

use Carbon\Carbon;

trait Send
{
    public static function sendFast($receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendFast($receiver, $message);
    }

    public static function send($model, $method = 'plain', $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_send($model, $method);
    }

    public function _send($model, $method = 'plain')
    {
        $mid = $this->gateway->_send($model);
        $model->mid = $mid;
        $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->method = $method;
        $model->sender = $this->sender ? : $this->gateway->sender;
        $model->status = 'sending';
        if (isset($model->send_message)) unset($model->send_message);
        $model->save();
        return $model;
    }

    public function _sendFast($receiver, $message, $sender = null)
    {
        $model = new $this->model;
        $model->gate = $this->gateway->gate;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->sender = $sender ? : $this->gateway->sender;
        $model->save();
        return $this->_send($model);
    }

    public function _sendSmart($receiver, $message, $pattern = null)
    {
        $receiver = is_array($receiver) ? $receiver : [$receiver];
        $gateways = array_map(function ($gateway) {
            $class = new ("iLaravel\\iSMS\\Vendor\\GateWays\\$gateway");
            return ;
        }, $this->gateways);
        $receiver = array_map(function ($number) {
            $render = \iLaravel\Core\Vendor\iMobile::parse($number);
            return $render;
        },$receiver);
    }
}
