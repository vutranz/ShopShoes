<?php
namespace app\service\Category;

require_once 'config/PathConfig.php';

require_once BASE_PATH . 'app/Service/Category/CategoryInterface.php';
require_once BASE_PATH . 'config/ConnectionDB.php';  
require_once BASE_PATH . 'app/model/Category.php';

use app\service\Category\CategoryInterface;
use config\ConnectionDB;
use app\model\Category;

class CategoryService implements CategoryInterface{

    private $connection;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
        }

    public function getAllCategory(){
        $query = "SELECT * FROM categories where is_active = 1";
        $stmt = $this->connection->prepare($query); 
        $stmt->execute();

        $category = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $category[] = new Category(
                $row['id'],
                $row['name'],
                $row['create_at'],
                $row['description'],
                $row['is_active']);
        }

        return  $category; 
    }
    public function getCategoryById($id){
        $query = "SELECT * FROM categories WHERE id =$id and is_active=1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return new Category(
            $row['id'],
            $row['name'],
            $row['create_at'],
            $row['description'],
            $row['is_active']);
    }

    // public function addCategory(Category $category) {
    //     $name = $category->getName();
    //     $create_at = $category->getCreateAt();
    //     $description = $category->getDescription();
    //     $is_active = $category->getIsActive();

    //     $query = "INSERT INTO categories (name, create_at, description, is_active) 
    //               VALUES (:name, :create_at, :description, :is_active)";
    
    //     $stmt = $this->connection->prepare($query);
    
    //     $stmt->bindParam(':name', $name);
    //     $stmt->bindParam(':create_at', $create_at);
    //     $stmt->bindParam(':description', $description);
    //     $stmt->bindParam(':is_active', $is_active, \PDO::PARAM_INT);
       
    //     return $stmt->execute();
    // }
    
    
    // public function updateCategory($id, $data){

    // }
    // public function deleteCategory($id){

    // }
}   
?>