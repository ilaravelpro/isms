<?php

namespace iLaravel\iSMS\iApp;

use Illuminate\Database\Eloquent\Model;

class SMSMessage extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ISMSM';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_messages';

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
}
