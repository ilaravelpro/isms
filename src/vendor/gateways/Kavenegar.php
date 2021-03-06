<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 6:44 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays;

class Kavenegar extends \iAmirNet\SMS\Gateways\Kavenegar
{
    public static $use_pattern = true;

    public function __construct($model, array $options = [])
    {
        parent::__construct([
            'token' => $model->token,
            'number' => $model->number,
            'number_pattern' => $model->number_pattern,
            'footer' => $model->footer,
        ]);
    }
}
