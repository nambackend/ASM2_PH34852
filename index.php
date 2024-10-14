<?php

require_once('controller/HomeController.php');
require_once('controller/admin/LoginController.php');
require_once('controller/admin/ArticlesController.php'); 

$route = isset($_GET['route']) ? $_GET['route'] : '';
switch($route) {
    case 'add':
        $articles = new ArticlesController();
        $articles->create(); 
        break;

    case 'lissting': 
        $articles = new ArticlesController();
        $articles->lissting();
        break;

    case 'home':
        $home = new HomeController();
        $home->showArticles();
        break;

    case 'login':
        $login = new LoginController();
        $login->Loging();
        break;
    case 'logout':
        $login = new LoginController();
        $login->Logout();
        break;   

    case 'signup':
        $login = new LoginController();
        $login->siguping();
        break;

    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $edit = new ArticlesController();
        $edit->edit($id);
        break;

    case 'delete': 
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $articles = new ArticlesController();
        $articles->delete($id);
        break;

    default: 
        $login = new LoginController();
        $login->Loging();
        break;   
}
