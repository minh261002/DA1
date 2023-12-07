<?php
function insert_bill($id_user, $fullname, $email, $phone, $address, $notes, $voucher, $payment, $transport) {
    $sql = "INSERT INTO bill(id_user, fullname, email, phone, address, notes, voucher, payment, transport, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    return pdo_last_insert_id($sql, $id_user, $fullname, $email, $phone, json_encode($address, JSON_UNESCAPED_UNICODE), $notes, $voucher, $payment, $transport);
}

function insert_bill_detail($idProduct, $idBill, $name, $img, $price, $quantity, $size, $color) {
    $sql = "INSERT INTO bill_details(id_product, id_bill, name, img, price, quantity, size, color) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $idProduct, $idBill, $name, $img, $price, $quantity, $size, $color);
}
