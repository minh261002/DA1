<?php
session_start();
require_once 'cart.php';

if (isset($_POST['productId'], $_POST['quantity'], $_POST['action'])) {
    $productId = $_POST['productId'];
    $quantity = intval($_POST['quantity']);
    $action = $_POST['action'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            if ($action == 'increment' && $quantity < 10) {
                $_SESSION['cart'][$key]['quantity']++;
            } elseif ($action == 'decrement' && $quantity > 1) {
                $_SESSION['cart'][$key]['quantity']--;
            }
            break;
        }
    }

    total_price();
    total_order();

    echo json_encode([
        'subtotal' => number_format($_SESSION['cart'][$key]['subtotal'], 0, '.', ',') . ' đ',
        'totalPrice' => number_format($_SESSION['total_price'], 0, '.', ',') . ' đ',
        'totalOrder' => $_SESSION['total_order'] . ' Sản Phẩm',
        'quantity' => $_SESSION['cart'][$key]['quantity'],

    ]);
}
?>