<?php
namespace app\model;

class CartItem {
    private $id;
    private $cart;
    private $product;

    // Constructor nhận vào Cart và Product đối tượng
    public function __construct($id, Cart $cart, Product $product) {
        $this->id = $id;
        $this->cart = $cart;
        $this->product = $product;
    }

    // Getter và Setter cho các thuộc tính
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCart() {
        return $this->cart;
    }

    public function setCart(Cart $cart) {
        $this->cart = $cart;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct(Product $product) {
        $this->product = $product;
    }

    // Lấy ID của Cart
    public function getCartId() {
        return $this->cart->getId();
    }

    // Lấy ID của Product
    public function getProductId() {
        return $this->product->getId();
    }
}
?>
