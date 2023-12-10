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
//cart
require_once "models/cart.php";
//bill
require_once "models/bill.php";
// checkout
require_once "models/checkout.php";
//feedback
require_once "models/feedback.php";
//vnpay
require_once "models/config_vnpay.php";


require_once "views/header.php";

//data home page
$flashSaleProducts = get_product_flash_sale();
$new_product = get_new_product();
$hot_product = get_hot_product();
$view_product = get_view_product();

$list_category = get_category();


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
                $bill = $_POST["bill"];

                $result = checkUser($username, $password);

                if (is_array($result) && count($result) > 0) {
                    if ($result['ban'] == 1) {
                        $error_message = "Tài khoản của bạn đã bị khóa";
                        $_SESSION["message"] = $error_message;
                        header('Location: index.php?page=login');
                    } else {
                        $_SESSION["user"] = $result;

                        if (isset($bill) && $bill == 1) {
                            header('Location: index.php?page=checkout');
                        } else {
                            header('Location: index.php?page=home');
                        }
                    }
                } else {
                    $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
                    $_SESSION["message"] = $error_message;

                    header('Location: index.php?page=login');
                }
            }

            break;

        case 'login-bill':

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
                    $re_message = "Đăng Ký Thành Công! <a>Đăng Nhập Ngay</a>";
                    $_SESSION["message_success"] = $re_message;
                    header('Location: index.php?page=login');
                }
            }

            break;

            //đăng xuất
        case 'logout':
            if (isset($_SESSION["user"]) && count($_SESSION["user"]) > 0) {
                unset($_SESSION["user"]);
            }
            header('Location: index.php?page=login');
            break;

            //trang đổi mật khẩu
        case 'changePassword':
            require_once "views/changePassword.php";
            break;

            //chức năng đổi mật khẩu
        case 'change-function':
            if (isset($_POST["btn-change"]) && $_POST["btn-change"]) {
                $password = $_POST["password"];

                $current_password_result = get_user_password($id);

                if ($current_password_result === $password) {
                    $password_new = $_POST["password_new"];

                    user_change_password($id, $password_new);

                    $message = "Thay đổi mật khẩu thành công";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=changePassword');
                } else {
                    $message = "Mật khẩu nhập vào không chính xác";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=changePassword');
                }
            }
            break;

            //trang sản phẩm
        case 'product':
            $list_category = get_category();
            $all_product = [];
            $showPagination = true; // Mặc định hiển thị phân trang

            if (!isset($_GET['id'])) {
                $id = 0;
                $all_product = product_select_page();
            } else {
                $categoryId = $_GET['id'];
                if ($categoryId === 'all') {
                    $all_product = product_select_page();
                } else {
                    $all_product = get_products_by_category($categoryId);
                    $showPagination = false;
                }
            }
            require_once 'views/product.php';
            break;

        case 'profile':
            require_once 'views/profile.php';
            break;

            //trang chi tiết sản phẩm
        case 'details':
            if (isset($_GET['id'])) {
                $id_product = $_GET['id'];
                product_view($id_product);
                $details = get_product_by_id($id_product);
                $variant = get_product_by_variant($id_product);

                $feedback = show_feedback_by_id_product($id_product);
            }
            require_once 'views/details.php';
            break;


        case 'checkout':

            if (isset($_POST['order'])) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $detailAddress = $_POST['detailAddress'];
                $transport = $_POST['transport'];
                $total_cart = $_SESSION['total_price'];
                if (isset($_SESSION['discounted'])) {
                    $voucher = $_SESSION['discounted'];
                } else {
                    $voucher = 0;
                }

                if ($transport == 1) {
                    $total_price = $total_cart + 15000;
                } else if ($transport == 2)
                    $total_price = $total_cart + 10000;
                else
                    $total_price = $total_cart + 5000;

                echo $total_price;

                $address = array(
                    'city' => $city,
                    'district' => $district,
                    'ward' => $ward,
                    'detail' => $detailAddress,
                );

                $notes = $_POST['notes'];
                $transport = $_POST['transport'];
                $payMethod = $_POST['method'];

                if (isset($_SESSION['user'])) {
                    $idUser = $_SESSION['user']['id'];
                } else {
                    $idUser = 0;
                }
                $code_confirm = rand(100000, 1000000);


                if ($payMethod == 1) {

                    // insert and get id last insert
                    $idBill = insert_bill($idUser, $fullname, $email, $phone, $address, $notes, $voucher, $payMethod, $transport);

                    if ($_SESSION['cart']) {
                        $carts = $_SESSION['cart'];
                        foreach ($carts as $product) {
                            $idProduct = $product['id'];
                            $img = $product['img'];
                            $name = $product['name'];
                            $size = $product['size'];
                            $color = $product['color'];
                            $quantity = $product['quantity'];
                            $price = $product['price'];
                            insert_bill_detail($idProduct, $idBill, $name, $img, $price, $quantity, $size, $color);

                            unset($_SESSION['cart']);
                            unset($_SESSION['subtotal']);
                            unset($_SESSION['total_price']);
                            unset($_SESSION['discounted']);
                            header('location: index.php?page=order-success&idbill=' . $idBill . '');
                        }
                    }
                } else if ($payMethod == 2) {
                    $idBill = insert_bill($idUser, $fullname, $email, $phone, $address, $notes, $voucher, $payMethod, $transport);
                    if ($_SESSION['cart']) {
                        $carts = $_SESSION['cart'];
                        foreach ($carts as $product) {
                            $idProduct = $product['id'];
                            $img = $product['img'];
                            $name = $product['name'];
                            $size = $product['size'];
                            $color = $product['color'];
                            $quantity = $product['quantity'];
                            $price = $product['price'];
                            insert_bill_detail($idProduct, $idBill, $name, $img, $price, $quantity, $size, $color);

                            unset($_SESSION['cart']);
                            unset($_SESSION['subtotal']);
                            unset($_SESSION['total_price']);
                            unset($_SESSION['discounted']);
                            header('location: index.php?page=order-success&idbill=' . $idBill . '');
                        }
                    }
                    $vnp_TxnRef = $idBill; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Thanh toán đơn hàng bằng vnpay';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $total_price * 100;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = '';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    //Add Params of 2.0.1 Version
                    $vnp_ExpireDate = $expire;

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                        "vnp_ExpireDate" => $vnp_ExpireDate,

                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00',
                        'message' => 'success',
                        'data' => $vnp_Url
                    );
                    if (isset($_POST['order'])) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                } else if ($payMethod == 3) {

                    function execPostRequest($url, $data)
                    {
                        $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt(
                            $ch,
                            CURLOPT_HTTPHEADER,
                            array(
                                'Content-Type: application/json',
                                'Content-Length: ' . strlen($data)
                            )
                        );
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                        //execute post
                        $result = curl_exec($ch);
                        //close connection
                        curl_close($ch);
                        return $result;
                    }

                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = round($total_price);
                    $orderId = time() . "";
                    $redirectUrl = "http://localhost/DA1/index.php?page=momo&iduser=" . $idUser . "&fullname=" . $fullname . "&email=" . $email . "&phone=" . $phone . "&address=" . json_encode($address) . "&notes=" . $notes . "&voucher=" . $voucher . "&paymethod=" . $payMethod . "&transport=" . $transport . "";
                    $ipnUrl = "http://localhost/DA1/index.php?page=momo";
                    $extraData = "";

                    if (!empty($_POST)) {

                        $requestId = time() . "";
                        $requestType = "payWithATM";
                        //before sign HMAC SHA256 signature
                        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                        $signature = hash_hmac("sha256", $rawHash, $secretKey);
                        $data = array(
                            'partnerCode' => $partnerCode,
                            'partnerName' => "Test",
                            "storeId" => "MomoTestStore",
                            'requestId' => $requestId,
                            'amount' => $amount,
                            'orderId' => $orderId,
                            'orderInfo' => $orderInfo,
                            'redirectUrl' => $redirectUrl,
                            'ipnUrl' => $ipnUrl,
                            'lang' => 'vi',
                            'extraData' => $extraData,
                            'requestType' => $requestType,
                            'signature' => $signature
                        );
                        $result = execPostRequest($endpoint, json_encode($data));
                        $jsonResult = json_decode($result, true);  // decode json

                        //Just a example, please check more in there

                        header('Location: ' . $jsonResult['payUrl']);
                    }
                }
            }

            require_once 'views/checkout.php';
            break;

        case 'order':
            //check session user
            if (isset($_SESSION['user'])) {

                $order = isset($_GET['order']) ? $_GET['order'] : null;
                $id_user = $_SESSION['user']['id'];

                $bill_user = get_bill_user($id_user, $order);
            }

            require_once 'views/order.php';
            break;

        case 'order-success':
            require_once 'views/order_success.php';
            break;

        case 'momo':
            $idUser = $_GET['iduser'];
            $fullname = $_GET['fullname'];
            $email = $_GET['email'];
            $phone = $_GET['phone'];
            $address = $_GET['address'];
            $notes = $_GET['notes'];
            $payMethod = $_GET['paymethod'];
            $transport = $_GET['transport'];
            $voucher = $_GET['voucher'];


            $idBill = insert_bill($idUser, $fullname, $email, $phone, json_decode($address), $notes, $voucher, $payMethod, $transport);
            if ($_SESSION['cart']) {
                $carts = $_SESSION['cart'];
                foreach ($carts as $product) {
                    $idProduct = $product['id'];
                    $img = $product['img'];
                    $name = $product['name'];
                    $size = $product['size'];
                    $color = $product['color'];
                    $quantity = $product['quantity'];
                    $price = $product['price'];
                    insert_bill_detail($idProduct, $idBill, $name, $img, $price, $quantity, $size, $color);

                    unset($_SESSION['cart']);
                    unset($_SESSION['subtotal']);
                    unset($_SESSION['total_price']);
                    unset($_SESSION['discounted']);
                    header('location: index.php?page=order-success&idbill=' . $idBill . '');
                }
            }

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

                $total_price = 0;
                foreach ($_SESSION["cart"] as $pdCart) {
                    extract($pdCart);
                    $subtotal = (float) $price * (float) $quantity;
                    $total_price += $subtotal;
                }
            }

            if (isset($_GET['act']) && $_GET['act'] == 'del_all') {
                unset($_SESSION["cart"]);
                unset($_SESSION["total_order"]);
                unset($_SESSION["total_price"]);
                unset($_SESSION["subtotal"]);
                unset($_SESSION["temporary"]);
                unset($_SESSION["discounted"]);
                $total_price = 0;
                header('Location: index.php?page=home');
            }

            require_once "views/cart.php";
            break;

        case 'update_user':
            if (isset($_POST['btn_update_user'])) {
                $id = $_SESSION['user']['id'];
                $avatar = $_FILES['avatar']['name'];
                $avatar_old = $_POST['avatar_old'];
                $fullname = $_POST['fullname'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                //địa chỉ kiểu json

                $province = $_POST['province'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $address_detail = $_POST['detail'];
                $address = array(
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                    'detail' => $address_detail
                );

                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);


                if ($avatar == null)
                    update_user($id, $avatar_old, $fullname, $dateOfBirth, $gender, $phone, $email, $address);
                else {
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                    update_user($id, $avatar, $fullname, $dateOfBirth, $gender, $phone, $email, $address);
                }

                $updatedUserInfo = getUpdatedUserInfo($id);
                $_SESSION['user'] = $updatedUserInfo;

                header("location: index.php?page=profile");
            }
            break;

        case "search":

            require_once 'views/search.php';
            break;

        case 'search_bill':

            if (isset($_POST['btn-search-bill']) && $_POST['btn-search-bill']) {
                $id_bill = $_POST['search_bill'];

                $bill = bill_search($id_bill);

                if (isset($bill['id'])) {
                    $bill_detail = bill_detail_search($bill['id']);
                }
            }

            require_once 'views/search_bill.php';
            break;

        case 'acp_bill':
            if (isset($_GET['id'])) {
                $id_bill = $_GET['id'];
                acp_bill($id_bill);
                pay_bill($id_bill);

                header('location: index.php?page=order');
            }
            break;

        case 'vote':

            if (isset($_POST['btn-form-rating'])) {
                $id_bill = $_POST['id_bill'];
                $id_product = $_POST['id_product'];
                $name_product = $_POST['name_product'];
                $img_product = $_POST['img_product'];
                $size = $_POST['size'];
                $color = $_POST['color'];
                $quantity = $_POST['quantity'];
                $id_bill_details = $_POST['id_bill_details'];
            }

            if (isset($_POST['btn-send-rating'])) {
                $rating = $_POST['rating'];
                $content = $_POST['content'];
                $id_user = $_SESSION['user']['id'];
                $id_product = $_POST['id_product'];
                $id_bill_details = $_POST['id_bill_details'];

                user_inser_feddback($id_user, $id_product, $rating, $content);

                feedback_confirm($id_bill_details);

                echo '<script>
                    alert("Cảm ơn bạn đã đánh giá sản phẩm");

                    window.location.href = "index.php?page=order";
                </script>';
            }

            require_once 'views/vote.php';
            break;

        default:
            http_response_code(404);
            require_once "views/404page.php";
            break;
    }
} else {
    require_once 'views/home.php';
}

require_once "views/footer.php";

ob_end_flush();
