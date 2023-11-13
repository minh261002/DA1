<?php
function show_Cart()
{
    $html_cart = '';

    if (!empty($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        foreach ($_SESSION["cart"] as $pdCart) {
            extract($pdCart);

            $id = $pdCart["id"];
            $img = $pdCart["img"];
            $name = $pdCart["name"];
            $size = $pdCart["size"];
            $color = $pdCart["color"];
            $price = $pdCart["price"];
            $quantity = $pdCart["quantity"];

            $subtotal = subtotal($price, $quantity);


            $html_cart .= '
        <tr class="cart-row">
            <td> <img src="Uploads/' . $img . '" width=" 50px"> </td>

                <td class="cart-name">
                    <p>' . $name . '</p>
                    <p>Kích Thước: <span>' . $size . '</span></p>
                    <p>Màu Sắc: <span>' . $color . '</span></p>
                </td>

                <td class="cart-price" data-price="' . $price . '">' . number_format($price, 0, ',', '.') . ' đ</td>

                <td>
                    <form action="" class="cart-quantity flex" method="POST">
                        <input type="hidden" name="productId" value="' . $id . '">
                        <button type="submit" class="decrement" name="decrement">-</button>
                        <input type="number" name="quantity" class="quantity" value="' . $quantity . '" min="1" max="10">
                        <button type="submit" class="increment" name="increment">+</button>
                    </form>
                </td>

                <td class="cart-total">
                    <p id="sub-total">' . number_format($subtotal, 0, ',', '.') . ' đ</p>
                    <a href="index.php?page=cart&act=del1&id=' . $id . '">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.25 2H9.5V1.5C9.5 1.10218 9.34197 0.720644 9.06066 0.43934C8.77936 0.158035 8.39782 0 8 0L6 0C5.60218 0 5.22064 0.158035 4.93934 0.43934C4.65803 0.720644 4.5 1.10218 4.5 1.5V2H1.75C1.41856 2.00026 1.10077 2.13205 0.866409 2.36641C0.632046 2.60077 0.500265 2.91856 0.5 3.25V5C0.5 5.13261 0.552678 5.25979 0.646446 5.35355C0.740214 5.44732 0.867392 5.5 1 5.5H1.273L1.705 14.571C1.72322 14.9555 1.88858 15.3183 2.16686 15.5843C2.44514 15.8503 2.81504 15.9991 3.2 16H10.8C11.1858 16.0004 11.557 15.8522 11.8363 15.5861C12.1157 15.3199 12.2817 14.9564 12.3 14.571L12.727 5.5H13C13.1326 5.5 13.2598 5.44732 13.3536 5.35355C13.4473 5.25979 13.5 5.13261 13.5 5V3.25C13.4997 2.91856 13.368 2.60077 13.1336 2.36641C12.8992 2.13205 12.5814 2.00026 12.25 2ZM5.5 1.5C5.5 1.36739 5.55268 1.24021 5.64645 1.14645C5.74021 1.05268 5.86739 1 6 1H8C8.13261 1 8.25979 1.05268 8.35355 1.14645C8.44732 1.24021 8.5 1.36739 8.5 1.5V2H5.5V1.5ZM1.5 3.25C1.5 3.1837 1.52634 3.12011 1.57322 3.07322C1.62011 3.02634 1.6837 3 1.75 3H12.25C12.3163 3 12.3799 3.02634 12.4268 3.07322C12.4737 3.12011 12.5 3.1837 12.5 3.25V4.5H1.5V3.25ZM11.3 14.524C11.2938 14.6524 11.2384 14.7735 11.1453 14.8621C11.0522 14.9508 10.9286 15.0001 10.8 15H3.2C3.07145 15.0001 2.94778 14.9508 2.85467 14.8621C2.76156 14.7735 2.70617 14.6524 2.7 14.524L2.274 5.5H11.725L11.3 14.524Z"
                                fill="black"></path>
                            <path
                                d="M7 14C7.13261 14 7.25978 13.9473 7.35355 13.8535C7.44731 13.7598 7.5 13.6326 7.5 13.5V7C7.5 6.86739 7.44731 6.74022 7.35355 6.64645C7.25978 6.55269 7.13261 6.5 7 6.5C6.86739 6.5 6.74022 6.55269 6.64645 6.64645C6.55269 6.74022 6.5 6.86739 6.5 7V13.5C6.5 13.6326 6.55269 13.7598 6.64645 13.8535C6.74022 13.9473 6.86739 14 7 14Z"
                                fill="black"></path>
                            <path
                                d="M9.5 14C9.63261 14 9.75978 13.9473 9.85355 13.8535C9.94731 13.7598 10 13.6326 10 13.5V7C10 6.86739 9.94731 6.74022 9.85355 6.64645C9.75978 6.55269 9.63261 6.5 9.5 6.5C9.36739 6.5 9.24022 6.55269 9.14645 6.64645C9.05269 6.74022 9 6.86739 9 7V13.5C9 13.6326 9.05269 13.7598 9.14645 13.8535C9.24022 13.9473 9.36739 14 9.5 14Z"
                                fill="black"></path>
                            <path
                                d="M4.5 14C4.63261 14 4.75978 13.9473 4.85355 13.8535C4.94731 13.7598 5 13.6326 5 13.5V7C5 6.86739 4.94731 6.74022 4.85355 6.64645C4.75978 6.55269 4.63261 6.5 4.5 6.5C4.36739 6.5 4.24022 6.55269 4.14645 6.64645C4.05269 6.74022 4 6.86739 4 7V13.5C4 13.6326 4.05269 13.7598 4.14645 13.8535C4.24022 13.9473 4.36739 14 4.5 14Z"
                                fill="black"></path>
                        </svg>
                    </a>
                </td>
        </tr>';
        }
    } else {
        $html_cart = '<p>Trống</p>';
    }
    return $html_cart;

}

function subtotal($price, $quantity)
{
    return (float) $price * (float) $quantity;
}

function total_price()
{
    $total_price = 0;

    foreach ($_SESSION['cart'] as $pdCart) {
        $price = $pdCart["price"];
        $quantity = $pdCart["quantity"];
        $subtotal = subtotal($price, $quantity);
        $total_price += $subtotal;
    }

    return $total_price;
}

function total_order($quantity)
{
    $total_order = 0;
    $total_order += $quantity;
    return $total_order;
}