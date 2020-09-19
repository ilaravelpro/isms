<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:36 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


trait Fetch
{
    public static function fetch($model, $sender = null)
    {
        return (new self($sender))->_fetch(...func_get_args());
    }

    public function _fetch($model)
    {
        $message = $this->client->getMessage($model->mid);
        $model->sent_at = $message->sent_at;
        $model->status = $message->status;
        $model->save();
        return $model;
    }
}
