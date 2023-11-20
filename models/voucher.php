<?php
session_start();
require_once 'cart.php';
require_once 'pdo.php';

if (isset($_POST['voucher'])) {
    $voucherCode = $_POST['voucher'];

    function check_voucher($voucherCode)
    {
        $sql = "SELECT * FROM voucher WHERE name = ?";
        return pdo_query_one($sql, $voucherCode);
    }

    $voucherRow = check_voucher($voucherCode);

    if ($voucherRow) {
        $currentDate = date('Y-m-d'); // Ngày hiện tại

        // Kiểm tra xem ngày hiện tại nằm trong khoảng thời gian của mã giảm giá
        if ($currentDate >= $voucherRow['start'] && $currentDate <= $voucherRow['end']) {
            $discountValue = $voucherRow['value'];

            $totalPrice = total_price();

            $discountAmount = ($discountValue / 100) * $totalPrice;

            $_SESSION['discounted'] = $discountAmount;

            $totalPrice -= $discountAmount;

            $_SESSION['total_price'] = $totalPrice;

            total_price();

            echo json_encode([
                'success' => true,
                'message' => 'Áp dụng voucher thành công!',
                'totalPrice' => number_format($totalPrice, 0, '.', ',') . ' đ',
                'discounted' => number_format($discountAmount, 0, '.', ',') . ' đ',
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Mã voucher đã hết hạn.',
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Mã voucher không hợp lệ.',
        ]);
    }
}

?>