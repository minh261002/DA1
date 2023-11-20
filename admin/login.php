<?php
session_start();
ob_start();

require_once "../models/pdo.php";
require_once "../models/user.php";

if (isset($_POST["admin-login"]) && ($_POST["admin-login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $admin = checkUser($username, $password);
    if (isset($admin) && is_array($admin) && count($admin) > 0) {
        extract($admin);

        if ($role == 1) {
            $_SESSION["admin"] = $admin;
            header('Location: index.php');
        } else {
            $message = "Bạn Không Có Quyền Đăng Nhập Trang Quản Trị";
        }
    } else {
        $message = "Tài Khoản Này Không Tồn Tại";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <style>
        .err {
            color: red;
        }

        .form-control:focus {
            border: 1px solid #333;
            box-shadow: initial;
        }
    </style>
</head>

<body>
    <main>
        <div class="container login-admin" style="width:500px; margin:0 auto;">
            <img class="d-block my-3" src="../assets/img/logo_owenstore.svg" width="100%">
            <h2 class="text-center">Đăng Nhập</h2>
            <?php
            if (isset($message) && ($message != "")) {
                echo '<p class="err"> ' . $message . ' </p>';
            }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group mb-3">
                    <label for="username">Tên Đăng Nhập</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <span class="err" id="usernameErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="err" id="passwordErr"></span>
                </div>

                <div class="form-group mb-3">
                    <input type="submit" value="Đăng Nhập" name="admin-login" class="btn-form">
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>