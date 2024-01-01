<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 7:40 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\Core\iApp\Model;

class SMSMethod extends Model
{
    use \iLaravel\Core\iApp\Methods\Metable;

    public static $s_prefix = 'ISMSS';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_methods';
    public $metaTable = 'sms_method_meta';
    public $metaKeyName = 'method_id';

    protected $hidden = ['metas'];

    protected $casts = [
        'sections' => 'array'
    ];

    public function rules(Request $request, $action, $arg = null)
    {
        if ($arg) $arg = is_string($arg) ? $this::findBySerial($arg) : $arg;
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = [
                    'name' => 'required|string',
                    'code' => 'required|string',
                    'provider' => 'required|string',
                    'number' => 'nullable|string',
                    'number_pattern' => 'nullable|string',
                    'token' => 'required|string',
                    'description' => 'nullable|string',
                    'footer' => 'nullable|string',
                    'property' => 'nullable|numeric',
                    'status' => 'nullable|in:' . join(',', iconfig('status.sms_methods', iconfig('status.global'))),
                ];
                if ($arg == null || (isset($arg->name) && $arg->name != $request->name)) $rules['name'] .= '|unique:sms_methods,name';
                if ($arg == null || (isset($arg->code) && $arg->code != $request->code)) $rules['code'] .= '|unique:sms_methods,code';
                break;
        }
        return $rules;
    }

    public function sender() {
        return new \iLaravel\iSMS\Vendor\Sender($this);
    }

    public function getVendorAttribute() {
        return $this->provider ? ipreference('isms.providers.' . $this->provider . '.model') : null;
    }
}
