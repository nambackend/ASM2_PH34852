<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'asm1';
    private $username = 'root';
    private $password = '';

    public function connect() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            //echo "connected";
        } catch (PDOException $e) {
            echo "connect failed: " . $e->getMessage(); 
           
        }
        return $conn; 

    }
}
?>