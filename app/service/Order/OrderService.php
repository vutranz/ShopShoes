<?php
namespace app\service\Order;

require_once 'E:\xampp\htdocs\ShopShoes\app\model\Order.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Order\OrderInterface.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php'; 
require_once 'E:\xampp\htdocs\ShopShoes\app\service\User\UserService.php';

use app\model\Order;
use app\service\Order\OrderInterface;
use config\ConnectionDB;
use app\service\User\UserService;

class OrderService implements OrderInterface
{
    private $connection;
    private $userService;

    public function __construct(){
        $connectiondb = new ConnectionDB();
        $this->connection = $connectiondb->getConnection();
        $this->userService = new UserService();
    }

    public function getLastInsertedId() {
        return $this->connection->lastInsertId(); 
    }

    public function createOrder(Order $order){
        $id = $order->getId();
        $user_id = $order->getUserId()->getId();
        $full_name = $order->getFullName();
        $email = $order->getEmail();
        $phone_number = $order->getPhoneNumber();
        $address = $order->getAddress();
        $note  = $order->getNote();
        $order_date = $order->getOrderDate();
        $status = $order->getStatus();
        $total_money = $order->getTotalMoney();
        $create_at = $order->getCreateAt();
        $update_at = $order->getUpdateAt();
        $is_active = $order->isActive();

        $query = "INSERT INTO `orders`
        (`user_id`, `full_name`, `email`, `phone_number`, 
        `address`, `note`, `order_date`, `status`, `total_money`, 
        `create_at`, `update_at`, `is_active`) VALUES 
        ('$user_id', '$full_name', '$email', '$phone_number', 
        '$address', '$note', '$order_date', '$status', 
        '$total_money', '$create_at', '$update_at', '1')";
        
        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
        
    
    }


    public function getAllOrders() {
        $query = "SELECT * FROM orders WHERE is_active = 1";
        $stmt = $this->connection->prepare($query); 
        $stmt->execute();

        $orders = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $orders[] = new Order(
                $row['id'],
                $row['user_id'],
                $row['full_name'],
                $row['email'],
                $row['phone_number'],
                $row['address'],
                $row['note'],
                $row['order_date'],
                $row['status'],
                $row['total_money'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active']
            );
        }

        return $orders; 
    }

    public function getOrderById($id) {
        $query = "SELECT * FROM orders WHERE id = $id AND is_active = 1";
        $stmt = $this->connection->prepare($query); 
        $stmt->execute();
    
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Order(
                $row['id'],
                $user_id = $this->userService->getUserById($row['user_id']),
                $row['full_name'],
                $row['email'],
                $row['phone_number'],
                $row['address'],
                $row['note'],
                $row['order_date'],
                $row['status'],
                $row['total_money'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active']
            );
        }
    
        return null;
    }
    
}

?>