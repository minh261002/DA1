<?php
$html_bill_unconfirmed = "";

foreach ($bill_unconfirmed as $bill) {
    extract($bill);

    $total_quantity = 0;

    $total_quantity += $quantity;
    $html_bill_unconfirmed .=
        '<tr>
        <td>' . $id . '</td>
        <td>' . $user_username . '</td>
        <td>' . $total_quantity . '</td>
        <td>' . number_format($totalPrice, 0, '.', ',') . 'đ</td>
        <td>' . $created_at . '</td>
        <td><a href="index.php?page=bill_detail&id=' . $id . '">Xem</a></td>
        <td><a class="btn btn-outline-dark" href="index.php?page=confirm_bill&id=' . $id . '">Xác Nhận </a></td>';
}
?>

<main>
    <section class="box-home my-5">
        <div class="container">
            <div class="counter flex">
                <a href="index.php?page=product">
                    <div class="counter-product flex">
                        <div class="box-counter ">
                            <h3>Sản Phẩm</h3>
                            <p class="c-product">0</p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                        </svg>
                    </div>
                </a>
                <a href="index.php?page=category">
                    <div class="counter-category flex">
                        <div class="box-counter">
                            <h3>Danh Mục</h3>
                            <p class="c-category">>0</p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>

                    </div>
                </a>
                <a href="index.php?page=user">
                    <div class="counter-user flex">
                        <div class="box-counter">
                            <h3>Tài Khoản</h3>
                            <p class="c-user">>0</p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>

                    </div>
                </a>

                <div class="counter-bill flex">
                    <div class="box-counter">
                        <h3>Đơn Hàng</h3>
                        <p class="c-bill">0</p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-bill">
        <h4 class="text-center mt-5 mb-3">Đơn Hàng Chưa Được Xác Nhận</h4>

        <div class="bill-container">
            <div class="container">
                <p class="err">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </p>
                <table class="table">
                    <thead>
                        <th>Mã Đơn Hàng</th>
                        <th>Tài Khoản</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                        <th>Ngày Đặt Hàng</th>
                        <th colspan=2>Xem Chi Tiết</th>
                    </thead>

                    <tbody>
                        <?= $html_bill_unconfirmed ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="../assets/js/counter.js"></script>
</main>