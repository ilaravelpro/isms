<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;

use Carbon\Carbon;

trait Send
{
    public static function sendFast($receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendFast($receiver, $message);
    }

    public static function send($model, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_send($model);
    }

    public function _send($model)
    {
        $mid = $this->gateway->_send($model);
        $model->mid = $mid;
        $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->status = 'sending';
        $model->save();
        return $model;
    }

    public function _sendFast($receiver, $message)
    {
        $model = new $this->model;
        $model->gate = $this->gateway->gate;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->save();
        return $this->_send($model);
    }
}
