<?php   
include_once ('model/articles.php');
include_once ('controller/admin/ArticlesController.php');

class ArticlesController {

    public function create() {
        include_once 'views/admin/articles_add.php';

        if (isset($_FILES['image']) && $_FILES['image']['tmp_name'] != '') {
            $file_img = $_FILES['image'];  
            $title = $_POST['title'];
            $content = $_POST['content'];

            $source_file = $file_img['tmp_name'];

            if ($source_file && !getimagesize($source_file)) {
                exit("File không phải là hình ảnh.");
            }

            $target_file = 'img/' . $file_img['name'];
            move_uploaded_file($source_file, $target_file);
            $img_name = $target_file;

            $articlesModel = new Articles();
            if ($articlesModel->addArticles($title, $content, $img_name)) {
                header("Location: http://localhost:/asm1/?route=lissting");
                exit();
            } else {
                echo "Thêm thất bại";
            }
        } else {
            echo "Chưa có hình ảnh được upload.";
        }
    }

    public function lissting() {
        $articlesModel = new Articles;
        $arrArticles = $articlesModel->getAll();
    
        foreach ($arrArticles as &$article) {
            $article['category_name'] = $articlesModel->getCategoryNameById($article['categories_id']);
        }
    
        include_once ('views/admin/articles_lissting.php'); 
    }
    

    public function edit($id) {
        $articlesModel = new Articles();
        $articlesEdit = $articlesModel->getId($id);
        $arrCategories = $articlesModel->getCategories(); 
    
        
        include_once "views/admin/articles_edit.php";
        
        if (isset($_POST['submit'])) {  
            $title = $_POST['title'];
            $content = $_POST['content']; 
            $file_img = $_FILES['image'];
            
            // Xử lý ảnh nếu có ảnh mới
            if (isset($file_img['tmp_name']) && $file_img['tmp_name'] != '') {
                $source_file = $file_img['tmp_name'];
                if (!getimagesize($source_file)) {
                    exit("File không phải là hình ảnh.");
                }
                $target_file = 'img/' . $file_img['name'];
                move_uploaded_file($source_file, $target_file);
                $img_name = $target_file;
            } else {
                // Giữ ảnh cũ nếu không có ảnh mới
                $img_name = $articlesEdit['img'];
            }
    
            // Lấy category_id từ form
            // Nếu không có giá trị mới từ form, giữ nguyên giá trị cũ
            $category_id = $_POST['categories_id'] ?? $articlesEdit['categories_id'];
    
            if ($articlesModel->updateWithCategory($id, $title, $content, $img_name, $category_id)) {
                header("Location: index.php?route=lissting"); 
                exit();
            } else {
                echo "Cập nhật thất bại";
            }
        }
    }
    
    public function delete($id) {
        $articlesModel = new Articles();
        
        if ($articlesModel->deleteById($id)) {
            header("Location: index.php?route=lissting");
            exit();
        } else {
            echo "Xóa bài viết thất bại";
        }
    }
}
?>
