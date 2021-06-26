<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:42 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iSMS\iApp;

use App\User;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\Core\iApp\Model;

class SMSPattern extends Model
{
    public static $s_prefix = 'ISMSP';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    protected $table = 'sms_patterns';

    protected $casts = [
        'variables' => 'array'
    ];

    public function additionalUpdate($request, $record = null)
    {
        $request = new Request($this->getAdditional($request));
        $this->sections()->sync($request->sections);
    }

    public function rules(Request $request, $action, $arg = null)
    {
        $rules = [];
        $additionalRules = [
            'sections.*' => 'nullable|exists:sms_sections,id',
        ];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = array_merge([
                    'gateway_id' => 'required|exists:sms_methods,id',
                    'title' => 'required|string',
                    'value' => 'required|string',
                    'type' => 'required|string|in:custom,provider',
                    'status' => 'nullable|in:' . join(iconfig('status.sms_patterns', iconfig('status.global')), ','),
                ], $additionalRules);
                if ($request->variables && count($request->variables)) {
                    $rules['variables.*.variable'] = 'required|string';
                    $rules['variables.*.replaces.*'] = 'nullable|string';
                    $rules['variables.*.text'] = 'nullable|string';
                }
                break;
            case 'additional':
                $rules = $additionalRules;
                break;
        }
        return $rules;
    }

    public function sections() {
        return $this->belongsToMany(imodal('SMSSection'), 'sms_pattern_sms_section', 'pattern_id', 'section_id');
    }

    public function gateway() {
        return $this->belongsTo(imodal('SMSMethod'), 'gateway_id');
    }
}
