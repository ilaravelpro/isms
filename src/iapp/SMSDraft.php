<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 7:40 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Model;

class SMSDraft extends Model
{
    public static $s_prefix = 'ISMSD';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_drafts';

    protected static function boot()
    {
        parent::boot();
        parent::deleted(function (self $event) {
            self::resetRecordsId();
        });
    }

}
