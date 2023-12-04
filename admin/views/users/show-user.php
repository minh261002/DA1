<?php
$html_admin_acc = "";

foreach ($user as $acc) {

    $acc['ban'] = ($acc['ban'] == 0) ? "Đang Hoạt Động" : "Đã Bị Khóa";

    $link = '';

    if ($acc['ban'] == "Đang Hoạt Động") {
        $link = '<a href="index.php?page=block-user&id=' . $acc['id'] . '"><i class="bx bx-lock danger"></i></a>';
    } elseif ($acc['ban'] == "Đã Bị Khóa") {
        $link = '<a href="index.php?page=unblock-user&id=' . $acc['id'] . '"><i class="bx bx-lock-open success"></i></a>';
    }

    $html_admin_acc .= '
        <tr>
            <td>' . $acc['username'] . '</td>
            <td>' . $acc['email'] . '</td>
            <td>' . $acc['ban'] . '</td>
            <td>
                <a href="index.php?page=update-user&id=' . $acc['id'] . '" ><i class="bx bx-edit"></i></a>
                ' . $link . '
            </td>
        </tr>
    ';
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
        <li class="active">
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
        <li>
            <a href="#">
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
                <h1>Quản Lý Tài Khoản</h1>
            </div>
        </div>

        <div class="admin_user">
            <a href="index.php?page=create-user">Thêm Tài Khoản Mới</a>
            <p class="err">
                <?php
                if (isset($_SESSION["message"])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </p>
            <table class="table">
                <thead>
                    <th>Tài Khoản</th>
                    <th>Email</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </thead>

                <tbody>
                    <?= $html_admin_acc ?>
                </tbody>
            </table>


        </div>
    </main>
</section>