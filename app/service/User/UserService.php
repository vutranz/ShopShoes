<?php
namespace app\service\User;

require_once 'E:/xampp/htdocs/ShopShoes/app/Service/User/UserInterface.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/ConnectionDB.php';  
require_once 'E:/xampp/htdocs/ShopShoes/app/model/User.php';

use app\service\User\UserInterface;
use config\ConnectionDB;
use app\model\User;

class UserService implements UserInterface
{
    private $connection;

    public function __construct(){
            $connectiondb = new ConnectionDB();
            $this->connection= $connectiondb->getConnection();
    }

    public function createUsers(User $user) {
        $full_name = $user->getFullName();
        $gender = $user->getGender();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $phone_number = $user->getPhoneNumber();
        $address = $user->getAddress();
        $day_of_birth = $user->getDayOfBirth();

        
        $query = "
        INSERT INTO `users`(`full_name`, `gender`, `email`, `password`, `phone_number`, `address`, `day_of_birth`)
        VALUES ('$full_name', '$gender', '$email', '$password', '$phone_number', '$address', '$day_of_birth')
        ";
        
        $stmt = $this->connection->prepare($query);
        return $stmt->execute();
    }

    public function userLogin(){;}
    public function updateUser($id, User $user){;}
    public function deleteUser($id){;}
    
    public function getAllUsers(){
        $query = "SELECT * FROM `users`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $users = [];
        
        foreach ($result as $row) {
            $users[] = new User(
                $row['id'],
                $row['full_name'],
                $row['gender'],
                $row['email'],
                $row['password'],
                $row['phone_number'],
                $row['address'],
                $row['day_of_birth'],
                $row['create_at'],
                $row['update_at'],
                $row['is_active'],
                $row['profile_image']
            );
        }
        
        return $users;
    }

    public function getUserById($id){
        $query = "SELECT * FROM `users` WHERE id = '$id'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($result) {
            return new User(
                $result['id'],
                $result['full_name'],
                $result['gender'],
                $result['email'],
                $result['password'],
                $result['phone_number'],
                $result['address'],
                $result['day_of_birth'],
                $result['create_at'],
                $result['update_at'],
                $result['is_active'],
                $result['profile_image']
            );
        }
        
        return null;  
    }

    public function checkEmailExists($email) {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
    
        return $count > 0; 
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $result =  $stmt->fetch(\PDO::FETCH_ASSOC); 

        if ($result) {
            return new User(
                $result['id'],
                $result['full_name'],
                $result['gender'],
                $result['email'],
                $result['password'],
                $result['phone_number'],
                $result['address'],
                $result['day_of_birth'],
                $result['create_at'],
                $result['update_at'],
                $result['is_active'],
                $result['profile_image']
            );
        }
        
        return null;  
    }

    public function assignRoleToUser($user_id, $role_id) {
        $query = "INSERT INTO user_roles (user_id, role_id) VALUES ($user_id,$role_id)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    }

    
    public function getUserRoleByid($user_id) {
        $query = "SELECT r.name FROM roles r
                  JOIN user_roles ur ON ur.role_id = r.id
                  WHERE ur.user_id = :user_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $role = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        return $role ? $role['name'] : null; 
    }

    public function getCountUsers(){
        $query = "SELECT COUNT(*) as total FROM `users` WHERE is_active = 1";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];  
    }
    

}
?>