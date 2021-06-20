<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SMSMethodData extends JsonResource
{
    public function toArray($request)
    {
        $data = [];
        $data['text'] = $this->name;
        $data['value'] = $this->serial;
        $data['id'] = $this->serial;
        return $data;
    }
}
