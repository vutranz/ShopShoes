<?php

namespace app\model;

require_once 'config/PathConfig.php'; 
require_once BASE_PATH . 'app/model/User.php';

use app\model\User;


class Cart {
    private $id;
    private $userId;
    private $createAt;
    private $isActive;

    // Constructor
    public function __construct($id, User $userId, $createAt, $isActive) {
        $this->id = $id;
        $this->userId = $userId;
        $this->createAt = $createAt;
        $this->isActive = $isActive;
    }

    // Getter and Setter for ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for User ID
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter and Setter for Create At
    public function getCreateAt() {
        return $this->createAt;
    }

    public function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    // Getter and Setter for Is Active
    public function getIsActive() {
        return $this->isActive;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }
}
?>