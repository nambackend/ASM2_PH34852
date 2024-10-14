<?php
class Account {
    public function login($username, $password) {
        $database = new Database();
        $conn = $database->connect();
        
        $sql = "SELECT * FROM taikhoan WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function checkUser($username) {
        $database = new Database();
        $conn = $database->connect();
        
        $sql = "SELECT * FROM taikhoan WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function signup($username, $password) {
        $database = new Database();
        $conn = $database->connect();
        
        $sql = "INSERT INTO taikhoan (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        return $stmt->execute();
    }
}
?>
