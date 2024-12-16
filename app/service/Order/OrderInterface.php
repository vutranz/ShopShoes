<?php
namespace app\service\Order;

require_once 'E:\xampp\htdocs\ShopShoes\app\model\Order.php';

use app\model\Order;

interface OrderInterface{
    public function createOrder(Order $order);
    public function getAllOrders();
    public function getOrderById($id);
}
?>