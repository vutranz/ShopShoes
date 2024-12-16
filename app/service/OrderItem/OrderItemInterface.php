<?php
namespace app\service\OrderItem;

require_once 'E:\xampp\htdocs\ShopShoes\app\model\OrderItem.php';

use app\model\OrderItem;

interface OrderItemInterface{
    public function addOrderItem(OrderItem $orderItem);
    public function getAllOrderItemsByOrderId($order_id);
}
?>