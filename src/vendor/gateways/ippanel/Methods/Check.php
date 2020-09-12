<?php


namespace iLaravel\iSMS\Vendor\GateWays\IPPanel\Methods;


trait Check
{
    public static function check($model, $sender = null)
    {
        return (new self($sender))->_check(...func_get_args());
    }

    public function _check($model)
    {
        list($statuses, $paginationInfo) = $this->client->fetchStatuses($model->mid, 0, 10);
        $statuses = array_unique(array_column($statuses, 'status'));
        return count($statuses) == 1 ? $statuses[0] : 'sent';
    }
}
