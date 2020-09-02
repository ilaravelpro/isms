<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel;


trait Methods
{
    use Methods\Send,
        Methods\Submit,
        Methods\SendByPattern,
        Methods\Check,
        Methods\Fetch,
        Methods\FetchAll;
}
