<?php
namespace app\model;

class Size{
    private $id;
    private $size_name;
    private $is_active;
    // Constructor
    public function __construct($id, $size_name, $is_active) {
        $this->id = $id;
        $this->size_name = $size_name;
        $this->is_active = $is_active;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getSizeName() {
        return $this->size_name;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setSizeName($size_name) {
        $this->size_name = $size_name;
    }

    public function getIsActive() {
        return $this->is_active;
    }
    
    public function setActive($is_active) {
        $this->is_active = $is_active;
    }
}
?>