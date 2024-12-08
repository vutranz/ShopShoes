<?php
namespace app\service\Product_image;

require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageInterface.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php';  
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Product_image.php';

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
                $row['url'],    // Lấy URL ảnh
                $row['create_at'],
                $row['is_active'],
                $productId      // Sản phẩm liên quan
            );
        }
    
        return $images;
    }
    
    
}
?>