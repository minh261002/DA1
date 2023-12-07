<?php
$html_all_bill = '';
foreach ($bills as $bill) {
    $title_bill = 'Tất Cả Đơn Hàng';
    $status = $bill['status'];

    if ($status == 0) {
        $status = '<span class="bill_st" style="color: orange;"><i class="bx bxs-hourglass-top"></i><span class="status-pending"> Chưa Xác Nhận <a href="index.php?page=set_bill&bill=1&id_bill=' . $bill['id'] . '">(Xác Nhận)</a></span></span>';
    } else if ($status == 1) {
        $status = '<span class="bill_st" style="color: green;"><i class="bx bxs-check-circle"></i><span class="status-confirmed">Đã Xác Nhận <a href="index.php?page=set_bill&bill=2&id_bill=' . $bill['id'] . '">(Giao Hàng)</a></span></span>';
    } else if ($status == 2) {
        $status = '<span class="bill_st" style="color: blue;"><i class="bx bxs-truck"></i><span class="status-in-progress" >Đang Giao Hàng <a href="index.php?page=set_bill&bill=3&id_bill=' . $bill['id'] . '">(Đã Giao)</a></span></span>';
    } else if ($status == 3) {
        $status = '<span class="bill_st" style="color: purple;"><i class="bx bxs-user-check"></i><span class="status-delivered" >Đã Giao Hàng <a href="index.php?page=set_bill&bill=5&id_bill=' . $bill['id'] . '">(Thành Công)</a></span></span>';
    } else if ($status == 4) {
        $status = '<span class="bill_st" style="color: red;"><i class="bx bx-calendar-x"></i><span class="status-cancelled" >Đã Hủy</span></span>';
    } else if ($status == 5) {
        $status = '<span class="bill_st" style="color: green;"><i class="bx bxs-calendar-check"></i><span class="status-success" >Thành Công</span></span>';
    }

    $payment = $bill['payment'];

    if ($payment == 1) {
        $payment = 'Chưa Thanh Toán';
    } elseif ($payment == 2) {
        $payment = 'Đã Thanh Toán Qua VNPAY';
    } elseif ($payment == 3) {
        $payment = 'Đã Thanh Toán Qua Momo';
    } elseif ($payment == 4) {
        $payment = 'Đã thanh toán COD';
    }

    if (!empty($bill)) {
        $html_all_bill .= '
        <tr>
            <td>' . $bill['fullname'] . '</td>
            <td>' . $bill['created_at'] . '</td>
            <td>' . $status . '</td>
            <td>' . $payment . '</td>
            <td><a href="index.php?page=bill_details&id=' . $bill['id'] . '">Xem</a></td>
        </tr>
    ';
    } else {
        $html_all_bill .= '
        <tr>
            <td colspan="5" style="text-align: center;">Không có đơn hàng nào</td>
        </tr>';
    }
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
                <div class="tab_bill">
                    <div class="tab_bill_item">
                        <?php if (!isset($_GET['bill'])) {
                            echo '<a href="index.php?page=bill" class="active">Tất Cả</a>';
                        } else {
                            echo '<a href="index.php?page=bill">Tất Cả</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php if (isset($_GET['bill']) && $_GET['bill'] == 0) {
                            echo '<a href="index.php?page=bill&bill=0" class="active">Chưa Xác Nhận</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=0">Chưa Xác Nhận</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php
                        if (isset($_GET['bill']) && $_GET['bill'] == 1) {
                            echo '<a href="index.php?page=bill&bill=1" class="active">Đã Xác Nhận</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=1">Đã Xác Nhận</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php
                        if (isset($_GET['bill']) && $_GET['bill'] == 2) {
                            echo '<a href="index.php?page=bill&bill=2" class="active">Đang Giao Hàng</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=2">Đang Giao Hàng</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php
                        if (isset($_GET['bill']) && $_GET['bill'] == 3) {
                            echo '<a href="index.php?page=bill&bill=3" class="active">Đã Giao Hàng</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=3">Đã Giao Hàng</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php
                        if (isset($_GET['bill']) && $_GET['bill'] == 4) {
                            echo '<a href="index.php?page=bill&bill=4" class="active">Đã Hủy</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=4">Đang Hủy</a>';
                        }
                        ?>
                    </div>
                    <div class="tab_bill_item">
                        <?php
                        if (isset($_GET['bill']) && $_GET['bill'] == 5) {
                            echo '<a href="index.php?page=bill&bill=5" class="active">Thành Công</a>';
                        } else {
                            echo '<a href="index.php?page=bill&bill=5">Thành Công</a>';
                        }
                        ?>
                    </div>
                </div>
                <p class="err">
                    <?php if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    } ?>
                </p>
                <p class="success">
                    <?php
                    if (isset($_SESSION['message_success'])) {
                        echo $_SESSION['message_success'];
                        unset($_SESSION['message_success']);
                    }
                    ?>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>Khách Hàng</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Trạng Thái</th>
                            <th>Thanh Toán</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html_all_bill ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->