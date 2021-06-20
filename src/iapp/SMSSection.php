<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:42 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Model;

class SMSSection extends Model
{
    public static $s_prefix = 'ISMSS';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_sections';

    protected $casts = [
        'variables' => 'array'
    ];

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        return _t($this->name);
    }

    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }

    public function patterns() {
        return $this->belongsToMany(imodal('SMSPattern'), 'sms_pattern_sms_section', 'section_id', 'pattern_id');
    }
}
