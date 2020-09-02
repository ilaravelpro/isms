<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;


trait Construct
{
    public function __construct($sender = null)
    {
        $performance = imodal('Performance');
        $this->token = $performance::findBySectionName('isms', 'ippanel_key');
        $this->sender = $sender ? : $performance::findBySectionName('isms', 'ippanel_sender');
        $this->client = new \IPPanel\Client($this->token);
    }
}
