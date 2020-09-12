<?php

namespace iLaravel\iSMS\Vendor\Service;


trait Variables
{
    public $model = null;

    public $gateway = null;
    public $gateways = [
        'ippanel' => 'IPPanel'
    ];
    public $sender = null;
}
