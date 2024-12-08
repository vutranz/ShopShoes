<?php
namespace app\service\Product;

require_once 'E:/xampp/htdocs/ShopShoes/app/service/Product/ProductInterface.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php';  
require_once 'E:/xampp/htdocs/ShopShoes/app/model/Product.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/service/Category/CategoryService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Color\ColorService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';

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


    public function addProduct(Product $product) {

        
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
        
        return $stmt->execute();
    }
    
    
    

    public function getAllProduct() {
        // Truy vấn chỉ lấy sản phẩm có tên duy nhất
        $query = "SELECT DISTINCT p.name, p.id, p.description, p.price, p.stock, p.create_at, p.update_at, p.is_active, p.category_id, p.color_id, p.size_id
                  FROM `products` p
                  JOIN `products` p2 ON p.name = p2.name AND p.id = (SELECT MIN(id) FROM products WHERE name = p.name)
                  ORDER BY p.name";
    
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
        $query = "SELECT * FROM `products` where is_active = 1";
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
    
}

?>