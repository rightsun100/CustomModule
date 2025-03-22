<?php

namespace Vendor\CustomOrderProcessing\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class SalesOrderSaveAfter implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        
        if ($order) {
            $orderId = $order->getIncrementId();
            $this->logger->info('Order Save After Event Triggered for Order ID: ' . $orderId);
        }
    }
}
