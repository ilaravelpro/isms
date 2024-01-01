<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 6:44 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\GateWays;

use iLaravel\Core\iApp\Exceptions\iException;

class SamanTel extends \iAmirNet\SMS\Gateways\SabaPayamak
{
    public static $use_pattern = true;

    public function __construct($model, array $options = [])
    {
        parse_str($model->token, $identy);
        if ((!isset($identy['username']) && (isset($identy['username']) && !strlen($identy['username']))) || !isset($identy['password']) && (isset($identy['password']) && !strlen($identy['password']))) {
            throw new iException("Please enter valid Username & Password in sms method({$model->serial}).");
        }
        parent::__construct(array_merge([
            'number' => $model->number,
            'number_pattern' => $model->number_pattern,
            'footer' => $model->footer,
        ], $identy));
    }
}
