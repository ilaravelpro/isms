<?php


namespace iLaravel\iSMS\Vendor\Service\Methods;


use Carbon\Carbon;
use iLaravel\iSMS\iApp\SMSMessage;

trait SendByPattern
{
    public static function sendByPattern(SMSMessage $model, $names)
    {
        return (new self())->_sendByPattern(...func_get_args());
    }

    public static function sendByPatternFast($type,$pattern, $names, $receiver, $message)
    {
        return (new self())->_sendByPatternFast(...func_get_args());
    }

    public function _sendByPattern(SMSMessage $model, $names)
    {
        if ($model->pattern->type == 'sender') {
            $mid =  $this->client->sendPattern(
                $model->pattern->value,
                $model->sender ?: $this->sender, is_array($model->receiver) ? $model->receiver[0] : $model->receiver,
                $model->message
            );
        }else{
            $patterns = array_map(function($pattern) {return "{{$pattern}}";}, $names);
            $mid = $this->client->send(
                $model->sender ?: $this->sender,
                is_array($model->receiver) ? $model->receiver : [$model->receiver],
                str_replace($patterns, $model->message, $model->pattern->value)
            );
        }
        $model->mid = $mid;
        $model->sent_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->status = 'sending';
        $model->save();
        return true;
    }

    public function _sendByPatternFast($type,$pattern, $names, $receiver, $message)
    {
        $model = new $this->model;
        $mid = $this->_sendByPatternBase($type,$pattern, $names, $receiver, $message);
        $model->mid = $mid;
        $model->gate = $this->gate;
        $model->receiver = $receiver;
        $model->message = $message;
        $model->save();
        return $this->_send($model);
    }

    public function _sendByPatternBase($type, $pattern, $names, $receiver, $message, $sender = null)
    {
        if ($type == 'sender') {
            return $this->client->sendPattern(
                $pattern,
                $sender ?: $this->sender, is_array($receiver) ? $receiver[0] : $receiver,
                $message
            );
        }else{
            $patterns = array_map(function($pattern) {return "{{$pattern}}";}, $names);
            return $this->_sendBase($receiver, str_replace($patterns, $message, $pattern), $sender);
        }
        return false;
    }
}
