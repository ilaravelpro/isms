<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;

use iLaravel\iSMS\iApp\SMSMessage;

trait Check
{
    public static function check(SMSMessage $model, $sender = null)
    {
        return (new self($sender))->_sendFast(...func_get_args());
    }

    public function _check(SMSMessage $model)
    {
        list($statuses, $paginationInfo) = $this->client->fetchStatuses($model->mid, 0, 10);
        $statuses = array_unique(array_column($statuses, 'status'));
        return count($statuses) == 1 ? $statuses[0] : 'sent';
    }
}
