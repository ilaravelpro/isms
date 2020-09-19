<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:42 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Modals\MetaData;

class SMSPattern extends MetaData
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMSP';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_patterns';

    protected $guarded = [];

    protected $casts = [
        'variables' => 'array'
    ];
}
