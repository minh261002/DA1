<?php
if (isset($bill)) {
    $html_bill_result = '';
    $html_product_bill = '';
    $total_price = 0;

    $status = $bill['status'];
    if ($status == 0) {
        $status = '<span class="text-warning fs-5">Chưa Xác Nhận</span>';
    } else if ($status == 1) {
        $status = '<span class="text-info fs-5">Đã Xác Nhận</span>';
    } else if ($status == 2) {
        $status = '<span class="text-secondary fs-5">Đang Giao Hàng</span>';
    } else if ($status == 3) {
        $status = '<span class="text-success fs-5">Đã Giao Hàng</span>';
    } else if ($status == 4) {
        $status = '<span class="text-danger fs-5">Đã Hủy</span>';
    }

    $payment = $bill['payment'];
    if ($payment == 1) {
        $payment = 'Thanh toán khi nhận hàng';
    } else if ($payment == 2) {
        $payment = 'Thanh toán qua cổng VNPAY';
    }

    $transport = $bill['transport'];
    if ($transport == 1) {
        $transport_name = 'Giao hàng hỏa tốc';
    } else if ($transport == 2) {
        $transport_name = 'Giao hàng nhanh';
    } else if ($transport == 3) {
        $transport_name = 'Giao hàng tiết kiệm';
    }

    $phone = $bill['phone'];
    $hide = 3;

    $hide_phone = substr($phone, 0, -$hide) . str_repeat('x', $hide);
    $phone_format = substr($hide_phone, 0, 4) . ' ' . substr($hide_phone, 4, 3) . ' ' . substr($hide_phone, 7, 3);

    $transport = $bill['transport'];
    $transport_price = 0;

    if ($transport == 1) {
        $transport_price = 15000;
    } else if ($transport == 2) {
        $transport_price = 10000;
    } else if ($transport == 3) {
        $transport_price = 5000;
    }

    $voucher = $bill['voucher'];
    if ($voucher > 0) {
        $voucher = number_format($voucher, 0, ',', '.');
    } else {
        $voucher = 0;
    }

    foreach ($bill_detail as $dt) {
        $subtotal = $dt['price'] * $dt['quantity'];
        $total_price += $subtotal;

        $html_product_bill .= '
        <tr>
            <td class="result_bill_pd">
                <p>' . $dt['name'] . '</p>
                <p>Kích thước: <span>' . $dt['size'] . '</span></p>
                <p>Màu: <span>' . $dt['color'] . '</span></p>
            </td>
            <td><img src="uploads/' . $dt['img'] . '" width="50px"/></td>
            <td>' . $dt['quantity'] . '</td>
            <td>' . number_format($dt['price'], 0, ',', '.') . ' đ</td>
            <td>' . number_format($subtotal, 0, ',', '.') . ' đ</td>
        </tr>
    ';
    }

    $html_bill_result .= '
<div class="result_full_bill">
    <h3 class="my-4 text-center">Thông Tin Đơn Hàng</h3>
    <h4>Đơn Hàng #' . $bill['id'] . ' ' . $status . '</h4>
    <div class="result_info flex my-3">
        <div class="infor_bill">
            <p>Họ Tên: <span>' . $bill['fullname'] . '</span></p>
            <p>Số Điện Thoại: <span>' . $phone_format . '</span></p>
            <p>Ngày Đặt Hàng: <span>' . $bill['created_at'] . '</span></p>
            <p>Phương Thức Thanh Toán: ' . $payment . ' </p>
            <p>Phương Thức Vận Chuyển: ' . $transport_name . '</p>
        </div>
        <div class="info_bill">
            <p>Thành Tiền: ' . number_format($total_price, 0, ',', '.') . 'đ</p>
            <p>Giảm Giá: ' . number_format($voucher, 0, ',', '.') . 'đ</p>
            <p>Vận Chuyển: ' . number_format($transport_price, 0, ',', '.') . 'đ</p>
            <p>Tổng Thanh Toán: ' . number_format(($total_price - $voucher + $transport_price), 0, ',', '.') . ' đ</p>
        </div>
    </div>
    <table class="table">
        <thead>
            <th>Sản Phẩm</th>
            <th>Ảnh</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Tạm Tính</th>
        </thead>
        <tbody>
            ' . $html_product_bill . ' 
        </tbody>
    </table>
</div>
';
}
?>

<main class="my-5">
    <div class="container">
        <h3 class="text-center my-3">Tra Cứu Đơn Hàng</h3>
        <form action="index.php?page=search_bill" class="form-search-bill" method="POST">
            <div class="form-group mb-4">
                <input type="search" name="search_bill" id="search_bill" class="form-control"
                    placeholder="Nhập mã đơn hàng">
            </div>

            <div class="form-group">
                <input type="submit" value="Tìm Kiếm" class="px-5 btn btn-outline-dark" name="btn-search-bill">
            </div>
        </form>

        <div class="search_bil_resutl">
            <?php if (isset($html_bill_result)) {
                echo $html_bill_result;
            } ?>
        </div>
    </div>
</main>