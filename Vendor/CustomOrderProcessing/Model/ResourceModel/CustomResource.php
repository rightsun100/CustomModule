<?php

namespace Vendor\CustomOrderProcessing\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomResource extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('custom_order_processing', 'entity_id'); // Define table name and primary key
    }
}
