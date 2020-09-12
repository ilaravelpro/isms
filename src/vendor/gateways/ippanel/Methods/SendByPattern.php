<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


trait SendByPattern
{
    public static function sendByPattern($model, $names, $sender = null)
    {
        return (new self($sender))->_sendByPattern(...func_get_args());
    }

    public function _sendByPattern($model)
    {
        return $this->client->sendPattern(
            $model->pattern->value,
            $model->sender ?: $this->sender, is_array($model->receiver) ? $model->receiver[0] : $model->receiver,
            $model->message
        );
    }
}
