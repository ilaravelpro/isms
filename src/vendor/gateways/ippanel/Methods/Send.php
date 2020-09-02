<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


use Carbon\Carbon;
use iLaravel\iSMS\iApp\SMSMessage;

trait Send
{
    public static function sendFast($receiver, $message, $sender = null)
    {
        return (new self($sender))->_sendFast(...func_get_args());
    }

    public static function send(SMSMessage $model, $sender = null)
    {
        return (new self($sender))->_send(...func_get_args());
    }

    public function _send(SMSMessage $model)
    {
        $mid = $this->_sendBase( $model->receiver, $model->message ,$model->sender);
        $model->mid = $mid;
        $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->status = 'sending';
        $model->save();
        return true;
    }

    public function _sendFast($receiver, $message)
    {
        $model = new $this->model;
        $mid = $this->_sendBase($receiver, $message);
        $model->mid = $mid;
        $model->gate = $this->gate;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->save();
        return $this->_send($model);
    }

    public function _sendBase($receiver, $message, $sender = null)
    {
        return $this->client->send($sender ?: $this->sender, is_array($receiver) ? $receiver : [$receiver], $message);
    }
}
