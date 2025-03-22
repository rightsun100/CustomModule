<?php

namespace Vendor\CustomOrderProcessing\Api\Data;

interface CustomDataInterface
{
    const ID = 'entity_id';
    const ORDERID = 'order_id';
    const OLDSTATUS = 'old_status';
    const NEWSTATUS = 'new_status';
    const CREATED_AT = 'created_at';

    public function getId();
    public function getOrderId();
    public function getOldStatus();
    public function getNewStatus();
    public function setOrderId($ORDERID);
    public function setOldStatus($OLDSTATUS);
    public function setNewStatus($NEWSTATUS);
}
