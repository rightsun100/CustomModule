<?php
namespace Vendor\CustomOrderProcessing\Api;

interface OrderStatusInterface
{
    /**
     * Update order status via API
     * @param int $orderId
     * @param string $status
     * @return string
     */
    public function updateOrderStatus($orderId, $status);
}
