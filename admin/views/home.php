<?php
$sum_product = pdo_query_value("SELECT SUM(quantity) AS sum_product FROM variant");
$sum_account = pdo_query_value("SELECT COUNT(*) AS sum_account FROM user");
$sum_bill = pdo_query_value("SELECT COUNT(*) AS sum_bill FROM bill");
?>

<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <img src="../uploads/logo_owenstore.svg" alt="">
    </a>
    <ul class="side-menu top">
        <li class="active">
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
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản Trị Viên</h1>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text c-bill">
                    <h3>0</h3>
                    <p>Đơn Hàng</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text c-user">
                    <h3>0</h3>
                    <p>Tài Khoản</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-category'></i>
                <span class="text c-product">
                    <h3>0</h3>
                    <p>Sản Phẩm</p>
                </span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Đơn Hàng Chưa Được Xác Nhận</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Tài Khoản</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Trạng Thái</th>
                            <th>Xác Nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa Xác Nhận</span></td>
                            <td><a href="">Xác Nhận</a></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa Xác Nhận</span></td>
                            <td><a href="">Xác Nhận</a></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa Xác Nhận</span></td>
                            <td><a href="">Xác Nhận</a></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa Xác Nhận</span></td>
                            <td><a href="">Xác Nhận</a></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status pending">Chưa Xác Nhận</span></td>
                            <td><a href="">Xác Nhận</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script>
    const product = document.querySelector(".c-product h3");
    const user = document.querySelector(".c-user h3");
    const bill = document.querySelector(".c-bill h3");

    function counterUp(el, to) {
        let speed = 300;
        let from = 0;
        let step = to / speed;
        const counter = setInterval(function () {
            from += step;
            if (from > to) {
                clearInterval(counter);
                el.innerText = to;
            } else {
                el.innerText = Math.ceil(from);
            }
        }, 0.5);
    }

    counterUp(product, <?php echo (int) $sum_product; ?>);
    counterUp(user, <?php echo (int) $sum_account; ?>);
    counterUp(bill, <?php echo (int) $sum_bill; ?>);

</script>