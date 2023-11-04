<?php
    if (isset($_SESSION["user"]) && count($_SESSION["user"]) > 0) {
        extract($_SESSION["user"]);
        $html_account = '
            <li><a href="register">Xin chào, <span class="text-danger">' . $username . '</span></a></li>
            <li><a href="profile_confirm">Thông Tin Cá Nhân</a></li>
            <li><a href="register">Đơn Hàng</a></li>
            <li><a href="index.php?page=changePassword">Đổi Mật Khẩu</a></li>
            <li><a class="btn btn-danger p-2 text-white" href="index.php?page=logout">Đăng Xuất</a></li>
        ';
    } else {
        $html_account = '
            <li><a href="index.php?page=register">Đăng Ký</a></li>
            <li><a href="index.php?page=login">Đăng Nhập</a></li>
        ';
    }
?>

<!-- menu đa cấp -->
<?php 
function createMenu() {
    $parentCategories = getParentCategories();
    $menu = '';

    foreach ($parentCategories as $parent) {
        $parentId = $parent['id'];

        $parentName = htmlspecialchars($parent['name']);
        
        $parentLink = 'index.php?page=product&id=' . $parentId;

        $menu .= '<li class="parent_menu">';
        $menu .= '<a href="'.$parentLink.'">' . $parentName . '</a>';

        $childCategories = getChildCategories($parentId);
        if ($childCategories) {
            $menu .= '<ul class="sub-menu">';
            foreach ($childCategories as $child) {
                $childId = $child['id'];
                $childName = htmlspecialchars($child['name']);
                $childLink = 'index.php?page=product&id=' . $childId;
                $menu .= '<li><a href="'.$childLink.'">' . $childName . '</a></li>';
            }
            $menu .= '</ul>';
        }

        $menu .= '</li>';
    }

    return $menu;
}
?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tokyo Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.min.js"></script>
</head>

