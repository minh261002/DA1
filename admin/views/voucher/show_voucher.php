<?php
$list_voucher = show_voucher();

$html_show_voucher = '';

foreach ($list_voucher as $vc) {

    $start_date = date("d-m-Y ", strtotime($vc['start']));
    $end_date = date("d-m-Y ", strtotime($vc['end']));

    $html_show_voucher .= '
        <tr>
            <td>' . $vc['id'] . '</td>
            <td>' . $vc['name'] . '</td>
            <td>' . $vc['value'] . '%</td>
            <td>' . $start_date . '</td>
            <td>' . $end_date . '</td>
            <td>
                <a href="index.php?page=update_voucher&id=' . $vc['id'] . '" class="btn-edit"><i class="bx bx-edit"></i></a>
                <a href="index.php?page=delete_voucher&id=' . $vc['id'] . '" class="btn-delete"><i class="bx bx-trash"></i></a>
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
        <li class="active">
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
</section>>
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
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Mã Giảm Giá</h1>
            </div>
        </div>

        <div class="voucher-container">
            <p class="err">
                <?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } ?>
            </p>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Mã Voucher</th>
                    <th>Giảm</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày Kết thúc</th>
                    <th>Thao Tác</th>
                </thead>
                <tbody>
                    <?= $html_show_voucher ?>
                </tbody>
            </table>

            <a href="index.php?page=add_voucher">Thêm mã giảm giá mới</a>

        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->