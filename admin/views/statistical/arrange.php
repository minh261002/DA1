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
                <li class="active"><a href="index.php?page=arrange">Doanh Thu</a></li>
                <li><a href="index.php?page=view_product">Sản Phẩm Nhiều Lượt Xem</a></li>
                <li><a href="index.php?page=buy_product">Sản Phẩm Nhiều Lượt Mua</a></li>
            </ul>

            <div class="content_statistical">
                <form action="index.php?page=arrange" method="post" class="flex form-select-month">
                    <select name="selectedMonth" id="month">
                        <option value="01" <?php if ($selectedMonth === '01') {
                            echo 'selected';
                        } ?>>Tháng 1</option>
                        <option value="02" <?php if ($selectedMonth === '02') {
                            echo 'selected';
                        } ?>>Tháng 2</option>
                        <option value="03" <?php if ($selectedMonth === '03') {
                            echo 'selected';
                        } ?>>Tháng 3</option>
                        <option value="04" <?php if ($selectedMonth === '04') {
                            echo 'selected';
                        } ?>>Tháng 4</option>
                        <option value="05" <?php if ($selectedMonth === '05') {
                            echo 'selected';
                        } ?>>Tháng 5</option>
                        <option value="06" <?php if ($selectedMonth === '06') {
                            echo 'selected';
                        } ?>>Tháng 6</option>
                        <option value="07" <?php if ($selectedMonth === '07') {
                            echo 'selected';
                        } ?>>Tháng 7</option>
                        <option value="08" <?php if ($selectedMonth === '08') {
                            echo 'selected';
                        } ?>>Tháng 8</option>
                        <option value="09" <?php if ($selectedMonth === '09') {
                            echo 'selected';
                        } ?>>Tháng 9</option>
                        <option value="10" <?php if ($selectedMonth === '10') {
                            echo 'selected';
                        } ?>>Tháng 10</option>
                        <option value="11" <?php if ($selectedMonth === '11') {
                            echo 'selected';
                        } ?>>Tháng 11</option>
                        <option value="12" <?php if ($selectedMonth === '12') {
                            echo 'selected';
                        } ?>>Tháng 12</option>
                    </select>
                    <input type="submit" value="Xem" class="btn-arrange" name="btn-arrange">
                </form>

            </div>
            <?php
            if (isset($arrange) && isset($arrange_not_success) && isset($arrange_cancel)) {
                $total_revenue = isset($arrange[0]['total_revenue']) ? $arrange[0]['total_revenue'] : 0;
                $total_revenue_not_success = isset($arrange_not_success[0]['total_revenue']) ? $arrange_not_success[0]['total_revenue'] : 0;
                $total_revenue_cancel = isset($arrange_cancel[0]['total_revenue']) ? $arrange_cancel[0]['total_revenue'] : 0;
                $total = $total_revenue + $total_revenue_not_success - $total_revenue_cancel;
            } else {
                echo "Không có dữ liệu.";
            }
            ?>



            <div class="grid-chart">
                <div class="container">
                    <div class="chart" style="width: 100%;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                    <div class="info_arrange">
                        <div class="info_arrange_item flex">
                            <div class="gr-arrange flex">
                                <i style="color: greenyellow;" class='bx bxs-circle'></i>
                                <span class="text">Đơn hàng đã hoàn thành</span>
                            </div>
                            <p>
                                <?php
                                if (isset($total_revenue)) {
                                    echo number_format($total_revenue);
                                } else {
                                    echo 0;
                                }
                                ?> VNĐ
                            </p>
                        </div>

                        <div class="info_arrange_item flex">
                            <div class="gr-arrange flex">
                                <i style="color: blue;" class='bx bxs-circle'></i>
                                <span class="text">Đơn hàng chưa hoàn thành</span>
                            </div>
                            <p>
                                <?php
                                if (isset($total_revenue_not_success)) {
                                    echo number_format($total_revenue_not_success);
                                } else {
                                    echo 0;
                                }
                                ?> VNĐ
                            </p>
                        </div>

                        <div class="info_arrange_item flex">
                            <div class="gr-arrange flex">
                                <i style="color: red;" class='bx bxs-circle'></i>
                                <span class="text">Đơn hàng bị hủy</span>
                            </div>
                            <p>
                                <?php
                                if (isset($total_revenue_cancel)) {
                                    echo number_format($total_revenue_cancel);
                                } else {
                                    echo 0;
                                }
                                ?> VNĐ
                            </p>
                        </div>

                        <div class="info_arrange_item flex mt-3">
                            <div class="gr-arrange flex">
                                <i style="color: aqua;" class='bx bxs-circle'></i>
                                <span class="text">Tổng Doanh Thu</span>
                            </div>
                            <p style=" font-size:28px">
                                <?php
                                if (isset($total)) {
                                    echo number_format($total);
                                } else {
                                    echo 0;
                                }
                                ?> VNĐ
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <canvas id="revenueChart"></canvas>

            <script>
                var ctx = document.getElementById('revenueChart').getContext('2d');

                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Đã hoàn thành', 'Chưa hoàn thành', 'Hủy'],
                        datasets: [{
                            label: 'Doanh thu',
                            data: [<?= $total_revenue ?>, <?= $total_revenue_not_success ?>, <?= $total_revenue_cancel ?>],
                            backgroundColor: [
                                'greenyellow',
                                'blue',
                                'red'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var dataset = data.datasets[tooltipItem.datasetIndex];
                                    var value = dataset.data[tooltipItem.index];
                                    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
                                }
                            }
                        }
                    }
                });
            </script>


        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->