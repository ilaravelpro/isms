<?php


namespace iLaravel\iSMS\Vendor\Service;


trait Construct
{
    public function __construct($gateway = null, $sender  = null)
    {
        $this->model = imodal('SMSMessage');
        $this->gateway = $gateway ? : ipreference('isms.gateway');
        $this->gateway = 'iLaravel\\iSMS\\Vendor\\GateWays\\' . (isset($this->gateways[$this->gateway]) ? $this->gateways[$this->gateway] : array_values($this->gateways)[0]);
        $this->gateway = new $this->gateway($sender);
        $this->sender = $sender;
    }
}
