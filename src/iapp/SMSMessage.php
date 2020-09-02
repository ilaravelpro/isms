<?php

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Modals\MetaData;

class SMSMessage extends MetaData
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMSM';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $guarded = [];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        parent::deleted(function (self $event) {
            self::resetRecordsId();
        });
    }

    public function meta()
    {
        return $this->hasMany(WindyPointMeta::class, 'point_id');
    }

    public function getSendAtAttribute($value)
    {
        return format_datetime($value, $this->datetime, 'time');
    }

    public function setMessageAttribute($value)
    {
        $this->renderSetValue($value, 'message_type');
    }

    public function getMessageAttribute($value)
    {
        return $this->renderGetValue($value, 'message_type');
    }

    public function setReceiverAttribute($value)
    {
        $this->renderSetValue($value, 'receiver_type');
    }

    public function getReceiverAttribute($value)
    {
        return $this->renderGetValue($value, 'receiver_type');
    }
}
