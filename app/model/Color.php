<?php

namespace app\model;
class Color{
    private $id;
    private $color_name;
    private $color_code;
    private $is_active;

    // Constructor
    public function __construct($id, $color_name, $color_code, $is_active) {
        $this->id = $id;
        $this->color_name = $color_name;
        $this->color_code = $color_code;
        $this->is_active = $is_active;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getColorName() {
        return $this->color_name;
    }

    public function setColorName($color_name) {
        $this->color_name = $color_name;
    }

    public function getColorCode() {
        return $this->color_code;
    }

    public function setColorCode($color_code) {
        $this->color_code = $color_code;
    }
    public function isActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }
}
?>