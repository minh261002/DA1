<?php 
    session_start(); 
    ob_start();

    //connect db
    require_once "models/pdo.php";
    //user
    require_once "models/user.php";
    //category
    require_once 'models/category.php';
    //product
    require_once "models/product.php";

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
                if (isset($_POST["btn-login"]) && $_POST["btn-login"]) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
    
                    // Xử lý kiểm tra đăng nhập
                    $result = checkUser($username, $password);
    
                    if (is_array($result) && count($result) > 0) {
                        $_SESSION["user"] = $result;
                        extract($result);
                        header('Location: index.php');
                    } else {
                        // Đăng nhập không thành công, đặt thông báo lỗi
                        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
                        $_SESSION["message"] = $error_message;
                        header('Location: index.php?page=login');
                    }
                }
                
                break;
            
            //trang đằng ký
            case 'register':
                require_once 'views/register.php';
                break;

            //chức năng đăng ký
            case 'register-function':

                // kiểm tra tồn tại nút đăng kí và nút đăng ký đc nhấn
                if (isset($_POST["btn-register"]) && $_POST["btn-register"]) {
                    //lấy thông tin từ form
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    //kiêm tra xem username đã tồn tại
                    if (usernameExists($username)) {
                        $re_message = "Tên tài khoản đã được sử dụng";
                        $_SESSION["message_re"] = $re_message;
                        header('Location: index.php?page=register');
                    //kiểm tra email đẫ tồn tại
                    } elseif (emailExists($email)) {
                        $re_message = "Địa chỉ email đã được sử dụng";
                        $_SESSION["message_re"] = $re_message;
                        header('Location: index.php?page=register');
                    } else {
                        user_insert($username, $email, $password);
                        $re_message = "Đăng Ký Thành Công!  <a href='index.php?page=login'>Đăng Nhập Ngay</a>";
                        $_SESSION["message_re"] = $re_message;
                        header('Location: index.php?page=register');
                    }
                }
                
                break;

            //đăng xuất
            case 'logout':
                if (isset($_SESSION["user"]) && count($_SESSION["user"]) > 0) {
                    session_destroy();
                }
                header('Location: index.php?page=login');
                break;

            //trang đổi mật khẩu
            case 'changePassword':
                require_once "views/changePassword.php";
                break;

            //chức năng đổi mật khẩu
            case 'change-function':
                if(isset($_POST["btn-change"]) && $_POST["btn-change"]){
                    $password = $_POST["password"];
                    $password_new = $_POST["password_new"];

                    if (password_verify($password, $password_new)) {
                        user_change_password($id, $password_new);

                        $message = "Thay đổi mật khẩu thành công";
                        $_SESSION["message"] = $message;
                        header("location: index.php?page=changePassword");
                    }else{
                        $message = "Mật khẩu không chính xác";
                        $_SESSION["message"] = $message;
                        header("location: index.php?page=changePassword");
                    }
                }
                break;

            //trang sản phẩm
            case 'product':
                $categoryId = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
                
                $parentCategoryId = null;
                $siblingsCategories = [];
                $products = [];
            
                if ($categoryId) {
                    $currentCategory = get_category($categoryId);
                    
                    if ($currentCategory && $currentCategory['parent_id'] != null) {
                        $parentCategoryId = $currentCategory['parent_id'];
                        $siblingsCategories = get_list_category($parentCategoryId);
                        $products = get_products_by_category($categoryId);
                    } else {
                        $siblingsCategories = get_list_category($categoryId);
                        $categoryIds = array_column($siblingsCategories, 'id');
                        $categoryIds[] = $categoryId;
                        $products = get_products_by_category_ids($categoryIds);
                    }
                }
                require_once 'views/product.php';
                break;
            
                       
            //trang chi tiết sản phẩm
            case 'details':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    product_view($id);
                    $details = get_product_by_id($id);
                }

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