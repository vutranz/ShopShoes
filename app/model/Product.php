<?php
namespace app\model;

require_once 'E:/xampp/htdocs/ShopShoes/app/model/Category.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Color.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Size.php';

class Product {
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $create_at;
    private $update_at;
    private $is_active;
    private $color_id;
    private $size_id;
    private $category_id;

    // Constructor
    public function __construct($id, $name, $description, $price, $stock, $create_at, $update_at, $is_active, Color $color_id, Size $size_id ,Category $category_id) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        $this->is_active = $is_active;
        $this->color_id = $color_id;
        $this->size_id = $size_id;
        $this->category_id = $category_id;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getPrice() {
        return $this->price;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getStock() {
        return $this->stock;
    }
    
    public function setStock($stock) {
        $this->stock = $stock;
    }
    
    public function getColorId() {
        return $this->color_id;
    }
    
    public function setColorId(Color $color_id) {
        $this->color_id = $color_id;
    }
    
    public function getSizeId() {
        return $this->size_id;
    }
    
    public function setSizeId(Size $size_id) {
        $this->size_id = $size_id;
    }
    

   
    public function getCreateAt() {
        return $this->create_at;
    }

    public function setCreateAt($create_at) {
        $this->create_at = $create_at;
    }

    public function getUpdateAt() {
        return $this->update_at;
    }

    public function setUpdateAt($update_at) {
        $this->update_at = $update_at;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }
}

?>
