<?php
require_once 'connect.php';
// Bắt đầu phần PHP để lấy danh mục
include_once 'model/connect.php'; // Kết nối tới cơ sở dữ liệu
include_once 'model/articles.php'; // Lớp Articles

$articlesModel = new Articles();
$categories = $articlesModel->getCategories(); // Lấy danh mục

if (!$categories) {
    echo "Không có danh mục nào được tìm thấy.";
}

class Articles {
    private $pdo;

    public function __construct() {
        $database = new Database(); 
        $this->pdo = $database->connect();
    }

    public function getAll() {
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $arrArticles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arrArticles;
    }

    public function getCategories() {
        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function addArticles($title, $content, $img_name) {
        $sql = "INSERT INTO articles (title, content, img) VALUES (:title, :content, :img)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img', $img_name);
        return $stmt->execute();
    }

    public function updateWithCategory($id, $title, $content, $img_name, $categories_id) {
        $sql = "UPDATE articles SET
                    title = :title,
                    content = :content,
                    img = :img,
                    categories_id = :categories_id
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img', $img_name);
        $stmt->bindParam(':categories_id', $categories_id); 
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    
    
    public function updateCategoryName($categories_id, $newName) {
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':name', $newName, ); 
        $stmt->bindParam(':id', $categories_id); 
    
        return $stmt->execute();
    }
    
    public function getCategoryNameById($categories_id) {
        $sql = "SELECT name FROM categories WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $categories_id);
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }



    public function getId($id) {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteById($id) {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    
}
