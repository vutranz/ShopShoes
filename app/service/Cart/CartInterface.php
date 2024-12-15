<?php
namespace app\service\Cart;

use app\model\Cart;

interface CartInterface{
    public function addCart(Cart $cart);
    public function getCartById($id);
}
?>