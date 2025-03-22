<?php
namespace Vendor\CustomOrderProcessing\Model;

use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Sales\Model\Order;
use Vendor\CustomOrderProcessing\Api\OrderStatusInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vendor\CustomOrderProcessing\Api\CustomRepositoryInterface;
use Vendor\CustomOrderProcessing\Model\CustomFactory;

class OrderStatus implements OrderStatusInterface
{
    protected $orderRepository;
    protected $customRepository;
    protected $customFactory;

    public function __construct(OrderRepositoryInterface $orderRepository,
    CustomRepositoryInterface $customRepository,
    CustomFactory $customFactory)
    {
        
        $this->orderRepository = $orderRepository;
        $this->customRepository = $customRepository;
        $this->customFactory = $customFactory;
        
    }

    /**
     * Update order status
     */
    public function updateOrderStatus($orderId, $status)
    {
        try {
            // Load order
            $order = $this->orderRepository->get($orderId);
            $OldStatus = order->getState();
            // Set order status and state
            $order->setStatus($status);
            
            // Save the order
            $this->orderRepository->save($order);

            try {
                $customModel = $this->customFactory->create();
                 $customModel->setOrderId($orderId);
                 $customModel->setOldStatus($OldStatus);
                 $customModel->setNewStatus($status);
                 $this->customRepository->save($customModel);
    
                $this->messageManager->addSuccessMessage(__('Data saved successfully.'));
            } catch (\Exception $f) {
                $this->messageManager->addErrorMessage(__('Error: ' . $f->getMessage()));
            }

            return "Order status updated successfully to: " . $status;
        } catch (NoSuchEntityException $e) {
            return "Order not found.";
        } catch (LocalizedException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
