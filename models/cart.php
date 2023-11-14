<?php
function subtotal($price, $quantity)
{
    return (float) $price * (float) $quantity;
}

function total_price()
{
    $total_price = 0;

    foreach ($_SESSION['cart'] as $key => $item) {
        $subtotal = subtotal($item["price"], $item["quantity"]);
        $total_price += $subtotal;
        $_SESSION['cart'][$key]['subtotal'] = $subtotal;
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
            // Truy cập trực tiếp từ mảng thay vì dùng extract()
            $id = $pdCart["id"];
            $img = $pdCart["img"];
            $name = $pdCart["name"];
            $size = $pdCart["size"];
            $color = $pdCart["color"];
            $price = $pdCart["price"];
            $quantity = $pdCart["quantity"];
            $subtotal = subtotal($price, $quantity);

            $html_cart .= "<tr class='cart-row'>
                <td> <img src='Uploads/{$img}' width='50px'> </td>
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
                        <input type='number' name='quantity' class='quantity' value='{$quantity}' min='1' max='10'>
                        <button type='submit' class='increment' name='increment'>+</button>
                    </form>
                </td>
                <td class='cart-total'>
                    <p id='sub-total'>" . number_format($subtotal, 0, ',', '.') . " đ</p>
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
?>