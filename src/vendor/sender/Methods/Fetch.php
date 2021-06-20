<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:35 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender\Methods;


trait Fetch
{
    public function fetch($mid = null)
    {
        if ($this->message) $mid = $this->message;
        if ($mid instanceof $this->model){
            $message = $this->client->getMessage($mid->mid)['result'];
            $mid->sent_at = $message->sent_at;
            $mid->status = $message->status;
            $mid->save();
            $this->message = $mid;
            return $this;
        }
        return $this->provider->fetch($mid);
    }
}
