<?php
include_once 'model/articles.php'; 

// Kiểm tra xem có tham số 'id' trong URL không
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    
    // Tạo đối tượng Articles và lấy bài viết theo ID
    $articlesModel = new Articles(); 
    $article = $articlesModel->getById($articleId); // Giả sử bạn có phương thức getById trong model

    // Kiểm tra xem bài viết có tồn tại không
    if (!$article) {
        echo "<p>Bài viết không tồn tại.</p>";
        exit;
    }
} else {
    echo "<p>Không có bài viết nào để hiển thị.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <style>
        /* Thêm CSS cho trang chi tiết */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .content {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .article-img {
            width: 100%;         
            height: auto;       
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <img src="<?php echo htmlspecialchars($article['img']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="article-img">
        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
        <a href="index.php" class="btn-back">Quay lại danh sách bài viết</a>
    </div>
</body>
</html>
