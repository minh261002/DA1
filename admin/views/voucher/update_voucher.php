<?php
if (isset($_GET['id'])) {
    $id_voucher = $_GET['id'];
    $get_voucher_id = get_voucher_id($id_voucher);
}
?>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
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
            <a href="#">
                <i class='bx bxs-window-alt'></i>
                <span class="text">Sản Phẩm</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-chat'></i>
                <span class="text">Phản Hồi</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Tài Khoản</span>
            </a>
        </li>
        <li class="active">
            <a href="#">
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
            <form action="index.php?page=update_voucher" method="POST">
                <div class="form-group mb-3">
                    <label for="id_voucher_disable">ID</label>
                    <input type="text" name="id_voucher_disable" id="id_voucher_disable" class="form-control"
                        value="<?= $get_voucher_id['id'] ?>" disabled>
                    <span class="err">Không cần nhập ID</span>
                </div>

                <div class="form-group mb-3">
                    <label for="name">Mã Giảm Giá</label>
                    <input type="text" name="name_voucher" id="name_voucher" class="form-control"
                        value="<?= $get_voucher_id['name'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="value_voucher">Giảm (%)</label>
                    <input type="text" name="value_voucher" id="value_voucher" class="form-control"
                        value="<?= $get_voucher_id['value'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="start_voucher">Ngày bắt đầu</label>
                    <input type="date" name="start_voucher" id="start_voucher" class="form-control"
                        value="<?= $get_voucher_id['start'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="end_voucher">Ngày kết thúc</label>
                    <input type="date" name="end_voucher" id="end_voucher" class="form-control"
                        value="<?= $get_voucher_id['end'] ?>">
                </div>

                <div class="form-group mb-3">
                    <input type="hidden" name="id_voucher" value="<?= $get_voucher_id['id'] ?>">
                    <input type="submit" value="Lưu Thay Đổi" class="btn btn-dark px-5" name="btn-update-voucher">
                </div>
            </form>

            <a href="index.php?page=voucher">Quay Lại</a>
        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->