<?php
$idUser = $_GET['iduser'];
$fullname = $_GET['fullname'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$notes = $_GET['notes'];
$payMethod = $_GET['paymethod'];
$transport = $_GET['transport'];

$idBill = insert_bill($idUser, $fullname, $email, $phone, $address, $notes, $payMethod, $transport);
if ($_SESSION['cart']) {
    $carts = $_SESSION['cart'];
    foreach ($carts as $product) {
        $idProduct = $product['id'];
        $img = $product['img'];
        $name = $product['name'];
        $size = $product['size'];
        $color = $product['color'];
        $quantity = $product['quantity'];
        $price = $product['price'];
        insert_bill_detail($idProduct, $idBill, $name, $img, $price, $quantity, $size, $color);

        unset($_SESSION['cart']);
        header('location: index.php?page=order-success&idbill=' . $idBill . '');
    }
}
