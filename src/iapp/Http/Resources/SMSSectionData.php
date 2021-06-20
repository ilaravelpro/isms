<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/1/20, 12:19 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;
use iLaravel\Core\iApp\Http\Resources\ResourceData;

class SMSSectionData extends ResourceData
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['variables'] = $this->variables;
        return $data;
    }
}
