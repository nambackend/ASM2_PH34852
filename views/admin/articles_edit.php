<form method="post" enctype="multipart/form-data">
    <h1>Sửa Tin Tức</h1>
    <table>
        <tr>
            <td>ID:</td>
            <td><input type="text" name="id" value="<?= htmlspecialchars($articlesEdit['id'] ?? '') ?>" readonly></td>
        </tr>
        <tr>
            <td>Tiêu đề:</td>
            <td><input type="text" name="title" value="<?= htmlspecialchars($articlesEdit['title'] ?? '') ?>" required></td>
        </tr>
        <tr>
            <td>Nội dung:</td>
            <td><textarea name="content" required><?= htmlspecialchars($articlesEdit['content'] ?? '') ?></textarea></td>
        </tr>
        <tr>
            <td>Danh mục:</td>
            <td>
                <select name="categories_id" required>
                    <?php foreach ($arrCategories as $category): ?>
                        <option value="<?= htmlspecialchars($category['id']) ?>" 
                            <?= isset($articlesEdit['categories_id']) && $articlesEdit['categories_id'] == $category['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tên danh mục mới:</td>
            <td><input type="text" name="new_category_name" placeholder="Nhập tên danh mục mới"></td>
        </tr>
        <tr>
            <td>Ảnh:</td>
            <td>
                <img src="<?= htmlspecialchars($articlesEdit['img']) ?>" alt="Ảnh tin tức" style="max-width: 150px; height: auto;">
                <br><input type="file" name="image">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Cập nhật tin tức">
            </td>
        </tr>
    </table>
</form>
