<?php
session_start();
ob_start();

//db
require_once "../models/pdo.php";
//user
require_once "../models/user.php";
require_once "../models/func-user.php";
require_once "../models/func-category.php";
require_once "../models/func-product.php";
//kiêm tra phiên đăng nhập admin
// if (isset($_SESSION["admin"]) && is_array($_SESSION["admin"]) && (count($_SESSION["admin"]) > 0)) {
//     $admin = $_SESSION["admin"];
//     extract($admin);
// } else {
//     header('Location: login.php');
// }

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
                $kq=render_category();
                require_once 'views/form-category.php';
                break;
                
                case 'user':
                    $user= render_alluser();
                    require_once 'views/form-user.php';
                    break;
                    case 'product':
                        $kq = render_category();
                        $dssp =  render_allproduct();
                        require_once 'views/form-product.php';
                            break; 
                            case 'create-user':
                                if((isset($_POST['themmoi']))&&($_POST['themmoi'])){

                                    $id =$_POST['id'];
                                    $username =$_POST['username'];
                                    $password =$_POST['password'];
                                    $fullname =$_POST['fullname'];
                                    $dateOfBirth = $_POST['dateOfBirth'];
                                    $gender = $_POST['gender'];
                                    $email =$_POST['email'];
                                    $phone =$_POST['phone'];
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

                                    $ban =$_POST['ban'];
                                    $role =$_POST['role'];
                              
                                    // if($_FILES['image']['name']!="") $image=$_FILES['image']['name']; else $image="";
                                  $target_dir = "../Uploads/";
                                
                                  $target_file = $target_dir . basename($_FILES['avatar']['name']);

                                  $avatar=$target_file;
                                  $uploadOk = 1;
                                  $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                  if($avatarFileType != "jpg" && $avatarFileType !="png" && $avatarFileType !="jpeg"
                                  && $avatarFileType != "gif"){
                                    $uploadOk = 0;
                                  }
                                  move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                                  create_user($id, $avatar, $username, $password, $fullname,$dateOfBirth, $gender, $email, $phone, $address, $ban, $role);


                                } 
                                
                                // load all danh mục 
                                $kq = render_category();
                                // load all sp
                                $user= render_alluser();
                                require_once 'views/form-user.php';
                                    break;
                                   
                                    case 'update-user':
                                        if(isset($_GET['id'])){
                                            $id=$_GET['id'];
                                            $one=getoneuser($id);
                                            // echo $id;
                                            // print_r($one);
                                        }
                                        if((isset($_POST['themmoi']))&&($_POST['themmoi'])){

                                            $id =$_POST['id'];
                                            $username =$_POST['username'];
                                            $password = $_POST['password'];
                                    

                                            $fullname =$_POST['fullname'];
                                            $dateOfBirth = $_POST['dateOfBirth'];
                                            $gender = $_POST['gender'];
                                            $email =$_POST['email'];
                                            $phone =$_POST['phone'];
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
        
                                            $ban =$_POST['ban'];
                                            $role =$_POST['role'];
                                      
                                            // if($_FILES['image']['name']!="") $image=$_FILES['image']['name']; else $image="";
                                          $target_dir = "../Uploads/";
                                        
                                          $target_file = $target_dir . basename($_FILES['avatar']['name']);
        
                                          $avatar=$target_file;
                                          $uploadOk = 1;
                                          $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                          if($avatarFileType != "jpg" && $avatarFileType !="png" && $avatarFileType !="jpeg"
                                          && $avatarFileType != "gif"){
                                            $uploadOk = 0;
                                          }
                                          move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                                          updateuser($id,$avatar,$username, $password, $fullname,$dateOfBirth, $gender, $email,$phone,$address, $ban, $role);
        
        
                                        } 
                                        
                                        // load all danh mục 
                                        $kq = render_category();
                                        // load all sp
                                        $user= render_alluser();
                                        require_once 'views/updateuser.php';
                                            break;
                                            case 'del-user':
                                                if(isset($_GET['id'])){
                                                    $id=$_GET['id'];
                                                    deluser($id);
                                                }
                                                $kq = render_category();
                                                // load all sp
                                                $user= render_alluser();
                                                // $user=getall_user();
                                                require_once 'views/form-user.php';
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