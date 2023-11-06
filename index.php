<?php 
    session_start(); 
    ob_start();

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
        $_SESSION["total_order"] = 0;
    }

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
                        $list_product = get_products_by_category($categoryId);
                    } else {
                        $siblingsCategories = get_list_category($categoryId);
                        $categoryIds = array_column($siblingsCategories, 'id');
                        $categoryIds[] = $categoryId;
                        $list_product = get_products_by_category_ids($categoryIds);
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

            //thêm vào giỏ hàng
            case 'addToCart':
                if (isset($_POST['btn-addToCart'])) { 
                    $product_id = $_POST['product-id'];
                    $product_img = $_POST['product-img'];
                    $product_name = $_POST['product-name'];
                    $product_size = $_POST['size'];
                    $product_color = $_POST['color'];
                    $product_quantity = $_POST['quantity'];
                    $product_price = $_POST['product-price'];
                
                    $pdCart = array(
                        "id" => $product_id,
                        "img" => $product_img,
                        "name" => $product_name,
                        "size" => $product_size, 
                        "color" => $product_color,
                        "quantity" => $product_quantity,
                        "price" => $product_price
                    );
                
                    if (!isset($_SESSION["cart"])) {
                        $_SESSION["cart"] = array();
                    }
            
                    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
                    $product_exists = false;
                    foreach ($_SESSION["cart"] as &$item) {
                        if ($item["id"] == $product_id) {
                            $item["quantity"] += $product_quantity;
                            $product_exists = true;
                            break;
                        }
                    }
            
                    if (!$product_exists) {
                        // Nếu sản phẩm chưa tồn tại, thêm nó vào giỏ hàng
                        array_push($_SESSION["cart"], $pdCart);
                    }
            
                    header('Location: index.php?page=cart');
                    exit;
                }
                break;
            

            case 'cart':
                if (isset($_GET['act']) && $_GET['act'] == 'del1' && isset($_GET['id'])) {
                    $product_id = $_GET['id'];
                    foreach ($_SESSION["cart"] as $key => $pdCart) {
                        if ($pdCart["id"] == $product_id) {
                            unset($_SESSION["cart"][$key]);
                        }
                    }
                
                    $_SESSION["total_price"] = 0;
                    foreach ($_SESSION["cart"] as $pdCart) {
                        $_SESSION["total_price"] += $_SESSION["subtotal"];
                    }
                }
                

                if (isset($_GET['act']) && $_GET['act'] == 'del_all') {
                    unset($_SESSION["cart"]);
                    $_SESSION["total_price"] = 0;
                    header('Location: index.php?page=home');
                }

                require_once "views/cart.php";
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