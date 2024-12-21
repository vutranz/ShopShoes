<?php
namespace app\service\Cart;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'app/service/Cart/CartInterface.php';
require_once BASE_PATH . 'app/model/Cart.php';
require_once BASE_PATH . 'config/ConnectionDB.php';  
require_once BASE_PATH . 'app/service/User/UserService.php';


use app\service\Cart\CartInterface;
use app\model\Cart;
use config\ConnectionDB;
use app\service\User\UserService;


class CartService implements CartInterface{

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
    
    public function addCart(Cart $cart) {
        $user_id = $cart->getUserId()->getId();  
        $create_at = $cart->getCreateAt();
        $is_active = $cart->getIsActive();
        
        $query = "
        INSERT INTO `carts`( `user_id`, `create_at`, `is_active`) 
        VALUES ('$user_id','$create_at',' $is_active')
        ";
    
        $stmt = $this->connection->prepare($query);
        
        return $stmt->execute();
    }
    

    public function getCartById($id) {
       
        $query = "select * FROM carts WHERE id = $id";

        $stmt = $this->connection->prepare($query);
      
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return new Cart(
            $result['id'], 
            $user_id = $this->userService->getUserById($result['user_id']), 
            $result['create_at'], 
            $result['is_active']);
        }
        
        return null;
    }
}
?>