<?php

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Modals\MetaData;

class SMSDraft extends MetaData
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMSD';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        parent::deleted(function (self $event) {
            self::resetRecordsId();
        });
    }

}
