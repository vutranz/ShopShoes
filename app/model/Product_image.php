<?php
namespace app\model;

require_once 'E:\xampp\htdocs\ShopShoes\app\model\Product.php';

class Product_image{
    private $id;
    private $url;
    private $create_at;
    private $is_active;
    private $product_id;

    // Constructor
    public function __construct($id, $url, $create_at, $is_active, $product_id) {
        $this->id = $id;
        $this->url = $url;
        $this->create_at = $create_at;
        $this->is_active = $is_active;
        $this->product_id = $product_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getCreateAt() {
        return $this->create_at;
    }

    public function setCreateAt($create_at) {
        $this->create_at = $create_at;
    }

    public function getIsActive() {
        return $this->is_active;
    }
    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }
    public function getProductId() {
        return $this->product_id;
    }
    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

}
?>