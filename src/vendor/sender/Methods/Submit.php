<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:27 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;


trait Submit
{
    public function submit($receiver, $message, $method = null, $type = null, $sent_at = null, $sender = null)
    {
        $model = new $this->model;
        $model->gateway_id = $this->gateway->id;
        $model->type = $type ?: 'other';
        $model->method = $method ?: 'plain';
        $model->sender = $sender;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->sent_at = $sent_at;
        $model->save();
        $this->message = $model;
        return $this;
    }
}
