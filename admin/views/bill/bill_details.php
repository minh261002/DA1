<?php
$html_bill_details = '';
$total = 0;

foreach ($bill_details as $bill_detail) {

    $subtotal = $bill_detail['price'] * $bill_detail['quantity'];
    $total += $subtotal;

    $status = $bill_detail['status'];
    if ($status == 0) {
        $status = '<span class="bill_st"><i class="bx bxs-hourglass-top"></i>Chờ Xác Nhận</span>';
    } else if ($status == 1) {
        $status = '<span class="bill_st"><i class="bx bxs-check-circle"></i>Đã Xác Nhận </span>';
    } else if ($status == 2) {
        $status = '<span class="bill_st"><i class="bx bxs-truck"></i>Đang Giao Hàng</span>';
    } else if ($status == 3) {
        $status = '<span class="bill_st"><i class="bx bxs-user-check"></i>Đã Giao Hàng</span>';
    } else if ($status == 4) {
        $status = '<span class="bill_st"><i class="bx bx-calendar-x"></i>Đã Hủy</span>';
    } else if ($status == 5) {
        $status = '<span class="bill_st"><i class="bx bxs-calendar-check"></i>Thành Công</span>';
    }


    $payment = $bill_detail['payment'];
    if ($payment == 1) {
        $payment = 'Chưa Thanh Toán';
    } elseif ($payment == 2) {
        $payment = 'Đã Thanh Toán Qua VNPAY';
    } elseif ($payment == 3) {
        $payment = 'Đã Thanh Toán Qua Momo';
    } elseif ($payment == 4) {
        $payment = 'Đã thanh toán COD';
    }

    $transport_fee = 0;
    if ($bill_detail['transport'] == 1) {
        $transport_fee = 5000;
        $transport = 'Giao Hàng Tiết Kiệm';
    } elseif ($bill_detail['transport'] == 2) {
        $transport_fee = 10000;
        $transport = 'Giao Hàng Nhanh';
    } elseif ($bill_detail['transport'] == 3) {
        $transport_fee = 15000;
        $transport = 'Giao Hàng Hỏa Tốc';
    }

    $address_db = $bill_detail['address'];
    $address_string = json_decode($address_db, true);
    $address = $address_string['detail'] . ', ' . $address_string['ward'] . ', ' . $address_string['district'] . ', ' . $address_string['city'];

    $voucher = $bill_detail['voucher'];

    $html_bill_details .= '
        <tr>
            <td>
                <div class="bill_name">
                <p class="display:block">' . $bill_detail['name'] . '</p> 
                <p>Kích Thước: ' . $bill_detail['size'] . '</p>
                <p>Màu: ' . $bill_detail['color'] . '</p>
                </div>
            </td>
            <td><img class="bill_img" src="../uploads/' . $bill_detail['img'] . '"  /></td>
            <td>' . $bill_detail['quantity'] . '</td>
            <td>' . number_format($bill_detail['price'], 0, ',', '.') . 'đ</td>
            <td>' . number_format($subtotal, 0, ',', '.') . 'đ</td>
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
        <li class="active">
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
            <a href="index.php?page=voucher">
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
                <h1>Đơn Hàng</h1>
            </div>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Đơn Hàng #
                        <?= $id_bill ?>
                    </h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div class="info-customer ">
                    <div class="info-customer-left">
                        <p>Khách Hàng : <span>
                                <?= $bill_detail['fullname'] ?>
                            </span></p>
                        <p>Địa Chỉ : <span>
                                <?= $address ?>
                            </span></p>
                        <p>Số Điện Thoại : <span>
                                <?= $bill_detail['phone'] ?>
                            </span></p>
                    </div>
                    <div class="info-customer-right">

                        <p>Phương Thức Thanh Toán : <span>
                                <?= $payment ?>
                            </span></p>
                        <p>Phương Thức Vận Chuyển : <span>
                                <?= $transport ?>
                            </span></p>
                        <p class="flex" style="justify-content: start;">Trạng Thái : <span>
                                <?= $status ?>
                            </span></p>
                        <p>Ngày Đặt Hàng : <span>
                                <?= $bill_detail['created_at'] ?>
                            </span></p>
                    </div>
                </div>
                <p class="err">
                    <?php if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    } ?>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Ảnh</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html_bill_details ?>
                    </tbody>
                </table>

                <div class="total flex">
                    <div class="left">
                        <p>Tổng Tiền:</p>
                        <p>Phí Vận Chuyển:</p>
                        <p>Giảm Giá:</p>
                        <p>Tổng Cộng:</p>
                    </div>
                    <div class="right">
                        <p>
                            <?= number_format($total, 0, ',', '.') ?>đ
                        </p>
                        <p>
                            <?= number_format($transport_fee, 0, ',', '.') ?>đ
                        </p>
                        <p>
                            <?= number_format($voucher, 0, ',', '.') ?>đ
                        </p>
                        <p>
                            <?= number_format(($total + $transport_fee) - $voucher, 0, ',', '.') ?>đ
                        </p>
                    </div>
                </div>
                <a href="index.php?page=bill" class="btn ">Quay Lại</a>
            </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->