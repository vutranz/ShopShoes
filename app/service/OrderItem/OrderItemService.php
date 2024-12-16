<?php
namespace app\service\OrderItem;

require_once 'E:\xampp\htdocs\ShopShoes\app\service\OrderItem\OrderItemInterface.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php'; 
require_once 'E:\xampp\htdocs\ShopShoes\app\model\OrderItem.php';

use app\model\OrderItem;
use app\service\OrderItem\OrderItemInterface;
use config\ConnectionDB;

class OrderItemService implements OrderItemInterface{
    private $connection;

    public function __construct(){
        $connectionDB = new ConnectionDB();
        $this->connection = $connectionDB->getConnection();
    }
    public function addOrderItem(OrderItem $orderItem){
        $id = $orderItem->getId();
        $order_id = $orderItem->getOrderId()->getId();
        $product_id = $orderItem->getProductId()->getId();
        $quantity = $orderItem->getQuantity();
        $price = $orderItem->getPrice();
        $total_money = $orderItem->getTotalMoney();
        $is_active = $orderItem->isActive();

        $query = "INSERT INTO `order_items`(`id`, `order_id`, `product_id`, `quantity`, `price`, `total_money`, `is_active`) 
        VALUES ('$id', '$order_id', '$product_id', '$quantity', '$price', '$total_money', '$is_active')";
        
        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
    }

    public function getAllOrderItemsByOrderId($order_id){

    }
}
?>