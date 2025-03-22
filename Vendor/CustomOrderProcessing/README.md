# Custom API to Update Order Status

--
To achieve this, create a custom module that exposes a REST API endpoint for updating order statuses.

--

## Installation

```
php bin/magento module:enable Vendor_CustomOrderProcessing
php bin/magento setup:upgrade
php bin/magento cache:flush
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy

```

## Test API Endpoint Use cURL or Postman to send a POST request:

curl -X POST "https://your-magento-site.com/rest/V1/orders/updateStatus" \
-H "Content-Type: application/json" \
-H "Authorization: Bearer your_admin_token_here" \
-d '{"orderId":1, "status":"processing"}'

## Usage

This API will allow you to update the order status, but Magento restricts state changes (e.g., complete, closed, canceled). To fully change the order state, you need to invoice or ship the order.

### Way followed to create Module

Module Name : Vendor_CustomOrderProcessing.

Custom Table Name - custom_order_processing.

Fields - id,order_id,Old_status,new_status,created_at.

EVENT Name : sales_order_save_after.

DB Save : Repository Way.

Coding Standards : Magento 2 coding standards (PSR-4, dependency injection)

## Customer Notification :

To trigger an email notification to the customer when an order is shipped in Magento 2, ensure the "Email Copy of Shipment" option is checked when creating the shipment, and that the relevant email templates and sender configurations are set up correctly in the Magento admin panel.
Here's a more detailed breakdown:

1. Configure Email Settings:

   Access Configuration: Go to Stores > Settings > Configuration in the Magento admin panel.

   Navigate to Sales Emails: In the left panel, expand Sales > Sales Email, then click on Order.
   Enable Order Emails: Set "Enable" to "Yes" to activate order email notifications.
   Configure Email Sender: Choose the "New Magento Order Confirmation Email Sender".
   Select Email Templates: Choose the New Order Confirmation Template for both Customers and Guests.
   Send Order Email Copy To: Enter the email address to which you want to send a copy of the email (e.g., for admin notification).
   Send Order Email Copy Method: Choose the method for sending the copy email (BCC or Separate Email).
   Save Configuration: Click on "Save Config" to implement changes.

2. Create a Shipment and Send Email:

   Access Order: Go to Sales > Orders and select the order you want to ship.

   Create Shipment: Click on "Ship".
   Add Tracking Information: Enter the tracking number and carrier information.
   Send Email (Important): Check the box labeled "Email Copy of Shipment" to ensure the customer receives the shipment email.
   Confirm Shipment: Click on "Ship" again to finalize the shipment process.

3. Customize Email Templates (Optional):

   Access Email Templates: Go to Marketing > Communications > Email Templates.
   Edit or Create Templates: You can edit existing templates or create new ones to customize the content and style of the shipment email.
