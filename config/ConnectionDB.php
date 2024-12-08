<?php

namespace config;

use PDO;
use PDOException;

class ConnectionDB {
    private $host = 'localhost';  
    private $db_name = 'shopappshoes';  
    private $username = 'root';  
    private $password = ''; 
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $exception) {
            echo "Lỗi kết nối: " . $exception->getMessage();
        }

        return $this->conn;
    }
}



?>