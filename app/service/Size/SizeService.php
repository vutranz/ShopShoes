<?php
namespace app\service\Size;

require_once 'app\service\Size\SizeInterface.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Size.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php';  


use app\service\Size\SizeInterface;
use app\model\Size;
use config\ConnectionDB;

class SizeService implements SizeInterface{

    private $connection;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
    }

    public function getSizeByid($id){
        $query = "SELECT * FROM `sizes` WHERE `id` = $id AND `is_active` = 1"; 
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($result) {
            return new Size(
                $result['id'],
                $result['size_name'],
                $result['is_active']
            );
        }
    
        return null; 
    }

    public function getAllSizes() {
        $query = "SELECT * FROM `sizes` WHERE `is_active` = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $sizes = [];
        if ($results) {
            foreach ($results as $result) {
                $sizes[] = new Size(
                    $result['id'],
                    $result['size_name'],
                    $result['is_active']
                );
            }
        }
    
        return $sizes; 
    }
    
}
?>