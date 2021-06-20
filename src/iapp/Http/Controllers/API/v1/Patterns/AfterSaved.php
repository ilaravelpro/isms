<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 3:37 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Http\Controllers\API\v1\Patterns;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait AfterSaved
{
    public function after_save($request, $model, $parent)
    {
        $model->additionalUpdate();
    }
}
