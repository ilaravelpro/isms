<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 1:01 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Service\Methods;


use Carbon\Carbon;

trait SendByPattern
{
    public static function sendByPattern($model, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPattern($model);
    }

    public static function sendByPatternFast($pattern, $receiver, $message, $gateway = null, $sender = null)
    {
        return (new self($gateway, $sender))->_sendByPatternFast($pattern, $receiver, $message);
    }

    public function _sendByPattern($model)
    {
        if ($model->pattern->type == 'sender') {
            $mid = $this->gateway->_sendByPattern($model);
            $model->mid = $mid;
            $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
            $model->status = 'sending';
            $model->save();
            return $model;
        }else{
            $patterns = array_map(function($pattern) {return "{{$pattern}}";}, array_keys($model->message));
            $model->send_message = str_replace($patterns, array_values($model->message), $model->pattern->value);
            return $this->_send($model, 'pattern');
        }
    }

    public function _sendByPatternFast($pattern, $receiver, $message)
    {
        $model = new $this->model;
        $model->pattern_id = $pattern;
        $model->gate = $this->gateway->gate;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->save();
        return $this->_sendByPattern($model);
    }
}
