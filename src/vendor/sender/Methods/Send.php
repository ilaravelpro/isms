<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 7:23 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;

use Carbon\Carbon;

trait Send
{
    public function send($receiver = null, $message = null, $method = 'plain', $sender = null)
    {
        if ($this->message) $receiver = $this->message;
        if ($receiver instanceof $this->model) {
            $model = $receiver;
        }else{
            $model = new $this->model;
            $model->gateway_id = $this->gateway->id;
            $model->receiver = $receiver;
            $model->message = $message;
            if ($sender) $model->sender = $sender;
            $model->save();
        }
        $result = $this->provider->send(is_array($model->receiver) && count($model->receiver)== 1 ? $model->receiver[0] : $model->receiver, $model->message, $model->sender);
        if ($result['status']) {
            $model->mid = $result['id'];
            $model->logs = $model->logs ? array_merge($model->logs, ['send' => $result['result']]): ['send' => $result['result']];
            $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
            $model->method = $method;
            $model->sender = $model->sender ? : $this->provider->number;
            $model->status = 'sending';
            if (isset($model->send_message)) unset($model->send_message);
            $model->save();
        }
        $this->message = $model;
        return $this;
    }

    public function _sendSmart($receiver, $message, $pattern = null)
    {
        /*$receiver = is_array($receiver) ? $receiver : [$receiver];
        $gateways = array_map(function ($gateway) {
            $class = new ("iLaravel\\iSMS\\Vendor\\GateWays\\$gateway");
            return ;
        }, $this->gateways);
        $receiver = array_map(function ($number) {
            $render = \iLaravel\Core\Vendor\iMobile::parse($number);
            return $render;
        },$receiver);*/
    }
}
