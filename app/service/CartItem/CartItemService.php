<?php
namespace app\service\CartItem;


require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\CartItem\CartItemInterface.php';

use app\model\Cart;
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

    // // Lấy mục giỏ hàng theo ID
    // public function getCartItemById($id) {
    //     $query = "SELECT id, cart_id, product_id FROM cart_items WHERE id = :id";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();

    //     if ($stmt->rowCount() > 0) {
    //         $row = $stmt->fetch(\PDO::FETCH_ASSOC);
    //         $cart = new Cart($row['cart_id']);  // Tạo đối tượng Cart từ ID
    //         $product = new Product($row['product_id']);  // Tạo đối tượng Product từ ID
    //         return new CartItem($row['id'], $cart, $product);
    //     }

    //     return null;
    // }

    // // Lấy tất cả sản phẩm trong giỏ hàng
    // public function getCartItemsByCartId($cart_id) {
    //     $query = "SELECT id, cart_id, product_id FROM cart_items WHERE cart_id = :cart_id";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':cart_id', $cart_id);
    //     $stmt->execute();

    //     $cartItems = [];
    //     while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    //         $cart = new Cart($row['cart_id']);  // Tạo đối tượng Cart từ ID
    //         $product = new Product($row['product_id']);  // Tạo đối tượng Product từ ID
    //         $cartItems[] = new CartItem($row['id'], $cart, $product);
    //     }

    //     return $cartItems;
    // }

    // // Xóa sản phẩm khỏi giỏ hàng
    // public function removeCartItem($id) {
    //     $query = "DELETE FROM cart_items WHERE id = :id";
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':id', $id);
    //     return $stmt->execute();
    // }
}
?>
