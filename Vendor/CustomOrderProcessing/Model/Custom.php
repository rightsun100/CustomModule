<?php

namespace Vendor\CustomOrderProcessing\Model;

use Vendor\CustomOrderProcessing\Api\Data\CustomDataInterface;
use Magento\Framework\Model\AbstractModel;

class Custom extends AbstractModel implements CustomDataInterface
{
    protected function _construct()
    {
        $this->_init(\Vendor\CustomOrderProcessing\Model\ResourceModel\CustomResource::class);
    }

    public function getId()
    {
        return $this->_getData(self::ID);
    }

    public function getOrderId()
    {
        return $this->_getData(self::ORDERID);
    }

    public function setOrderId($ORDERID)
    {
        return $this->setData(self::ORDERID, $ORDERID);
    }
    
    public function getOldStatus()
    {
        return $this->_getData(self::OLDSTATUS);
    }

    public function setOldStatus($OLDSTATUS)
    {
        return $this->setData(self::OLDSTATUS, $OLDSTATUS);
    }

    public function getNewStatus()
    {
        return $this->_getData(self::NEWSTATUS);
    }

    public function setNewStatus($NEWSTATUS)
    {
        return $this->setData(self::NEWSTATUS, $NEWSTATUS);
    }

   
}
