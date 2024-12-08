<?php
namespace app\service\User;

require_once 'E:/xampp/htdocs/ShopShoes/app/model/User.php';

use app\model\User;

interface UserInterface {
    public function createUsers(User $user);
    public function userLogin();
    public function updateUser($id, User $user);
    public function deleteUser($id);
    public function getAllUsers();
    public function getUserById($id);
    public function checkEmailExists($email);
    public function assignRoleToUser($user_id, $role_id);
    public function getUserRoleByid($role_name);

    public function getCountUsers();
}
?>
