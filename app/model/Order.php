<?php
namespace app\model;

class Order {
    private $id;
    private $user_id;
    private $full_name;
    private $email;
    private $phone_number;
    private $address;
    private $note;
    private $order_date;
    private $status;
    private $total_money;
    private $create_at;
    private $update_at;
    private $is_active;

    // Constructor
    public function __construct($id, User $user_id, $full_name, $email, $phone_number, 
                                $address, $note, $order_date, $status, $total_money, 
                                $create_at, $update_at, $is_active) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->address = $address;
        $this->note = $note;
        $this->order_date = $order_date;
        $this->status = $status;
        $this->total_money = $total_money;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        $this->is_active = $is_active;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhoneNumber() {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function getOrderDate() {
        return $this->order_date;
    }

    public function setOrderDate($order_date) {
        $this->order_date = $order_date;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getTotalMoney() {
        return $this->total_money;
    }

    public function setTotalMoney($total_money) {
        $this->total_money = $total_money;
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

    public function isActive() {
        return $this->is_active;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }
}


?>