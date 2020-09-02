<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


use iLaravel\iSMS\iApp\SMSMessage;

trait Fetch
{
    public static function fetch(SMSMessage $model, $sender = null)
    {
        return (new self($sender))->_fetch(...func_get_args());
    }

    public function _fetch(SMSMessage $model)
    {
        $message = $this->client->getMessage($model->mid);
        $model->sent_at = $message->sent_at;
        $model->status = $message->status;
        $model->save();
        return $model;
    }
}
