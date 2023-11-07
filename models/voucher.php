<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "duan1";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$voucherCode = $_POST['voucher'];
$total_price = $_POST['total_price'];

$query = "SELECT * FROM voucher WHERE name = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("s", $voucherCode);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $voucher = $result->fetch_assoc();
            $discountValue = $voucher['value'];
            $discountAmount = $total_price * ($discountValue / 100);
            $newTotal = $total_price - $discountAmount;

            $response = array('success' => true, 'discount' => number_format($discountAmount, 0, ',', '.') . 'đ', 'newTotal' => number_format($newTotal, 0, ',', '.') . 'đ');
        } else {
            $response = array('success' => false, 'message' => 'Mã voucher không hợp lệ.');
        }
    } else {
        $response = array('success' => false, 'message' => 'Đã xảy ra lỗi trong quá trình xử lý yêu cầu.');
    }

    $stmt->close();
} else {
    $response = array('success' => false, 'message' => 'Đã xảy ra lỗi trong quá trình xử lý yêu cầu.');
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>