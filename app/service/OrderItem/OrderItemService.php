<?php
namespace app\service\OrderItem;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/service/OrderItem/OrderItemInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php'; 
require_once BASE_PATH . 'app/model/OrderItem.php';
require_once BASE_PATH . 'app/service/Product/ProductService.php';
require_once BASE_PATH . 'app/service/Order/OrderService.php';
require_once BASE_PATH . 'app/service/User/UserService.php';
require_once BASE_PATH . 'app/model/Order.php';

use app\model\OrderItem;
use app\service\OrderItem\OrderItemInterface;
use config\ConnectionDB;
use app\service\Product\ProductService;
use app\service\Order\OrderService;
use app\service\User\UserService;
use app\model\Order;

class OrderItemService implements OrderItemInterface{
    private $connection;
    private $productService;
    private $orderService;
    private $userService;

    public function __construct(){
        $connectionDB = new ConnectionDB();
        $this->connection = $connectionDB->getConnection();
        $this->productService = new ProductService();
        $this->orderService = new OrderService();
        $this->userService = new UserService();
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

    public function getAllOrderByIdUser($id) {
        $query = "
            SELECT oi.product_id, oi.quantity, oi.price, oi.total_money, o.order_date, o.status
            FROM order_items oi
            JOIN orders o ON oi.order_id = o.id
            WHERE o.user_id = $id AND oi.is_active = 1 AND o.is_active = 1
            ORDER BY o.order_date DESC
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $orderItems = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $orderItems;
    }

    public function getItemsByOrderId($orderId)
    {
        $query = "SELECT oi.*, p.name AS product_name 
                FROM order_items oi
                JOIN products p ON oi.product_id = p.id
                WHERE oi.order_id = :orderId  AND oi.is_active = 1"; 

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':orderId', $orderId, \PDO::PARAM_INT); 
        $stmt->execute();

        $orderItems = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $orderItems[] = new OrderItem(
                $row['id'],
                $order_id = $this->orderService->getOrderById($row['order_id']),//
                $product_id = $this->productService->getProductById($row['product_id']),//
                $row['quantity'],
                $row['price'],
                $row['total_money'],
                $row['is_active'],
                $row['product_name'] 
            );
        }

        return $orderItems;
    }


    public function searchDoanhThu($status = null, $start_date = null, $end_date = null)
    {
        // Xây dựng câu truy vấn SQL
        $sql = "
    SELECT 
        o.status, 
        o.order_date, 
        oi.product_id, 
        p.name AS product_name,  -- Lấy tên sản phẩm
        c.color_name AS product_color, -- Lấy tên màu từ bảng colors
        s.size_name AS product_size,  -- Lấy tên size từ bảng sizes
        oi.quantity, 
        oi.price, 
        oi.total_money AS total_price,
        o.id AS order_id
    FROM 
        orders o
    JOIN 
        order_items oi ON o.id = oi.order_id
    JOIN 
        products p ON oi.product_id = p.id  -- Kết nối với bảng sản phẩm
    LEFT JOIN
        colors c ON p.color_id = c.id  -- Kết nối với bảng colors để lấy tên màu
    LEFT JOIN
        sizes s ON p.size_id = s.id  -- Kết nối với bảng sizes để lấy tên size
    WHERE 
        o.is_active = 1 
        AND oi.is_active = 1
";

// Thêm điều kiện trạng thái nếu có
if ($status) {
    $sql .= " AND o.status = :status";
}

// Thêm điều kiện ngày nếu có
if ($start_date && $end_date) {
    $sql .= " AND o.order_date BETWEEN :start_date AND :end_date";
} elseif ($start_date) {
    $sql .= " AND o.order_date >= :start_date";
} elseif ($end_date) {
    $sql .= " AND o.order_date <= :end_date";
}

// Chuẩn bị câu truy vấn
$stmt = $this->connection->prepare($sql);

// Liên kết các tham số nếu có
if ($status) {
    $stmt->bindParam(':status', $status);
}
if ($start_date) {
    $stmt->bindParam(':start_date', $start_date);
}
if ($end_date) {
    $stmt->bindParam(':end_date', $end_date);
}

// Thực thi câu truy vấn
$stmt->execute();

// Trả về kết quả
return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    
        // Thêm điều kiện trạng thái nếu có
        if ($status) {
            $sql .= " AND o.status = :status";
        }
    
        // Thêm điều kiện ngày nếu có
        if ($start_date && $end_date) {
            $sql .= " AND o.order_date BETWEEN :start_date AND :end_date";
        } elseif ($start_date) {
            $sql .= " AND o.order_date >= :start_date";
        } elseif ($end_date) {
            $sql .= " AND o.order_date <= :end_date";
        }
    
        // Chuẩn bị câu truy vấn
        $stmt = $this->connection->prepare($sql);
    
        // Liên kết các tham số nếu có
        if ($status) {
            $stmt->bindParam(':status', $status);
        }
        if ($start_date) {
            $stmt->bindParam(':start_date', $start_date);
        }
        if ($end_date) {
            $stmt->bindParam(':end_date', $end_date);
        }
    
        // Thực thi câu truy vấn
        $stmt->execute();
    
        // Trả về kết quả
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    
    
    

    

}
?>