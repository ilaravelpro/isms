<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 6:55 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

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
