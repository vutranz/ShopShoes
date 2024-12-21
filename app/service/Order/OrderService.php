<?php
namespace app\service\Order;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/model/Order.php';
require_once BASE_PATH . 'app/service/Order/OrderInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php'; 
require_once BASE_PATH . 'app/service/User/UserService.php';
require_once BASE_PATH . 'app/service/Product/ProductService.php';

use app\model\Order;
use app\service\Order\OrderInterface;
use config\ConnectionDB;
use app\service\User\UserService;
use app\service\Product\ProductService;

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

    public function updateStatusOrder($id, $status) {
        $query = "UPDATE `orders` SET status = '$status', update_at = NOW() WHERE id = $id";
        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
       
    }
    

    public function updateProductStock($orderId) {
    
        $query = "UPDATE products p
        JOIN order_items oi ON p.id = oi.product_id
        SET p.stock = p.stock - oi.quantity, p.update_at = NOW()
        WHERE oi.order_id = $orderId
        AND p.stock >= oi.quantity";

        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
    
    }


    public function getCountOrder() {
        $query = "SELECT COUNT(*) as count FROM orders WHERE is_active = 1";
        $stmt = $this->connection->prepare($query); 
        $stmt->execute();
    
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        return $result['count'] ?? 0;
    }
    

    public function getAllDoanhThu() {

        $query = "SELECT SUM(total_money) as total_revenue FROM orders WHERE status = 'Đã duyệt' AND is_active = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        return $result['total_revenue'] ?? 0;
    }
    

    


}
    

?>