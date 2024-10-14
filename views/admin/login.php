<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-top: 10px;
    }

    footer {
        text-align: center;
        margin-top: 20px;
    }

    .signup-link {
        margin-top: 15px;
        color: #007bff;
        font-size: 14px;
    }

    .signup-link a {
        color: #007bff;
        text-decoration: none;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }
</style>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form action="" method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

            <button type="submit" name="submit-login">Đăng Nhập</button>

            <!-- hien thi loi neu co -->
            <?php if (isset($ERROR) && !empty($ERROR)): ?>
                <p class="error"><?php echo $ERROR; ?></p>
            <?php endif; ?>
        </form>

        <!-- lien ket den trang dang ky -->
        <p class="signup-link">Chưa có tài khoản? <a href="index.php?route=signup">Đăng ký ngay</a></p>

        <footer>
            <p>&copy;FPT SAY HI</p>
        </footer>   
    </div>
</body>
</html>
