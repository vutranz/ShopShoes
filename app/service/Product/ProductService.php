<?php
namespace app\service\Product;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/service/Product/ProductInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php';  
require_once BASE_PATH . 'app/model/Product.php';
require_once BASE_PATH . 'app/service/Category/CategoryService.php';
require_once BASE_PATH . 'app/service/Color/ColorService.php';
require_once BASE_PATH . 'app/service/Size/SizeService.php';

use app\service\Product\ProductInterface;
use config\ConnectionDB;
use app\model\Product;
use app\service\Category\CategoryService;
use app\service\Color\ColorService;
use app\service\Size\SizeService;

class ProductService implements ProductInterface
{
    private $connection;
    private $categoryService;
    private $colorService;
    private $sizeService;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
            $this->categoryService = new CategoryService();
            $this->colorService = new ColorService();
            $this->sizeService = new SizeService();
    }

    public function getLastInsertedId() {
        return $this->connection->lastInsertId(); 
    }


    public function addProduct(Product $product)
{
    try {
        // Lấy dữ liệu từ đối tượng Product
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $create_at = $product->getCreateAt();
        $update_at = $product->getUpdateAt();
        $is_active = $product->getIsActive();
        $category_id = $product->getCategoryId()->getId();
        $color_id = $product->getColorId()->getId();
        $size_id = $product->getSizeId()->getId();

        // Câu lệnh SQL
        $query = "
            INSERT INTO `products`(
                `name`, `description`, `price`, `stock`, 
                `create_at`, `update_at`, `is_active`, 
                `category_id`, `color_id`, `size_id`
            ) 
            VALUES (
                '$name', '$description', $price, $stock, 
                '$create_at', '$update_at', $is_active, 
                $category_id, $color_id, $size_id
            )
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return "Sản phẩm đã được thêm thành công!";
    } catch (PDOException $e) {
        if (str_contains($e->getMessage(), 'Sản phẩm đã tồn tại')) {
            return "Sản phẩm đã tồn tại với cùng tên, màu sắc và kích thước.";
        } else {
            error_log("Lỗi thêm sản phẩm: " . $e->getMessage(), 3, "errors.log");

            return "Đã xảy ra lỗi trong quá trình thêm sản phẩm. Vui lòng thử lại.";
        }
    }
}

    
    
    

    public function getAllProduct() {
        $query = "SELECT * from `products`";
    
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    
        $products = [];
    
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $category = $this->categoryService->getCategoryById($row['category_id']);
            $color = $this->colorService->getColorById($row['color_id']);
            $size = $this->sizeService->getSizeByid($row['size_id']);
    
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active'],
                $color,
                $size,
                $category
            );
        }
    
        return $products;
    }
    
    
    
    public function getProductById($id) {
        $query = "SELECT * FROM `products` WHERE `id` = $id "; 
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($result) {
            return new Product(
                $result['id'],
                $result['name'],
                    $result['description'],
                    $result['price'],
                $result['stock'],
                $result['create_at'],
                $result['update_at'],
                $result['is_active'],
                $color = $this->colorService->getColorById($result['color_id']),
                $size = $this->sizeService->getSizeByid($result['size_id']),
                $category = $this->categoryService->getCategoryById($result['category_id'])
            );
        }
    
        return null; 
    }

    
    public function deleteProduct($id){
        
        $query = "UPDATE `products` SET `is_active` = 0 WHERE `id` = $id";
        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
    }

    public function updateProduct($id, Product $product) {
       
        $name = $product->getName();
        $description = $product->getDescription();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $is_active = $product->getIsActive();
        $category_id = $product->getCategoryId()->getId(); 
        $color_id = $product->getColorId()->getId(); 
        $size_id = $product->getSizeId()->getId();
        $update_at = $product->getUpdateAt();
        $create_at = $product->getCreateAt();  
       
        $query = "UPDATE products SET 
              `name` = '$name', 
              `description` = '$description', 
              `price` = $price, 
              `stock` = $stock, 
              `create_at` = '$create_at', 
              `update_at` = '$update_at', 
              `is_active` = $is_active, 
              `color_id` = $color_id, 
              `size_id` = $size_id, 
              `category_id` = $category_id 
              WHERE `id` = $id";
    
        $stmt = $this->connection->prepare($query);
    
        return $stmt->execute();
    }
    
    public function getAllproductsForUser(){
        $query = "SELECT DISTINCT p.name, p.id, p.description, p.price, p.stock, p.create_at, p.update_at, p.is_active, p.category_id, p.color_id, p.size_id
        FROM `products` p
        JOIN `products` p2 ON p.name = p2.name AND p.id = (SELECT MIN(id) FROM products WHERE name = p.name)
        ORDER BY p.name ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $products = [];
        
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $category = $this->categoryService->getCategoryById($row['category_id']);
            $color = $this->colorService->getColorById($row['color_id']);
            $size = $this->sizeService->getSizeByid($row['size_id']);
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active'],
                $color,
                $size,
                $category
            );
        }
        
        return $products; 
    }
    
    public function getCountProducts(){
        $query = "SELECT COUNT(*) as total FROM `products` WHERE is_active = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];  
    }

    public function getProductsnews() {
        $query = "SELECT *
        FROM (
            SELECT * 
            FROM `products`
            WHERE is_active = 1
            ORDER BY id DESC
        ) AS sorted_products
        GROUP BY name
        LIMIT 16;
        ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $products = [];
        
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $category = $this->categoryService->getCategoryById($row['category_id']);
            $color = $this->colorService->getColorById($row['color_id']);
            $size = $this->sizeService->getSizeByid($row['size_id']);
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active'],
                $color,
                $size,
                $category
            );
        }
        
        return $products; 
    }


