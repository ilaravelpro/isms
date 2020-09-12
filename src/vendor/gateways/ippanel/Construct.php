<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;


trait Construct
{
    public function __construct($sender = null)
    {
        $this->token = ipreference('isms.ippanel.key');
        $this->sender = $sender ? : ipreference('isms.ippanel.sender');
        $this->client = new \IPPanel\Client($this->token);
    }
}
