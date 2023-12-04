<?php
session_start();
ob_start();

//db
require_once "../models/pdo.php";
//user
require_once "../models/user.php";

require_once "../models/category.php";

require_once "../models/product.php";

require_once "../models/bill.php";

require_once "../models/voucher_admin.php";

require_once "../models/statistical.php";


$bill_unconfirmed = get_bill_unconfimred();

//kiêm tra phiên đăng nhập admin
if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
    $admin = $_SESSION["admin"];
    extract($admin);
} else {
    header('Location: login.php');
}

require_once 'views/font-end/header.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        //dăng xuất
        case 'logout':
            if (isset($_SESSION["admin"]) && count($_SESSION["admin"]) > 0) {
                session_destroy();
            }
            header('Location: index.php');
            break;

        // CRUD danh mục
        case 'category':
            //show danh mục
            $list_category = admin_get_category();

            require_once 'views/category/show-category.php';
            break;

        //Thêm danh mục mới
        case 'addCategory':
            if (isset($_POST['addCategory']) && $_POST['addCategory']) {
                $category_name = $_POST['category_name'];
                $category_home = $_POST['home'];

                if (!empty($_FILES['category_img']['name'])) {
                    $category_img = $_FILES['category_img']['name'];
                } else {
                    $category_img = "default_pd.png";
                }

                $target_dir = "../Uploads/";
                $target_file = $target_dir . basename($_FILES['category_img']['name']);

                move_uploaded_file($_FILES['category_img']['tmp_name'], $target_file);


                if (category_exist($category_name)) {
                    $message = "Danh mục đã tồn tại!";
                    $_SESSION["message"] = $message;
                    header('Location: index.php?page=addCategory');
                    exit;
                } else {
                    category_insert($category_name, $category_img, $category_home);
                }
                $message = "Thêm danh mục thành công!";
                header('Location: index.php?page=category');
            }

            require_once 'views/category/add-category.php';
            break;

        //sửa danh mục
        case 'updateCategory':
            if (isset($_POST['updateCategory']) && $_POST['updateCategory']) {
                $category_id = $_POST['category_id'];
                $category_name = $_POST['category_name'];
                $category_home = $_POST['home'];
                $category_img = $_FILES['category_img']['name'];
                $category_img_old = $_POST['avatar_old'];
                $category_hide = $_POST['hide'];

                if ($category_hide == 1) {
                    admin_hide_product_by_category($category_id);
                }
                if ($category_hide == 0) {
                    admin_show_product_by_category($category_id);
                }

                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["category_img"]["name"]);

                if (!empty($category_img)) {
                    move_uploaded_file($_FILES["category_img"]["tmp_name"], $target_file);
                    update_category($category_id, $category_img, $category_name, $category_home, $category_hide);
                } else {
                    update_category($category_id, $category_img_old, $category_name, $category_home, $category_hide);
                }

                $message = "Cập nhật danh mục thành công!";
                $_SESSION["message"] = $message;
                header('Location: index.php?page=category');
            }

            require_once 'views/category/update-category.php';
            break;

        //xóa danh mục
        case 'delCategory':
            if (isset($_GET["id"])) {
                $category_id = $_GET["id"];

                $product_count_result = category_has_products($category_id);

                if ($product_count_result !== null) {
                    $product_count = $product_count_result[0]["COUNT(*)"];

                    if ($product_count > 0) {
                        $message = "Danh mục có sản phẩm, không thể xóa.";
                        $_SESSION["message"] = $message;
                        header('location: index.php?page=category');
                    } else {
                        category_delete($category_id);
                        $message = "Xóa danh mục sản phẩm thành công ";
                        $_SESSION["message"] = $message;
                        header('location: index.php?page=category');
                        exit;
                    }
                }
            }
            break;

        case 'hideCategory':
            if (isset($_GET["id"])) {
                $category_id = $_GET["id"];

                admin_hide_category($category_id);
                admin_hide_product_by_category($category_id);

                $message = "Danh mục sản phẩm đã ngừng kinh doanh";
                $_SESSION["message"] = $message;
                header('location: index.php?page=category');
                exit;
            }
            break;

        case 'showCategory':
            if (isset($_GET["id"])) {
                $category_id = $_GET["id"];

                admin_show_cattegory($category_id);
                admin_show_product_by_category($category_id);

                $message = "Danh mục sản phẩm đã được kinh doanh";
                $_SESSION["message"] = $message;
                header('location: index.php?page=category');
                exit;
            }
            break;


        case 'user':
            $user = render_alluser();
            require_once 'views/users/show-user.php';
            break;

        case 'create-user':
            if (isset($_POST['create-user'])) {

                if (isset($_FILES['avatar']['name']) && ($_FILES['avatar']['name'] != null)) {
                    $avatar = $_FILES['avatar']['name'];
                } else {
                    $avatar = "default_user.png";
                }

                $username = $_POST['username'];
                $password = $_POST['password'];

                if (isset($_POST['fullname'])) {
                    $fullname = $_POST['fullname'];
                } else {
                    $fullname = NULL;
                }
                $email = $_POST['email'];

                if (isset($_POST['phone'])) {
                    $phone = $_POST['phone'];
                } else {
                    $phone = NULL;
                }

                if (empty($_POST['province']) && empty($_POST['district']) && empty($_POST['ward']) && empty($_POST['detail'])) {
                    $address = NULL;

                } else {
                    $province = $_POST['province'];
                    $district = $_POST['district'];
                    $ward = $_POST['ward'];
                    $detail = $_POST['detail'];

                    $address = array(
                        'province' => $province,
                        'district' => $district,
                        'ward' => $ward,
                        'detail' => $detail
                    );
                }


                $role = $_POST['role'];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $created_at = date('Y-m-d H:i:s');

                $target_dir = "../Uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

                create_user($avatar, $username, $password, $fullname, $email, $phone, $address, $role, $created_at);

                $message = "Thêm tài khoản thành công!";
                $_SESSION['message'] = $message;
                header('Location: index.php?page=user');
            }

            require_once 'views/users/create-user.php';
            break;


        case 'update-user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one = getoneuser($id);
            }

            if (isset($_POST['update_user'])) {
                $id = $_POST['id'];

                // Lấy các giá trị từ biểu mẫu
                $avatar = $_FILES['avatar']['name'];
                $avatar_old = $_POST['avatar-old'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                $ban = $_POST['ban'];

                // Địa chỉ được lấy từ các trường select trong biểu mẫu
                $province = $_POST['province'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $detail = $_POST['detail'];

                $address = array(
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                    'detail' => $detail
                );

                $target_dir = "../Uploads/";
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);

                if ($avatar != null) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    admin_update_user($id, $avatar, $username, $password, $fullname, $dateOfBirth, $gender, $email, $phone, $address, $ban, $role);
                } else {
                    admin_update_user($id, $avatar_old, $username, $password, $fullname, $dateOfBirth, $gender, $email, $phone, $address, $ban, $role);
                }

                $message = "Cập nhật thông tin thành công!";
                $_SESSION['message'] = $message;
                header('Location: index.php?page=update-user&id=' . $id);
            }

            require_once 'views/users/update-user.php';
            break;

        case 'block-user':
            if (isset($_GET['id'])) {
                $id_user = $_GET['id'];
                block_user($id_user);

                header('Location: index.php?page=user');
            }
            require_once 'views/users/show-user.php';
            break;

        case 'unblock-user':
            if (isset($_GET['id'])) {
                $id_user = $_GET['id'];
                unblock_user($id_user);

                header('Location: index.php?page=user');
            }
            require_once 'views/users/show-user.php';
            break;

        //xác nhận đơn hàng
        case 'confirm_bill':
            if (isset($_GET['id'])) {
                $bill_id = $_GET['id'];

                confirm_bill($bill_id);

                $message = "Xác nhận đơn hàng thành công!";
                $_SESSION["message"] = $message;
                header('Location: index.php');
            }
            break;

        // CRUD sản phẩm 
        // show sản phẩm
        case 'product':
            $variant = get_allvariant();
            $list_category = get_category();
            $product = render_allproduct();
            require_once 'views/product/show-product.php';
            break;

        // thêm sản phẩm
        case 'add-product':
            if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {

                $id_category = $_POST['id_category'];
                $name = $_POST['name'];
                $info = $_POST['info'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $view = $_POST['view'];
                $hot = $_POST['hot'];
                $size = $_POST['size'];
                $color = $_POST['color'];
                $quantity = $_POST['quantity'];


                // Xử lý tải lên ảnh chính
                $img_path = "";
                if ($_FILES["img"]["error"] == UPLOAD_ERR_OK) {
                    $target_dir = "../Uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        $img_path = $target_file;
                    } else {
                        $message = "Lỗi khi tải lên ảnh.";
                    }
                }

                $gallery_s = [];
                // $target_dir_gallery = "../Uploads";
                $target_dir = "../Uploads/";
                if (isset($_FILES["gallery"])) {
                    foreach ($_FILES["gallery"]["tmp_name"] as $key => $tmp_name) {
                        $gallery_image_name = $_FILES["gallery"]["name"][$key];
                        $gallery_target_file = $target_dir . basename($gallery_image_name);
                        // Chỉ xử lý ảnh nếu người dùng đã tải lên
                        if ($_FILES["gallery"]["error"][$key] == UPLOAD_ERR_OK) {
                            if (move_uploaded_file($tmp_name, $gallery_target_file)) {
                                $gallery_images[] = $gallery_target_file;
                            } else {
                                $message = "Lỗi khi tải lên ảnh trong gallery.";
                                break;
                            }
                        }
                    }
                }

                if (empty($message)) {
                    $galleryData = ["images" => $gallery_images];
                    $jsonGallery = json_encode($gallery_images);

                    // Insert product data

                    $sql = "INSERT INTO product (id_category, name, img, gallery, info, price, sale, view, hot, created_at)
                            VALUES (?,?,?,?,?,?,?,?,?,NOW())";

                    pdo_execute($sql, $id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot);

                    $id_product = insert_product($sql, $id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot);
                    // $product_id = pdo_get_connection()->lastInsertId();

                    // foreach ($_POST['size'] as $key => $size) {
                    //     $color = $_POST['color'][$key];
                    //     $quantity = $_POST['quantity'][$key];
                    // $sqlVariant = "INSERT INTO variant (id_product, size, color, quantity) VALUES (?, ?, ?, ?)";
                    // pdo_execute($sqlVariant, $product_id, $size, $color, $quantity);

                    // }

                }
                header('Location: index.php?page=product');
            }

            $variant = get_allvariant();
            $list_category = get_category();
            $product = render_allproduct();
            require_once 'views/product/add-product.php';
            break;


        // Sửa Sản Phẩm
        case 'update-product':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one = getone_product($id);
                // echo $id;
                // print_r($one);
            }
            if ((isset($_POST['capnhat'])) && ($_POST['capnhat'])) {
                $id_category = $_POST['id_category'];
                $name = $_POST['name'];
                $info = $_POST['info'];
                $price = $_POST['price'];
                $sale = $_POST['sale'];
                $view = $_POST['view'];
                $hot = $_POST['hot'];

                // Xử lý tải lên ảnh chính
                $img_path = "";
                if ($_FILES["img"]["error"] == UPLOAD_ERR_OK) {
                    $target_dir = "../Uploads/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $img_path = $target_file;
                    } else {
                        $message = "Lỗi khi tải lên ảnh.";
                    }
                }

                $gallery_img = [];
                // $target_dir_gallery = "../Uploads";
                $target_dir = "../uploads/";
                if (isset($_FILES["gallery"])) {
                    foreach ($_FILES["gallery"]["tmp_name"] as $key => $tmp_name) {
                        $gallery_img_name = $_FILES["gallery"]["name"][$key];
                        $gallery_target_file = $target_dir . basename($gallery_img_name);
                        // Chỉ xử lý ảnh nếu người dùng đã tải lên
                        if ($_FILES["gallery"]["error"][$key] == UPLOAD_ERR_OK) {
                            if (move_uploaded_file($tmp_name, $gallery_target_file)) {
                                $gallery_img[] = $gallery_target_file;
                            } else {
                                $message = "Lỗi khi tải lên ảnh trong gallery.";
                                break;
                            }
                        }
                    }
                }

                if (empty($message)) {
                    $galleryData = ["img" => $gallery_img];
                    $jsonGallery = json_encode($gallery_img);
                    if ($img_path != "" && $jsonGallery != "") {
                        try {
                            $sql = "UPDATE product SET id_category=?, name=?, img=?, gallery=?, info=?, price=?, sale=?, view=?, hot=?, created_at=NOW(), updated_at=NOW() WHERE id=?";
                            pdo_execute($sql, $id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot, $id);
                            echo "Chỉnh sửa thành công";
                        } catch (PDOException $e) {
                            echo "Chỉnh Sửa thất bại! " . $e->getMessage();
                        }
                    } else {
                        try {
                            $sql = "UPDATE product SET id_category=?, name=?,  info=?, price=?, sale=?, view=?, hot=?, created_at=NOW(), updated_at=NOW() WHERE id=?";
                            pdo_execute($sql, $id_category, $name, $info, $price, $sale, $view, $hot, $id);
                            echo "Chỉnh sửa thành công";
                        } catch (PDOException $e) {
                            echo "Chỉnh Sửa thất bại! " . $e->getMessage();
                        }
                    }

                }
                header('Location: index.php?page=product');
            }
            $variant = get_allvariant();
            $list_category = get_category();
            $product = render_allproduct();
            require_once 'views/product/update-product.php';
            break;

        // Xóa sản phẩm
        case 'del-product':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                del_sp($id);
            }
            $product = render_allproduct();
            require_once 'views/product/show-product.php';
            break;

        case 'voucher':

            require_once 'views/voucher/show_voucher.php';
            break;

        case 'update_voucher':

            if (isset($_POST['btn-update-voucher']) && $_POST['btn-update-voucher']) {
                $id_voucher = $_POST['id_voucher'];
                $name_voucher = $_POST['name_voucher'];
                $value_voucher = $_POST['value_voucher'];
                $start_voucher = $_POST['start_voucher'];
                $end_voucher = $_POST['end_voucher'];

                update_voucher($id_voucher, $name_voucher, $value_voucher, $start_voucher, $end_voucher);

                $message = "Cập nhật mã giảm giá thành công!";
                $_SESSION["message"] = $message;
                header('Location: index.php?page=voucher');
            }

            require_once 'views/voucher/update_voucher.php';
            break;

        case 'delete_voucher':
            if (isset($_GET['id'])) {
                $id_voucher = $_GET['id'];

                delete_voucher($id_voucher);

                $message = "Xóa mã giảm giá thành công!";
                $_SESSION["message"] = $message;
                header('Location: index.php?page=voucher');
            }
            break;

        case 'add_voucher':

            if (isset($_POST['btn-add-voucher']) && $_POST['btn-add-voucher']) {
                $name_voucher = $_POST['name_voucher'];
                $value_voucher = $_POST['value_voucher'];
                $start_voucher = $_POST['start_voucher'];
                $end_voucher = $_POST['end_voucher'];

                add_voucher($name_voucher, $value_voucher, $start_voucher, $end_voucher);

                $message = "Thêm mã giảm giá thành công!";
                $_SESSION["message"] = $message;
                header('Location: index.php?page=voucher');
            }

            require_once 'views/voucher/add_voucher.php';
            break;

        case 'bill':
            $bills = get_all_bill();
            require_once 'views/bill/show_bill.php';
            break;

        case 'view_product':
            $view_product_admin = view_product_admin();

            require_once 'views/statistical/view_product.php';
            break;

        case 'arrange':

            if (isset($_POST['btn-arrange']) && $_POST['btn-arrange']) {
                $selectedMonth = $_POST['selectedMonth'];
            } else {
                $selectedMonth = date('m');
            }

            $arrange = arrange($selectedMonth);
            $arrange_not_success = arrange_not_success($selectedMonth);
            $arrange_cancel = arrange_cancel($selectedMonth);

            require_once 'views/statistical/arrange.php';
            break;


        case 'buy_product':
            $buy_product_admin = buy_product_admin();

            require_once 'views/statistical/buy_product.php';
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

require_once 'views/font-end/footer.php';

ob_end_flush();