<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 3:37 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\Patterns;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['store', 'update'])) {
            if (isset($data['sections']) && count($data['sections'])) {
                $sectionModel = imodal('SMSSection');
                foreach ($data['sections'] as $index => $section){
                    $value = is_array($section) && isset($section['value']) ? $section['value'] : $section;
                    if ($value && $value = $sectionModel::id($value)) $data['sections'][$index] = $value;
                }
            }
            if (isset($data['type'])) {
                $data['type'] = is_array($data['type']) && isset($data['type']['value']) ? $data['type']['value'] : $data['type'];
            }
        }
    }
}
