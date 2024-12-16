<?php
namespace app\service\CartItem;

require_once 'E:\xampp\htdocs\ShopShoes\app\model\CartItem.php';

use app\model\CartItem;
interface CartItemInterface {

    public function addCartItem(CartItem $cartItem);

    // public function getCartItemById($id);

    // public function getCartItemsByCartId($cart_id);

    public function removeCartItem($id);
}
?>
