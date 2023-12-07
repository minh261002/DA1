<?php
function subtotal($price, $quantity)
{
    $subtotal = 0;
    $subtotal = (float) $price * (float) $quantity;

    $_SESSION['subtotal'] = $subtotal;

    return $subtotal;
}

function temporary()
{
    $temporary = 0;

    foreach ($_SESSION['cart'] as $key => $item) {
        $subtotal = subtotal($item["price"], $item["quantity"]);
        $temporary += $subtotal;
        $_SESSION['cart'][$key]['subtotal'] = $subtotal;
    }

    $_SESSION['temporary'] = $temporary;

    return $temporary;
}

function total_price()
{
    $total_price = 0;

    foreach ($_SESSION['cart'] as $key => $item) {
        $subtotal = subtotal($item["price"], $item["quantity"]);
        $total_price += $subtotal;
        $_SESSION['cart'][$key]['subtotal'] = $subtotal;
    }

    if (isset($_SESSION['discounted'])) {
        $total_price -= $_SESSION['discounted'];
    }

    $_SESSION['total_price'] = $total_price;

    return $total_price;
}


function total_order()
{
    $total_order = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total_order += $item["quantity"];
    }

    $_SESSION['total_order'] = $total_order;
}

function show_Cart()
{
    $html_cart = '';

    if (!empty($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        foreach ($_SESSION["cart"] as $pdCart) {

            $id = $pdCart["id"];
            $img = $pdCart["img"];
            $name = $pdCart["name"];
            $size = $pdCart["size"];
            $color = $pdCart["color"];
            $price = $pdCart["price"];
            $quantity = $pdCart["quantity"];

            $html_cart .= "<tr class='cart-row'>
                <td> <img src='uploads/{$img}' width='50px'> </td>
                <td class='cart-name'>
                    <p>{$name}</p>
                    <p>Kích Thước: <span>{$size}</span></p>
                    <p>Màu Sắc: <span>{$color}</span></p>
                </td>
                <td class='cart-price' data-price='{$price}'>" . number_format($price, 0, ',', '.') . " đ</td>
                <td>
                    <form action='' class='cart-quantity flex' method='POST'>
                        <input type='hidden' name='productId' value='{$id}'>
                        <button type='submit' class='decrement' name='decrement'>-</button>
                        <input type='number' name='quantity' id='quantity_{$id}' class='quantity' value='{$quantity}' min='1' max='10'>
                        <button type='submit' class='increment' name='increment'>+</button>
                    </form>
                </td>
                <td class='cart-total'>
                    <p class='sub-total_{$id}'>" . number_format(subtotal($price, $quantity), 0, ',', '.') . " đ</p>
                    <a href='index.php?page=cart&act=del1&id={$id}'>Xóa</a>
                </td>
            </tr>";
        }
    } else {
        $html_cart = '<p>Giỏ hàng trống</p>';
    }
    return $html_cart;
}

total_price();
total_order();
temporary();
?>