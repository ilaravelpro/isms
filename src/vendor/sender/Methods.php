<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/2/20, 7:03 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\Vendor\Sender;


trait Methods
{
    use Methods\Send,
        Methods\Submit,
        Methods\SendByPattern,
        Methods\Check,
        Methods\Fetch,
        Methods\FetchAll;
}
