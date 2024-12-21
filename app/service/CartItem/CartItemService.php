<?php
namespace app\service\CartItem;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'config/ConnectionDB.php';
require_once BASE_PATH . 'app/service/CartItem/CartItemInterface.php';
require_once BASE_PATH . 'app/model/CartItem.php';


use app\model\CartItem;
use config\ConnectionDB;
use app\service\CartItem\CartItemInterfacel;

class CartItemService implements CartItemInterface {

    private $connection;

    public function __construct() {
        $connectiondb = new ConnectionDB();
        $this->connection = $connectiondb->getConnection();
    }

   
    public function addCartItem(CartItem $cartItem) {
        $cart_id = $cartItem->getCartId();  
        $product_id = $cartItem->getProductId();
        $query = "INSERT INTO cart_items (cart_id, product_id) VALUES (:cart_id, :product_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':cart_id', $cart_id);
        $stmt->bindParam(':product_id', $product_id);
        return $stmt->execute();
    }

    public function getCartItemsbyUser($idUser) {
        $query = "SELECT ci.product_id
        FROM carts c
        JOIN cart_items ci ON c.id = ci.cart_id
        WHERE c.user_id = $idUser AND c.is_active = 1
        ;";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $cartItems = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $cartItems;
    }

    public function getCartItemsCount($idUser) {
        $query = "SELECT COUNT(ci.product_id) AS product_count
                  FROM carts c
                  JOIN cart_items ci ON c.id = ci.cart_id
                  WHERE c.user_id = $idUser AND c.is_active = 1;";
    
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        return $result['product_count'];  
    }
    
    public function removeCartItem($id){
        $query = "DELETE FROM `cart_items` WHERE product_id=$id";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute();
    }
}
?>