// SELECT p.id, p.name, p.description, p.price, p.stock, p.create_at, p.update_at, p.is_active, 
//                 p.category_id, p.color_id, p.size_id
//                 FROM products p
//                 WHERE p.id = (
//                     SELECT id
//                     FROM products
//                     WHERE name = p.name AND is_active = 1
//                     ORDER BY price ASC, id ASC
//                     LIMIT 1
//                 ) AND p.is_active = 1;
    public function searchProducts($name, $categoryId, $colorId, $sizeId, $sort) {
        // $query = "    SELECT p.id, p.name, p.description, p.price, p.stock, p.create_at, p.update_at, p.is_active, 
        //     p.category_id, p.color_id, p.size_id
        // FROM products p
        // WHERE p.is_active = 1
        // ";
        $query="SELECT p.id, p.name, p.description, p.price, p.stock, p.create_at, p.update_at, p.is_active, 
                     p.category_id, p.color_id, p.size_id
                     FROM products p
                     WHERE p.id = (
                         SELECT id
                         FROM products
                       WHERE name = p.name AND is_active = 1
                    --   ORDER BY price ASC, id ASC
                         LIMIT 1
                    ) AND p.is_active = 1;";
    
        $params = [];
    
        if (!empty($name)) {
            $query .= " AND p.name LIKE :name";
            $params[':name'] = '%' . $name . '%';
        }
    
        if (!empty($categoryId)) {
            $query .= " AND p.category_id = :category_id";
            $params[':category_id'] = $categoryId;
        }
    
        if (!empty($colorId)) {
            $query .= " AND p.color_id = :color_id";
            $params[':color_id'] = $colorId;
        }
    
        if (!empty($sizeId)) {
            $query .= " AND p.size_id = :size_id";
            $params[':size_id'] = $sizeId;
        }
    
        switch ($sort) {
            case 0: 
                $query .= " ORDER BY p.price DESC";
                break;
            case 1: 
                $query .= " ORDER BY p.price ASC";
                break;
            default: 
                $query .= " ORDER BY p.name ASC";
                break;
        }
    
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
    
       
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
       
        if (empty($results)) {
            return []; 
        }
    
        $products = [];
        foreach ($results as $row) {
            $category = $this->categoryService->getCategoryById($row['category_id']);
            $color = $this->colorService->getColorById($row['color_id']);
            $size = $this->sizeService->getSizeById($row['size_id']);
    
            $products[] = new Product(
                $row['id'],
                $row['name'],
                $row['description'],
                $row['price'],
                $row['stock'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active'],
                $color,
                $size,
                $category
            );
        }
    
        return $products;
    }
    


    public function getColorByname($name){
        $query = "SELECT sizes.size_name, colors.color_name, colors.color_code
        FROM products
        JOIN sizes ON products.size_id = sizes.id
        JOIN colors ON products.color_id = colors.id
        WHERE products.name = :name
        ORDER BY CAST(sizes.size_name AS UNSIGNED) ASC";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
    
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $sizes = [];
        $colors = [];
        foreach ($results as $row) {
            if (!in_array($row['size_name'], $sizes)) {
                $sizes[] = $row['size_name'];
            }
            if (!array_key_exists($row['color_name'], $colors)) {
                $colors[$row['color_name']] = $row['color_code'];
            }
        }
    
        return ['sizes' => $sizes, 'colors' => $colors];
    }
    


    

public function getProductByNameColorSize($name, $size, $color)
{

    $query = "SELECT * FROM products WHERE name = :name AND size_id = :size_id AND color_id = :color_id LIMIT 1";
    $stmt = $this->connection->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':size_id', $size);
    $stmt->bindParam(':color_id', $color);
    $stmt->execute();
    
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if ($result) {
        return new Product(
            $result['id'],
            $result['name'],
            $result['description'],
            $result['price'],
            $result['stock'],
            $result['create_at'],
            $result['update_at'],
            $result['is_active'],
            $this->colorService->getColorById($result['color_id']),
            $this->sizeService->getSizeById($result['size_id']),
            $this->categoryService->getCategoryById($result['category_id'])
        );
    } else {
        return null;
    }
    
}


    public function searchDoanhThu($status, $start_date, $end_date)
    {
        $query = "SELECT `order_items`.`id` AS `order_item_id`, `order_items`.`order_id`, 
                        `order_items`.`product_id`, `order_items`.`quantity`, 
                        `order_items`.`price`, `order_items`.`total_money` AS `item_total_money`, 
                        `order_items`.`is_active` AS `item_is_active`, 
                        `orders`.`user_id`, `orders`.`full_name`, `orders`.`email`, 
                        `orders`.`phone_number`, `orders`.`address`, `orders`.`note`, 
                        `orders`.`order_date`, `orders`.`status`, `orders`.`total_money` AS `order_total_money`,
                        `orders`.`create_at`, `orders`.`update_at`, `orders`.`is_active` AS `order_is_active`, 
                        `products`.`name` AS `product_name`, `products`.`price` AS `product_price`
                FROM `order_items`
                LEFT JOIN `orders` ON `order_items`.`order_id` = `orders`.`id`
                LEFT JOIN `products` ON `order_items`.`product_id` = `products`.`id`
                WHERE 1"; 

        if ($status != 'all') {
            $query .= " AND orders.status = :status";
        }

        if ($start_date && !$end_date) { 
            $query .= " AND orders.order_date >= :start_date";
        } elseif (!$start_date && $end_date) {  
            $query .= " AND orders.order_date <= :end_date";
        } elseif ($start_date && $end_date) {  
            $query .= " AND orders.order_date >= :start_date AND orders.order_date <= :end_date";
        }

      
        $stmt = $this->connection->prepare($query);

       
        if ($status != 'all') {
            $stmt->bindParam(':status', $status);
        }
        if ($start_date && !$end_date) {
            $stmt->bindParam(':start_date', $start_date);
        } elseif (!$start_date && $end_date) {
            $stmt->bindParam(':end_date', $end_date);
        } elseif ($start_date && $end_date) {
            $stmt->bindParam(':start_date', $start_date);
            $stmt->bindParam(':end_date', $end_date);
        }

        $stmt->execute();

        $orders = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            if (!isset($orders[$row['order_id']])) {
                $orders[$row['order_id']] = new Order(
                    $row['order_id'],
                    $user_id = $this->userService->getUserById($row['user_id']),
                    $row['full_name'],
                    $row['email'],
                    $row['phone_number'],
                    $row['address'],
                    $row['note'],
                    $row['order_date'],
                    $row['status'],
                    $row['order_total_money'],
                    $row['create_at'],
                    $row['update_at'],
                    $row['order_is_active']
                );
            }

            $orderItem = new OrderItem(
                $row['order_item_id'],
                $row['product_id'],
                $row['quantity'],
                $row['price'],
                $row['item_total_money'],
                $row['item_is_active'],
                $row['product_name'],
                $row['product_price']
            );

            $orders[$row['order_id']]->addOrderItem($orderItem);
        }

        return array_values($orders); 
    }
   





    
    
    
}

?>