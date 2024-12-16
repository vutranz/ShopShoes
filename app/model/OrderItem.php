<?php
namespace app\model;

class OrderItem {
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;
    private $price;
    private $total_money;
    private $is_active;

    // Constructor
    public function __construct($id, Order $order_id, Product $product_id, $quantity, $price, $total_money, $is_active) {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->total_money = $total_money;
        $this->is_active = $is_active;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getTotalMoney() {
        return $this->total_money;
    }

    public function setTotalMoney($total_money) {
        $this->total_money = $total_money;
    }

    public function isActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }
}


?>