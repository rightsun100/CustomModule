<?php

namespace Vendor\CustomOrderProcessing\Model;

use Vendor\CustomOrderProcessing\Api\CustomRepositoryInterface;
use Vendor\CustomOrderProcessing\Api\Data\CustomDataInterface;
use Vendor\CustomOrderProcessing\Model\ResourceModel\CustomResource;
use Vendor\CustomOrderProcessing\Model\CustomFactory;
use Magento\Framework\Exception\CouldNotSaveException;

class CustomRepository implements CustomRepositoryInterface
{
    protected $customFactory;
    protected $customResource;

    public function __construct(
        CustomFactory $customFactory,
        CustomResource $customResource
    ) {
        $this->customFactory = $customFactory;
        $this->customResource = $customResource;
    }

    public function save(CustomDataInterface $customData)
    {
        try {
            $this->customResource->save($customData);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save data: %1', $e->getMessage()));
        }
        return $customData;
    }
}
