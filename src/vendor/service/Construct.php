<?php


namespace iLaravel\iSMS\Vendor\Service;


trait Construct
{
    public function __construct($gateway = null, $sender  = null)
    {
        $performance = imodal('Performance');
        $this->gateway = $gateway ? : $performance::findBySectionName('isms', 'gateway');
        $this->sender = $sender;
    }
}
