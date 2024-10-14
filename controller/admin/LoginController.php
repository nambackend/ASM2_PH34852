<?php
session_start();

class LoginController {
    public function Loging() {
        include_once 'model/account.php';  
        include_once 'model/articles.php';
        include_once 'model/connect.php';

        
        global $ERROR;
        $ERROR = ""; 

        if (isset($_POST['submit-login'])) {
            $account = new Account();
            $arrLogin = $account->login($_POST['username'], $_POST['password']);
            
            if ($arrLogin) {
                $_SESSION['user'] = $arrLogin;
                header('Location:http://localhost/asm1/?route=home');
                exit(); 
            } else {
                $ERROR = "Sai tên đăng nhập hoặc mật khẩu"; 
            }
        }

        include_once 'views/admin/login.php'; // gọi view thông báo lỗi nếu có
    }
    public function Logout() {
        
        session_start();
        session_unset();
        session_destroy();
        
        header("Location: index.php?route=login");
        exit();
    }


    public function siguping() {
        include_once 'model/account.php';  
        include_once 'model/articles.php';
        include_once 'model/connect.php';

        global $ERROR; 
        $ERROR = ""; 

        if (isset($_POST['submit-signup'])) {
            $account = new Account();
            $resultCheck = $account->checkUser($_POST['username']); 
            
            if ($resultCheck) {
                $ERROR = "Tên đăng nhập đã tồn tại"; 
            } else {
                $signup = $account->signup($_POST['username'], $_POST['password']);
                if ($signup) {
                    $_SESSION['signup'] = $signup;
                    header('location: http://localhost:/asm1/?route=home');
                    exit(); 
                } else {
                    $ERROR = "Đăng ký thất bại"; 
                }
            }
        }

        include_once 'views/admin/signup.php'; 
    }
}
?>
