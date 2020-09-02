<?php

namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;

use iLaravel\iSMS\iApp\SMSMessage;

trait Variables
{
    public $model = SMSMessage::class;
    public $gate = 'ippanel';

    public $token = null;
    public $client = null;
    public $sender = null;
}
