<?php
$show_category = '';

foreach ($list_category as $ct) {
    extract($ct);

    if ($ct['hide'] == 0) {
        $link = '<a href="index.php?page=hideCategory&id=' . $id . '"><i class="bx bx-x"></i></a>';
    } else {
        $link = '<a href="index.php?page=showCategory&id=' . $id . '"><i class="bx bx-check"></i></a>';
    }

    $show_category .= '
        <tr>
            <td>' . $id . '</td>
            <td><img src="../uploads/' . $avatar . '" width="50px"></td>
            <td>' . $name . '</td>
            <td>' . (($home == 0) ? "Mặc Định" : "Hiển Thị Trang Chủ") . '</td>
            <td>' . (($hide == 0) ? "Đang Kinh Doanh" : "Ngừng Kinh Doanh") . '</td>
            <td>
                <a href="index.php?page=updateCategory&id=' . $id . '"><i class="bx bx-edit"></i></a>
                <a href="index.php?page=delCategory&id=' . $id . '"><i class="bx bx-trash"></i></a>
                ' . $link . '
            </td>
        </tr>
    ';
}
?>

<!-- SIDEBAR -->
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
        <li class="active">
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
            <a href="index.php?page=voucher">
                <i class='bx bxs-slideshow'></i>
                <span class="text">Slider Shows</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=arrange">
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
        <a href="#index.php?page=category" class="nav-link">Danh Mục Sản Phẩm</a>
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
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh Mục Sản Phẩm</h1>
            </div>
        </div>
        <div class="admin-category">
            <p class="err">
                <?php
                if (isset($_SESSION["message"]) && $_SESSION["message"] != "") {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
                ?>
            </p>
            <a href="index.php?page=addCategory">Thêm Danh Mục Mới</a>

            <table class="table table-show-category">
                <thead>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên Danh Mục</th>
                    <th>Tùy Chọn</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </thead>

                <tbody>
                    <?= $show_category ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->