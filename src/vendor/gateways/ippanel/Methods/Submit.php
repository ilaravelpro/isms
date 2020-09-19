<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:26 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


use Carbon\Carbon;

trait Submit
{
    public static function submit($receiver, $message, $method = null, $type = null, $sender = null, $sent_at = null)
    {
        return (new self($sender))->_submit(...func_get_args());
    }

    public function _submit($receiver, $message, $method = null, $type = null, $sender = null, $sent_at = null)
    {
        $model = new $this->model;
        $model->gate = $this->gate;
        $model->type = $type ?: 'other';
        $model->method = $method ?: 'plain';
        $model->sender = $sender ?: $this->sender;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->sent_at = $sent_at;
        $model->save();
        return $model;
    }
}
