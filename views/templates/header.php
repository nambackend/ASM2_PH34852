<!DOCTYPE html>
<html lang="vi">
<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;  
            padding: 0;
            background-color: #f9f9f9;
        }

        header, footer {
            background: #333; 
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            width: 100%; 
            max-width: 850px; 
            margin: 0 auto; 
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #f39c12;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .category {
            margin-bottom: 30px;
            padding: 15px;
            border-left: 5px solid #3498db;
        }

        .category h3 {
            color: #333;
            font-size: 1.6em;
        }

        .article {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .article h4 {
            margin: 0;
            color: #2980b9;
            font-size: 1.4em;
        }

        .article p {
            color: #555;
            line-height: 1.6;
        }

        .article-img {
            width: 100%;         
            height: 200px;      
            object-fit: cover;   
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            nav ul li {
                display: block;
                margin: 10px 0;
            }

            .article h4 {
                font-size: 1.2em;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
</head>
<body>
    <header>
        <h1>Trang Tin Tức</h1>
        <nav>
            <ul>
                <li><a href="#">Trang Chủ</a></li>
                <li><a href="#">Tin Mới</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </nav>
        <div class="add-article">
            <a href="http://localhost/asm1/?route=lissting" class="btn">Thêm Tin Tức</a>
        </div>
    </header>

    <div class="content">
        <!-- Nội dung bài viết sẽ được chèn ở đây -->
    </div>
</body>
</html>
