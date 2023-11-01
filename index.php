<?php 
    session_start(); 
    ob_start();

    //connect db
    require_once "models/pdo.php";

    require_once "views/header.php";
    
    //router
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            //trang chủ
            case 'home':
                require_once 'views/home.php';
                break;
            //trang đăng nhập
            case 'login':
                require_once 'views/login.php';
                break;

            //chức năng đăng nhập
            case 'login-function':
                break;
            
            //trang đằng ký
            case 'register':
                require_once 'views/register.php';
                break;

            //chức năng đăng ký
            case 'register-function':
                break;

            //trang chi tiết sản phẩm
            case 'details':
                require_once 'views/details.php';
                break;
                
            default:
                // http_response_code(404);
                // require_once "views/404page.php";
                require_once "views/home.php";
                break;
                
        }
    } else {
            require_once 'views/home.php';
    }

    require_once "views/footer.php";
    
    ob_end_flush();
?>