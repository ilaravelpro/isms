<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;

trait Send
{
    public static function send($model, $sender = null)
    {
        return (new self($sender))->_send($model);
    }

    public function _send($model)
    {
        return $this->client->send((string)($model->sender ?: $this->sender), (is_array($model->receiver) ? $model->receiver : [$model->receiver]), isset($model->send_message) && $model->send_message? $model->send_message : $model->message);
    }
}