<body>
    <!--Header pc-->
    <header class="header__pc">
        <div class="header__top">
            <p>TUNG VOUCHER ĐỘC QUYỀN TẠI WEBSITE <span>
                    << Ra mắt GIAO DIỆN MỚI>>
                </span></p>
        </div>

        <div class="header__middle">
            <div class="container">
                <div class="header__logo" style="cursor:pointer">
                    <a href="index.php?page=home">
                        <img src="https://tokyolife.vn/_next/static/media/tokyolife-logo.1bafb78d.svg" width="100%">
                    </a>
                </div>

                <div class="header__box-search">
                    <form action="" method="GET" class="flex form-search" id="search-form">
                        <input type="search" name="search" id="search" placeholder="Tìm Kiếm ..." autocomplete="off">
                        <button type="submit" class="icon_search" name="btn-search">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="icon-wrapper" clip-path="url(#clip0_10988_132346)">
                                    <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.832031 7.66536C0.832031 11.432 3.8987 14.4987 7.66536 14.4987C11.432 14.4987 14.4987 11.432 14.4987 7.66536C14.4987 3.8987 11.432 0.832031 7.66536 0.832031C3.8987 0.832031 0.832031 3.8987 0.832031 7.66536ZM1.83203 7.66536C1.83203 4.45203 4.44536 1.83203 7.66536 1.83203C10.8854 1.83203 13.4987 4.45203 13.4987 7.66536C13.4987 10.8787 10.8854 13.4987 7.66536 13.4987C4.44536 13.4987 1.83203 10.8787 1.83203 7.66536ZM14.312 15.019C14.412 15.119 14.5387 15.1657 14.6653 15.1657C14.792 15.1657 14.9187 15.119 15.0187 15.019C15.212 14.8257 15.212 14.5057 15.0187 14.3123L13.6853 12.979C13.492 12.7857 13.172 12.7857 12.9787 12.979C12.7853 13.1723 12.7853 13.4923 12.9787 13.6857L14.312 15.019Z"
                                        fill="white"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_10988_132346">
                                        <rect width="16" height="16" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    </form>

                    <div id="search-results"></div>

                    <script src="assets/js/search.js"></script>
                </div>

                <div class="header__icon flex">
                    <div class="icon-new">
                        <img src="assets/img/news.gif">
                    </div>

                    <div class="icon-user">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.4539 22.6887C18.8432 22.112 23.0508 17.5405 23.0508 12C23.0508 6.07 18.2308 1.25 12.3008 1.25C6.37078 1.25 1.55078 6.07 1.55078 12C1.55078 17.5516 5.7753 22.1304 11.1802 22.6921C11.5505 22.7307 11.9245 22.7503 12.3009 22.7503C12.6882 22.7503 13.073 22.7296 13.4539 22.6887ZM19.3682 17.9611C20.7293 16.35 21.5508 14.269 21.5508 12C21.5508 6.9 17.4008 2.75 12.3008 2.75C7.20078 2.75 3.05078 6.9 3.05078 12C3.05078 14.2686 3.8719 16.3491 5.2325 17.9601C5.59081 17.2905 6.15938 16.6813 6.91086 16.1803C9.89086 14.2003 14.7209 14.2003 17.6909 16.1803C18.4417 16.6869 19.0099 17.2942 19.3682 17.9611ZM12.4208 13.5305H12.3508H12.2508C9.98076 13.4605 8.28076 11.6905 8.28076 9.51047C8.28076 7.29047 10.0908 5.48047 12.3108 5.48047C14.5308 5.48047 16.3408 7.29047 16.3408 9.51047C16.3308 11.7005 14.6208 13.4605 12.4508 13.5305H12.4208ZM12.3008 6.97047C10.9008 6.97047 9.77076 8.11047 9.77076 9.50047C9.77076 10.8705 10.8408 11.9805 12.2008 12.0305C12.2308 12.0205 12.3308 12.0205 12.4308 12.0305C13.7708 11.9605 14.8208 10.8605 14.8308 9.50047C14.8308 8.11047 13.7008 6.97047 12.3008 6.97047ZM6.38086 19.1003C8.04086 20.4903 10.1309 21.2503 12.3009 21.2503C14.4709 21.2503 16.5609 20.4903 18.2209 19.1003C18.0409 18.4903 17.5609 17.9003 16.8509 17.4203C14.3909 15.7803 10.2209 15.7803 7.74086 17.4203C7.03086 17.9003 6.56086 18.4903 6.38086 19.1003Z"
                                fill="#292D32"></path>
                        </svg>

                        <ul class="sub-menu-user">
                            <?=$html_account?>
                        </ul>
                    </div>

                    <div class="icon_cart">
                        <a href="index.php?page=cart">
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3447_32146)">
                                    <rect width="24" height="24" transform="translate(0.300781)" fill="white"
                                        fill-opacity="0.01"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.65372 2.53116L7.08356 5.10132H17.5239L14.9537 2.53116C14.6637 2.24116 14.6637 1.76116 14.9537 1.47116C15.2437 1.18116 15.7237 1.18116 16.0137 1.47116L19.6437 5.10116L19.6439 5.10132H20.0837C21.0437 5.10132 23.0537 5.10132 23.0537 7.85132C23.0537 8.89132 22.8437 9.58132 22.3837 10.0313C22.1145 10.3006 21.7969 10.4438 21.4631 10.5194L19.8537 18.9015C19.4637 20.9315 18.8137 22.7515 15.1937 22.7515H9.16371C5.58371 22.7515 4.78371 20.6215 4.47371 18.7715L3.12835 10.518C2.80115 10.4409 2.48936 10.297 2.22371 10.0313C1.76371 9.58132 1.55371 8.88132 1.55371 7.85132C1.55371 5.10132 3.56371 5.10132 4.52371 5.10132H4.96356L4.96372 5.10116L8.59372 1.47116C8.88372 1.18116 9.36372 1.18116 9.65372 1.47116C9.94372 1.76116 9.94372 2.24116 9.65372 2.53116ZM4.66119 10.6013L5.95371 18.5215C6.24371 20.2915 6.84371 21.2515 9.16371 21.2515H15.1937C17.7637 21.2515 18.0537 20.3515 18.3837 18.6115L19.9217 10.6013H4.66119ZM4.52371 9.10132H20.3137C20.7637 9.11132 21.1837 9.11132 21.3237 8.97132C21.3937 8.90132 21.5437 8.66132 21.5437 7.85132C21.5437 6.72132 21.2637 6.60132 20.0737 6.60132H4.52371C3.33371 6.60132 3.05371 6.72132 3.05371 7.85132C3.05371 8.66132 3.21371 8.90132 3.27371 8.97132C3.41371 9.10132 3.84371 9.10132 4.28371 9.10132H4.52371ZM9.31372 17.5507C9.31372 17.9607 9.65372 18.3007 10.0637 18.3007C10.4737 18.3007 10.8137 17.9707 10.8137 17.5507V14.0007C10.8137 13.5907 10.4737 13.2507 10.0637 13.2507C9.65372 13.2507 9.31372 13.5907 9.31372 14.0007V17.5507ZM14.6637 18.3007C14.2537 18.3007 13.9137 17.9607 13.9137 17.5507V14.0007C13.9137 13.5907 14.2537 13.2507 14.6637 13.2507C15.0737 13.2507 15.4137 13.5907 15.4137 14.0007V17.5507C15.4137 17.9707 15.0737 18.3007 14.6637 18.3007Z"
                                        fill="#333333"></path>
                                </g>
                                <defs>
                                    <clipPath id="clip0_3447_32146">
                                        <rect width="24" height="24" fill="white" transform="translate(0.300781)">
                                        </rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="cout_cart"> <?=$_SESSION['total_order']?> </span></a>
                    </div>
                    <div class="icon-tracking">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.86066 22.17C10.5207 22.54 11.3907 22.75 12.3007 22.75C13.2107 22.75 14.0807 22.54 14.7407 22.16C15.1007 21.96 15.2307 21.5 15.0307 21.14C14.8307 20.78 14.3707 20.65 14.0107 20.85C13.7482 20.9978 13.4139 21.101 13.0508 21.1596V12.991L21.0358 8.36572C21.1161 8.63829 21.1606 8.90804 21.1606 9.15997V12.82C21.1606 13.23 21.5006 13.57 21.9106 13.57C22.3206 13.57 22.6606 13.23 22.6606 12.82V9.15997C22.6606 7.49997 21.5206 5.57001 20.0706 4.77001L14.7307 1.80999C13.3607 1.04999 11.2207 1.04999 9.86066 1.80999L4.52066 4.77001C3.07066 5.58001 1.93066 7.49997 1.93066 9.15997V14.82C1.93066 16.48 3.07066 18.41 4.52066 19.21L9.86066 22.17ZM20.3561 7.01894L12.3006 11.6796L4.25189 7.02183C4.54363 6.62759 4.89279 6.29481 5.26065 6.09002L10.6006 3.13C11.5106 2.62 13.1007 2.62 14.0107 3.13L19.3506 6.09002C19.7152 6.29127 20.0638 6.62372 20.3561 7.01894ZM3.57364 8.36918L11.5508 12.9856V21.157C11.1926 21.098 10.8622 20.9956 10.6006 20.85L5.26065 17.89C4.30065 17.36 3.45065 15.92 3.45065 14.82V9.15997C3.45065 8.90874 3.49447 8.6403 3.57364 8.36918ZM19.5008 22.1498C17.3208 22.1498 15.5508 20.3798 15.5508 18.1998C15.5508 16.0198 17.3208 14.2498 19.5008 14.2498C21.6808 14.2498 23.4508 16.0198 23.4508 18.1998C23.4508 19.0209 23.1997 19.7838 22.7701 20.4159C22.7911 20.4327 22.8113 20.4508 22.8307 20.4702L23.8307 21.4702C24.1207 21.7602 24.1207 22.2402 23.8307 22.5302C23.6807 22.6802 23.4907 22.7502 23.3007 22.7502C23.1107 22.7502 22.9207 22.6802 22.7707 22.5302L21.7707 21.5302C21.7513 21.5108 21.7332 21.4905 21.7164 21.4695C21.0844 21.8988 20.3216 22.1498 19.5008 22.1498ZM19.5008 15.7498C18.1508 15.7498 17.0508 16.8498 17.0508 18.1998C17.0508 19.5498 18.1508 20.6498 19.5008 20.6498C20.8508 20.6498 21.9508 19.5498 21.9508 18.1998C21.9508 16.8498 20.8508 15.7498 19.5008 15.7498Z"
                                fill="#292D32"></path>
                        </svg>
                    </div>

                </div>
            </div>
        </div>

        <ul class="header__menu">
            <div class="container">
                <div class="menu flex">
                    <li><a href=""> <img src="assets/img/icon-new.webp" width="30px">Hàng Mới Về</a></li>
                    <li><a href=""> <img src="assets/img/icon-new.webp" width="30px">Giảm Giá</a></li>
                    <?=createMenu()?>
                </div>
            </div>
        </ul>
    </header>