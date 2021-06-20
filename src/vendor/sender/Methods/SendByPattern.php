<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 1:01 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;

use Carbon\Carbon;

trait SendByPattern
{
    public function sendByPattern($pattern = null, $receiver = null, $message = null, $sender = null)
    {
        if ($this->message) $pattern = $this->message;
        if ($pattern instanceof $this->model) {
            $model = $pattern;
        }else{
            $model = new $this->model;
            $model->pattern_id = $pattern;
            $model->gateway_id = $this->gateway->id;
            $model->receiver = $receiver;
            $model->message = $message;
            if ($sender) $model->sender = $sender;
            $model->save();
        }
        $result = $this->provider->sendByPattern($model->pattern->value, is_array($model->receiver) ? $model->receiver[0] : $model->receiver, $model->message, $model->pattern->type == 'provider', $model->sender);
        if ($result['status']){
            $model->mid = $result['id'];
            $model->logs = $model->logs ? array_merge($model->logs, ['send' => $result['result']]): ['send' => $result['result']];
            $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
            $model->status = 'sending';
            $model->sender = $model->sender ? : ($this->provider->number_pattern ? :$this->provider->number);
            $model->save();
        }
        $this->message = $model;
        return $this;
    }
}
