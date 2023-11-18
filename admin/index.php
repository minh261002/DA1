<?php
session_start();
ob_start();

//db
require_once "../models/pdo.php";
//user
require_once "../models/user.php";

require_once "../models/func-user.php";

require_once "../models/category.php";

require_once "../models/func-product.php";

require_once "../models/product.php";

require_once "../models/bill.php";


$bill_unconfirmed = get_bill_unconfimred();

//kiêm tra phiên đăng nhập admin
if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
    $admin = $_SESSION["admin"];
    extract($admin);
} else {
    header('Location: login.php');
}

require_once 'views/header.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
            //dăng xuất
            // case 'logout':
            //     if (isset($_SESSION["admin"]) && count($_SESSION["admin"]) > 0) {
            //         session_destroy();
            //     }
            //     header('Location: index.php');
            //     break;

            // CRUD danh mục
        case 'category':
            //show danh mục
            $list_category = get_category();

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

                category_insert($category_name, $category_img, $category_home);

                $message = "Thêm danh mục thành công!";
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

                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["category_img"]["name"]);

                if (!empty($category_img)) {
                    move_uploaded_file($_FILES["category_img"]["tmp_name"], $target_file);
                    update_category($category_id, $category_img, $category_name, $category_home);
                } else {
                    update_category($category_id, $category_img_old, $category_name, $category_home);
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


        case 'user':
            $user = render_alluser();
            require_once 'views/form-user.php';
            break;

        case 'product':
            $kq = render_category();
            $dssp = render_allproduct();
            require_once 'views/form-product.php';
            break;

        case 'create-user':
            if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {

                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $fulladdress = $_POST['fulladdress'];
                $address = array(
                    'city' => $city,
                    'district' => $district,
                    'ward' => $ward,
                    'fulladdress' => $fulladdress
                );

                $ban = $_POST['ban'];
                $role = $_POST['role'];

                // if($_FILES['image']['name']!="") $image=$_FILES['image']['name']; else $image="";
                $target_dir = "../Uploads/";

                $target_file = $target_dir . basename($_FILES['avatar']['name']);

                $avatar = $target_file;
                $uploadOk = 1;
                $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (
                    $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
                    && $avatarFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                create_user($id, $avatar, $username, $password, $fullname, $dateOfBirth, $gender, $email, $phone, $address, $ban, $role);
            }

            // load all danh mục 
            $kq = render_category();
            // load all sp
            $user = render_alluser();
            require_once 'views/form-user.php';
            break;

        case 'update-user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $one = getoneuser($id);
                // echo $id;
                // print_r($one);
            }
            if ((isset($_POST['themmoi'])) && ($_POST['themmoi'])) {

                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['password'];


                $fullname = $_POST['fullname'];
                $dateOfBirth = $_POST['dateOfBirth'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $district = $_POST['district'];
                $ward = $_POST['ward'];
                $fulladdress = $_POST['fulladdress'];
                $address = array(
                    'city' => $city,
                    'district' => $district,
                    'ward' => $ward,
                    'fulladdress' => $fulladdress
                );

                $ban = $_POST['ban'];
                $role = $_POST['role'];

                // if($_FILES['image']['name']!="") $image=$_FILES['image']['name']; else $image="";
                $target_dir = "../Uploads/";

                $target_file = $target_dir . basename($_FILES['avatar']['name']);

                $avatar = $target_file;
                $uploadOk = 1;
                $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (
                    $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
                    && $avatarFileType != "gif"
                ) {
                    $uploadOk = 0;
                }
                move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                updateuser($id, $avatar, $username, $password, $fullname, $dateOfBirth, $gender, $email, $phone, $address, $ban, $role);
            }

            // load all danh mục 
            $kq = render_category();
            // load all sp
            $user = render_alluser();
            require_once 'views/updateuser.php';
            break;
        case 'del-user':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deluser($id);
            }
            $kq = render_category();
            // load all sp
            $user = render_alluser();
            // $user=getall_user();
            require_once 'views/form-user.php';
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


            // case 'adddm':
            //     if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
            //         $tendm=$_POST['tendm'];
            //         $uutien=$_POST['uutien'];
            //         $hienthi=$_POST['hienthi'];
            //         themdm($tendm,$uutien,$hienthi);
            //     }
            //     $kq=render_category();
            //    include "view/danhmuc.php";
            //         break;
            // case 'updatedmform':
            //     if(isset($_GET['id'])){
            //         $id=$_GET['id'];
            //         $kq1=getonedm($id);
            //     }
            //     if(isset($_POST['id'])){
            //         $id=$_POST['id'];
            //         $tendm=$_POST['tendm'];
            //         $uutien=$_POST['uutien'];
            //         $hienthi=$_POST['hienthi'];
            //         updatedm($id,$tendm,$uutien,$hienthi);
            //     }
            //     $kq=getall_dm();
            //     include "adminfunc/updatedmform.php";
            //     break;
            // case 'deldm':
            //     if(isset($_GET['id'])){
            //         $id=$_GET['id'];
            //         deldm($id);
            //     }
            //     $kq=getall_dm();
            //     include "view/danhmuc.php";
            //     break;   
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
