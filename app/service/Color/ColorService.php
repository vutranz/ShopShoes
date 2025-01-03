<?php
namespace app\service\Color;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/service/Color/ColorInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php';  
require_once BASE_PATH . 'app/model/Color.php';

use app\service\Color\ColorInterface;
use app\model\Color;
use config\ConnectionDB;

class ColorService implements ColorInterface
{
    private $connection;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
    }

    public function getColorById($id) {
        $query = "SELECT * FROM `colors` WHERE `id` = $id AND `is_active` = 1"; 
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($result) {
            return new Color(
                $result['id'],
                $result['color_name'],
                $result['color_code'],
                $result['is_active']
            );
        }
    
        return null; 
    }

    public function getAllColors() {
        $query = "SELECT * FROM `colors` WHERE `is_active` = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        $colors = [];
        if ($results) {
            foreach ($results as $result) {
                $colors[] = new Color(
                    $result['id'],
                    $result['color_name'],
                    $result['color_code'],
                    $result['is_active']
                );
            }
        }
    
        return $colors; 
    }

    public function getIdBynamecolor($name){
        $query = "SELECT `id` FROM `colors` WHERE `color_name` = :name AND `is_active` = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result) {
            return $result['id'];
        }
        return null;
    }
    
}

?>