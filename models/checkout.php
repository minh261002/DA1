<?php
function insert_bill($id_user, $fullname, $email, $phone, $address, $notes, $payment, $transport)
{
    $sql = "INSERT INTO bill(id_user, fullname, email, phone, address, notes, payment, transport, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    pdo_execute($sql, $id_user, $fullname, $email, $phone, json_encode($address, JSON_UNESCAPED_UNICODE), $notes, $payment, $transport);
}
