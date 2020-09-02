<?php

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Modals\MetaData;

class SMSTerm extends MetaData
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMST';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

}
