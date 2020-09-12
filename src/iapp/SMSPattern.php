<?php

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


    public function setValueAttribute($value)
    {
        $this->renderSetValue($value);
    }

    public function getValueAttribute($value)
    {
        return $this->renderGetValue($value);
    }
}
