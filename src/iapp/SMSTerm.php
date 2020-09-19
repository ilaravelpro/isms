<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 7:41 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Modals\MetaData;

class SMSTerm extends MetaData
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMST';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_terms';

    protected $guarded = [];

}
