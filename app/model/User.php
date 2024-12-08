<?php
namespace app\model;

class User {
    private $id;
    private $full_name;
    private $gender;
    private $email;
    private $password;
    private $phone_number;
    private $address;
    private $day_of_birth;
    private $create_at;
    private $update_at;
    private $is_active;
    private $profile_image;

    // Constructor
    public function __construct($id, $full_name, $gender, $email, $password, $phone_number, $address, $day_of_birth, $create_at, $update_at, $is_active, $profile_image) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->gender = $gender;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->address = $address;
        $this->day_of_birth = $day_of_birth;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        $this->is_active = $is_active;
        $this->profile_image = $profile_image;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function setFullName($full_name) {
        $this->full_name = $full_name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
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

    public function getDayOfBirth() {
        return $this->day_of_birth;
    }

    public function setDayOfBirth($day_of_birth) {
        $this->day_of_birth = $day_of_birth;
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

    public function getProfileImage() {
        return $this->profile_image;
    }

    public function setProfileImage($profile_image) {
        $this->profile_image = $profile_image;
    }
}


?>