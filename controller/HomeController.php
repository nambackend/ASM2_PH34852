<?php
class HomeController {
    public function showArticles() {
        include_once 'views/templates/header.php'; 
        include_once 'views/home/articlesHome.php';   
        include_once 'views/templates/footer.php'; 
    }
}
?>