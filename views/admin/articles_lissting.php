<h1>Danh Sách Bài Viết</h1>
<?php
include_once 'model/connect.php';
include_once 'model/articles.php';
?>

<a href="index.php?route=add" class="btn-add">Thêm Bài Viết</a>

<table>
    <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Danh Mục</th> <!-- Thêm cột danh mục -->
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($arrArticles as $row) {
                ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($row['img'] ?? '') ?>" alt="<?= htmlspecialchars($row['title'] ?? '') ?>" class="article-img"></td>
                    <td><?= htmlspecialchars($row['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['content'] ?? '') ?></td>
                    <td><?= htmlspecialchars($row['category_name'] ?? 'Chưa có danh mục') ?></td> <!-- Hiển thị tên danh mục -->
                    <td><a href="index.php?route=edit&id=<?= $row['id'] ?? '' ?>" class="btn-edit">Sửa</a></td>
                    <td>
                        <a href="index.php?route=delete&id=<?= $row['id'] ?? '' ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xóa</a>
                    </td>                
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>

<div style="text-align: right; margin-top: 10px;"> 
    <a href="http://localhost/asm1/?route=home" class="btn-back">Quay Lại Trang Chủ</a> <!-- Nút quay lại trang chủ -->
</div>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        margin: 20px;
    }

    .btn-add, .btn-back {
        display: inline-block;
        margin-bottom: 10px;
        padding: 10px 15px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-add:hover, .btn-back:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .article-img {
        width: 100px;
        height: auto;
        border-radius: 5px;
    }

    .btn-edit, .btn-delete {
        display: inline-block;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
        color: white;
        transition: background-color 0.3s;
    }

    .btn-edit {
        background-color: #f39c12;
    }

    .btn-edit:hover {
        background-color: #e67e22;
    }

    .btn-delete {
        background-color: #e74c3c;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }
</style>
