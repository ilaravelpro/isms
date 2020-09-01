<?php


namespace iLaravel\iSMS\Vendor\IPPanel\Methods;


use Carbon\Carbon;

trait _Send
{
    public function _sendByQueue($receiver, $message, $type = null, $sender = null, $send_at = null) {
        $model = new $this->model;
        $model->gate = $this->gate;
        $model->type = $type ? : 'notification';
        $model->sender = $sender ? : $this->sender;
        $model->receiver = $receiver;
        $model->send_at = $send_at ? : Carbon::now()->format('Y-m-d H:i:s');
        $model->save();
        return true;
    }

    public function _send($mobile, $message, $id = null,  $type = null) {
        $type = $type ? : 'notification';
        $model = ($this->model->find($id) ? : $this->model->findBySerial($id)) ? : new $this->model;
        $mobile = is_array($mobile) ? $mobile : [$mobile];
        $mid = $this->client->send($model->sender ? : $this->sender, $mobile, $message);
        $model->gate = $this->gate;
        $model->mid = $mid;
        $model->type = $type;
        $model->sender = $model->sender ? : $this->sender;
        $model->receiver = $mobile;
        $model->status = 'sending';
        $model->send_at = Carbon::now()->format('Y-m-d H:i:s');
        $model->save();
        return true;
    }
}
