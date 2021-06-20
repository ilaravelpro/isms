<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/2/21, 8:13 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp\Policies;

use iLaravel\Core\Vendor\iRole\iRolePolicy;

class SMSSectionPolicy extends iRolePolicy
{
    public $prefix = 'sms_sections';
    public $model = 'SMSSection';
}
