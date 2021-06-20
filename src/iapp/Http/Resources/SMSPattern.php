<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class SMSPattern extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        if ($this->type)
            $data['type'] = [
                'text' => _t($data['type']),
                'value' => $data['type'],
            ];
        if ($this->gateway_id){
            $SMSMethodData = iresource('SMSMethodData');
            $data['gateway_id'] = new $SMSMethodData($this->gateway);
        }
        if ($this->sections){
            $SMSSectionData = iresource('SMSSectionData');
            $data['sections'] = $SMSSectionData::collection($this->sections);
        }
        return $data;
    }
}
