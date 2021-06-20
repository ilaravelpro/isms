<?php


namespace iLaravel\iSMS\Vendor;


use iLaravel\Core\iApp\Exceptions\iException;

class Service
{
    public $sectionModel = 'SMSSection';
    public $section;

    public function __construct()
    {
        $this->sectionModel = imodal($this->sectionModel);
    }

    public function parse($key, $receiver, $variables = null) {
        $this->section = $this->sectionModel::findByName($key) ? : $this->sectionModel::create(['name' => $key]);
        $this->section->variables = array_keys($variables);
        $this->section->save();
        $patterns = $this->section->patterns()->where('status', 'active')->get();
        if ($patterns->count()) {
            foreach ($patterns as $index => $pattern) {
                $replace_variables = [];
                foreach ($pattern->variables as $variable) {
                    if (isset($variable['replaces']) && $variable['replaces'] && count($variable['replaces'])) {
                        foreach ($variable['replaces'] as $replace)
                            if (isset($variables[$replace])){
                                $replace_variables[$variable['variable']] = $variables[$replace];
                                break;
                            }
                    }else
                        $replace_variables[$variable['variable']] = isset($variable['text']) && $variable['text'] ? $variable['text'] : _t('Unknown');
                }
                $pattern->gateway->sender()->sendByPattern($pattern->id, $receiver, $replace_variables);
            }
        }else {
            throw new iException('Pattern not found.');
        }
    }
}
