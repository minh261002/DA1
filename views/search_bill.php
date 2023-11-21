<?php
$bill['created_at'] = date('d-m-Y', strtotime($bill['created_at']));

$Status = $bill['status'];

if ($Status == 0) {
    $Status = 'Chưa Xác Nhận';
} elseif ($Status == 1) {
    $Status = 'Đã Xác Nhận';
} elseif ($Status == 2) {
    $Status = 'Đang Giao Hàng';
} elseif ($Status == 3) {
    $Status = 'Đã Giao Hàng';
} elseif ($Status == 4) {
    $Status = 'Đã Hủy';
}

$address_array = $bill['address'];

$address = json_decode($address_array, true);
$address_result = "Địa chỉ: " . $address['detail'] . ", " . $address['ward'] . ", " . $address['district'] . ", " . $address['city'] . ".";

$transport = $bill['transport'];
if ($transport == 1) {
    $transport = 'Giao Hàng Hỏa Tốc';
} elseif ($transport == 2) {
    $transport = 'Giao Hàng Nhanh';
} elseif ($transport == 3) {
    $transport = 'Giao Hàng Tiết Kiệm';
}

$payment = $bill['payment'];
if ($payment == 1) {
    $payment = 'Thanh Toán Khi Nhận Hàng';
} elseif ($payment == 2) {
    $payment = 'Thanh Toán Qua Cổng VNPAY';
}
?>

<main class="my-5">
    <div class="container">
        <h3 class="text-center mb-5">Tra Cứu Đơn Hàng</h3>

        <div class="form-search-bill">
            <form action="index.php?page=search_bill" method="POST">
                <div class="form-group mb-3">
                    <input type="search" name="id_bill" id="id_bill" placeholder="Nhập mã đơn hàng ..."
                        class="form-control">
                    <span class="err" id="id_billErr"></span>
                </div>

                <div class="form-group mb-3">
                    <input type="submit" value="Tìm Kiếm" class="btn btn-outline-dark px-5" name="btn-search-bill">
                </div>
            </form>
        </div>

        <div class="search-bill-result">
            <h5>Đơn hàng #
                <?= $bill['id'] ?>
            </h5>
            <div class="result-info flex">
                <div class="info-result-user">
                    <p>Họ và tên:
                        <?= $bill['fullname'] ?>
                    </p>
                    <p>Số điện thoại:
                        <?= $bill['phone'] ?>
                    </p>
                    <p>Địa Chỉ Email:
                        <?= $bill['email'] ?>
                    </p>
                    <p>
                        <?= $address_result ?>
                    </p>
                    <p>Ngày đặt hàng:
                        <?= $bill['created_at'] ?>
                    </p>
                </div>
                <div class="info-result-user">
                    <p>Trạng thái đơn hàng:
                        <?= $Status ?>
                    </p>
                    <p>Phương thức vận chuyển:
                        <?= $transport ?>
                    </p>
                    <p>Phương Thức Thanh Toán:
                        <?= $payment ?>
                    </p>
                </div>
            </div>

        </div>
</main>