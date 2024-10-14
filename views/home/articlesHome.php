<?php
include_once 'model/articles.php'; 
include_once 'Controller/admin/ArticlesController.php';

$articlesModel = new Articles(); 
$arrArticles = $articlesModel->getAll(); 
$categories = $articlesModel->getCategories(); 
?>

<div class="content">
    <h2>Tin Tức Mới Nhất</h2>

    <?php if ($categories && $arrArticles) { ?>
        <?php foreach ($categories as $category) { ?>
            <div class="category">
                <h3><?php echo $category['name']; ?></h3>
                
                <?php 
                $hasArticles = false; // Kiểm tra nếu có bài viết trong danh mục
                foreach ($arrArticles as $article) {
                    if ($article['categories_id'] == $category['id']) {
                        $hasArticles = true; // Có bài viết trong danh mục
                ?>
                    <div class="article">
                        <img src="<?php echo $article['img']; ?>" alt="<?php echo $article['title']; ?>" class="article-img">
                        <h4><?php echo $article['title']; ?></h4>
                        <p><?php echo $article['content']; ?></p>
                        <a href="detail.php?id=<?php echo $article['id']; ?>" class="btn">Xem chi tiết</a>
                    </div>
                <?php 
                    }
                }

                if (!$hasArticles) {
                    echo "<p>Không có bài viết nào trong danh mục này.</p>";
                }
                ?>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Không có danh mục hoặc bài viết nào.</p>
    <?php } ?>

    <?php if (isset($_SESSION['user'])) { ?>
        <div class="logout">
            <form action="?route=logout" method="POST">
                <button type="submit" name="logout" class="btn">Đăng Xuất</button>
            </form>
        </div>
    <?php } ?>
</div>
