<?php
namespace app\service\Product_image;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/service/Product_image/Product_imageInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php';  
require_once BASE_PATH . 'app/model/Product_image.php';

use config\ConnectionDB;
use app\model\Product_image;
use app\service\Product_image\Product_imageInterface;

class Product_imageService{
    private $connection;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
    }

    public function addProductImage($product_id, $url) {
        $query = "INSERT INTO product_images (url, create_at, is_active, product_id) 
                  VALUES (:url, :create_at, 1, :product_id)";  // is_active = 1 mặc định
    
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':create_at', date('Y-m-d H:i:s'));
        $stmt->bindParam(':product_id', $product_id);
        
        return $stmt->execute();
    }
    
    public function deleteImagesByProductId($productId) {
        $query = "DELETE FROM product_images WHERE product_id = :product_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':product_id', $productId, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getImagesByProductId($productId) {
        $query = "SELECT * FROM product_images WHERE product_id = :product_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':product_id', $productId, \PDO::PARAM_INT);
        $stmt->execute();
        
        $images = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $images[] = new Product_image(
                $row['id'],
                $row['url'],    
                $row['create_at'],
                $row['is_active'],
                $productId      
            );
        }
    
        return $images;
    }

    public function getImagesByColorAndSize($productName, $colorName) {
        $query = "
            SELECT pi.url
            FROM product_images pi
            JOIN products p ON pi.product_id = p.id
            JOIN colors c ON p.color_id = c.id
            JOIN sizes s ON p.size_id = s.id
            WHERE c.color_name = $colorName
            AND p.name = $productName
        ";
        
        $stmt = $this->connection->prepare($query);

        $images = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $images;  
    }
    
    
}
?>