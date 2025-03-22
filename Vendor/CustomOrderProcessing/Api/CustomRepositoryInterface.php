<?php

namespace Vendor\CustomOrderProcessing\Api;

use Vendor\CustomOrderProcessing\Api\Data\CustomDataInterface;

interface CustomRepositoryInterface
{
    /**
     * Save data
     * @param CustomDataInterface $customData
     * @return CustomDataInterface
     */
    public function save(CustomDataInterface $customData);
}