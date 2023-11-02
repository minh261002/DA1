<?php 
    session_start();
    ob_start();

    //db
    require_once "../models/pdo.php";
    //user
    require_once "../models/user.php";

    //kiêm tra phiên đăng nhập admin
    if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
        $admin = $_SESSION["admin"];
        extract($admin);
    } else{
        header('Location: login.php');
    }

    require_once 'views/header.php';

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            //dăng xuất
            case 'logout':
                if (isset($_SESSION["admin"]) && count($_SESSION["admin"]) > 0) {
                    session_destroy();
                }
                header('Location: index.php');
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

    require_once 'views/footer.php';

ob_end_flush();
?>