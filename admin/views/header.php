<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>

    <header class="header_admin">
        <div class="container">
            <div class="header__logo">
                <a href="index.php">
                    <img src="../assets/img/tokyolife-logo.1bafb78d.svg" width="100%">
                </a>
            </div>

            <ul class="header__menu-admin">
                <li><a href="">Danh Mục</a></li>
                <li><a href="">Sản Phẩm</a></li>
                <li><a href="">Tài Khoản</a></li>
                <li><a href="">Bình Luận</a></li>
                <li><a href="">Thống Kê</a></li>
                <li><a href="">Khác</a></li>
            </ul>

            <div class="header__admin-other flex">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.4539 22.6887C18.8432 22.112 23.0508 17.5405 23.0508 12C23.0508 6.07 18.2308 1.25 12.3008 1.25C6.37078 1.25 1.55078 6.07 1.55078 12C1.55078 17.5516 5.7753 22.1304 11.1802 22.6921C11.5505 22.7307 11.9245 22.7503 12.3009 22.7503C12.6882 22.7503 13.073 22.7296 13.4539 22.6887ZM19.3682 17.9611C20.7293 16.35 21.5508 14.269 21.5508 12C21.5508 6.9 17.4008 2.75 12.3008 2.75C7.20078 2.75 3.05078 6.9 3.05078 12C3.05078 14.2686 3.8719 16.3491 5.2325 17.9601C5.59081 17.2905 6.15938 16.6813 6.91086 16.1803C9.89086 14.2003 14.7209 14.2003 17.6909 16.1803C18.4417 16.6869 19.0099 17.2942 19.3682 17.9611ZM12.4208 13.5305H12.3508H12.2508C9.98076 13.4605 8.28076 11.6905 8.28076 9.51047C8.28076 7.29047 10.0908 5.48047 12.3108 5.48047C14.5308 5.48047 16.3408 7.29047 16.3408 9.51047C16.3308 11.7005 14.6208 13.4605 12.4508 13.5305H12.4208ZM12.3008 6.97047C10.9008 6.97047 9.77076 8.11047 9.77076 9.50047C9.77076 10.8705 10.8408 11.9805 12.2008 12.0305C12.2308 12.0205 12.3308 12.0205 12.4308 12.0305C13.7708 11.9605 14.8208 10.8605 14.8308 9.50047C14.8308 8.11047 13.7008 6.97047 12.3008 6.97047ZM6.38086 19.1003C8.04086 20.4903 10.1309 21.2503 12.3009 21.2503C14.4709 21.2503 16.5609 20.4903 18.2209 19.1003C18.0409 18.4903 17.5609 17.9003 16.8509 17.4203C14.3909 15.7803 10.2209 15.7803 7.74086 17.4203C7.03086 17.9003 6.56086 18.4903 6.38086 19.1003Z"
                        fill="#292D32"></path>
                </svg>
                <div class="info-admin icon-user">
                    <p>Xin Chào, <span>
                            <?= $username ?>
                        </span></p>
                    <div class="sub-menu-user">
                        <a href="index.php?page=logout" class="btn btn-danger">Đăng Xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </header>