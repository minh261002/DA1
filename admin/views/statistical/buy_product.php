<?php
if (isset($buy_product_admin)) {

    $html_buy_pd_admin = '';
    $keys = array_keys($buy_product_admin); // Lấy danh sách các key trong mảng

    foreach ($keys as $index => $key) {
        $buy_pd = $buy_product_admin[$key];
        $position = $index + 1;
        $html_buy_pd_admin .= '
            <tr>
                <td>' . $position . '</td>
                <td><img src="../uploads/' . $buy_pd['img'] . '" width="50px" /></td>
                <td>' . $buy_pd['name'] . '</td>
                <td>' . $buy_pd['category_name'] . '</td>
                <td>' . $buy_pd['total_quantity'] . '</td>
            </tr>
        ';
    }
}

?>

<section id="sidebar">
    <a href="index.php" class="brand">
        <img src="../uploads/logo_owenstore.svg" alt="">
    </a>
    <ul class="side-menu top">
        <li>
            <a href="index.php?page=home">
                <i class='bx bxs-home'></i>
                <span class="text">Trang Chủ</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=category">
                <i class='bx bxs-category-alt'></i>
                <span class="text">Danh Mục</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=product">
                <i class='bx bxs-window-alt'></i>
                <span class="text">Sản Phẩm</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=bill">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">Đơn Hàng</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=respon">
                <i class='bx bxs-chat'></i>
                <span class="text">Phản Hồi</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=user">
                <i class='bx bxs-group'></i>
                <span class="text">Tài Khoản</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=voucher">
                <i class='bx bxs-offer'></i>
                <span class="text">Mã Giảm Giá</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-slideshow'></i>
                <span class="text">Slider Shows</span>
            </a>
        </li>
        <li class="active">
            <a href="index.php?page=statistical">
                <i class='bx bxs-analyse'></i>
                <span class="text">Thống Kê</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="index.php?page=logout" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Đăng Xuất</span>
            </a>
        </li>
    </ul>
</section>

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#index.php?page=home" class="nav-link">Trang Chủ</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm Kiếm...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="../uploads/<?= $_SESSION['admin']['avatar'] ?>">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Thống Kê</h1>
            </div>
        </div>

        <div class="admin_statistical">
            <ul class="nav_statistical">
                <li><a href="index.php?page=statistical">Tổng Quan</a></li>
                <li><a href="index.php?page=arrange">Doanh Thu</a></li>
                <li><a href="index.php?page=view_product">Sản Phẩm Nhiều Lượt Xem</a></li>
                <li class="active"><a href="index.php?page=buy_product">Sản Phẩm Nhiều Lượt Mua</a></li>
            </ul>

            <div class="content_statistical px-5">
                <table class="table my-5">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Sản Phẩm</th>
                            <th>Danh Mục</th>
                            <th>Đã Bán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html_buy_pd_admin ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->