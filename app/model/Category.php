<?php
namespace app\model;

class Category {
    private $id;
    private $name;
    private $create_at;
    private $description;
    private $is_active;

    // Constructor
    public function __construct($id, $name, $create_at , $description , $is_active) {
        $this->id = $id;
        $this->name = $name;
        $this->create_at = $create_at;
        $this->description = $description;
        $this->is_active = $is_active;
    }

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

    public function getCreateAt() {
        return $this->create_at;
    }

    public function setCreateAt($create_at) {
        $this->create_at = $create_at;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }
}

?>
