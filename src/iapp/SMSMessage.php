<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:48 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;


class SMSMessage extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ISMSM';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_messages';

    protected $casts = [
        'sent_at' => 'datetime',
        'logs' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        parent::deleted(function (self $event) {
            self::resetRecordsId();
        });
    }

    public function getSendAtAttribute($value)
    {
        return format_datetime($value, $this->datetime, 'time');
    }

    public function setMessageAttribute($value)
    {
        $this->renderSetValue($value, 'message');
    }

    public function getMessageAttribute($value)
    {
        return $this->renderGetValue($value, 'message');
    }

    public function setReceiverAttribute($value)
    {
        $this->renderSetValue($value, 'receiver');
    }

    public function getReceiverAttribute($value)
    {
        return $this->renderGetValue($value, 'receiver');
    }

    public function pattern(){
        return $this->belongsTo(imodal('SMSPattern'));
    }
}
