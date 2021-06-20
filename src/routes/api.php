<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 6:48 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1/sms')->middleware('auth:api')->group(function () {
    Route::apiResource('methods', 'SMSMethodController', ['as' => 'api.sms']);
    Route::apiResource('patterns', 'SMSPatternController', ['as' => 'api.sms']);
    Route::apiResource('sections', 'SMSSectionController', ['as' => 'api.sms','except' => ['store','update','destroy']]);
});
