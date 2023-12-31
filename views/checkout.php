<?php
if (isset($_SESSION['user'])) {
    $id_user = $id;
}

if (isset($address) && is_string($address)) {

    $addressData = json_decode($address, true);

    if ($addressData !== null) {

        $province = $addressData['province'];
        $district = $addressData['district'];
        $ward = $addressData['ward'];
        $detail = $addressData['detail'];
    } else {
        echo "Có lỗi";
    }
}

$html_cart_row = '';

if (!empty($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
    foreach ($_SESSION["cart"] as $pdCart) {
        $id = $pdCart["id"];
        $img = $pdCart["img"];
        $name = $pdCart["name"];
        $size = $pdCart["size"];
        $color = $pdCart["color"];
        $price = $pdCart["price"];
        $quantity = $pdCart["quantity"];
        $subtotal = subtotal($price, $quantity);

        $html_cart_row .= '
            <tr class="cart-row">
            <td> <img src="uploads/' . $img . '" width=" 50px"> </td>

            <td class="cart-name">
                <p>' . $name . '</p>
                <p>Kích Thước: <span>' . $size . '</span></p>
                <p>Màu Sắc: <span>' . $color . '</span></p>
            </td>

            <td class="cart-price" data-price="' . $price . ' ?>">
                ' . number_format($price, 0, ',', '.') . ' đ
            </td>

            <td class="text-center fw-bold"> ' . $quantity . '</td>

            <td class="cart-total">
                <p id="sub-total">
                ' . number_format($subtotal, 0, ',', '.') . ' đ
                </p>
            </td>
            </tr>
        ';
    }
}
$total_price = $_SESSION['total_price'] ?? 0;
$total_order = $_SESSION['total_order'] ?? 0;
$temporary = $_SESSION['temporary'] ?? 0;
?>

<main>
    <form action="index.php?page=checkout" method="post" class="checkout-container py-5">
        <div class="wrap-content">
            <div class="checkout">
                <div class="condition">
                    <form class="step-cart">
                        <svg width="18" height="21" viewBox="0 0 18 21" fill="rgb(153, 153, 153)" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.901086 20.3C0.694829 20.3 0.49699 20.2182 0.350956 20.0726C0.204923 19.9269 0.122616 19.7293 0.122086 19.523V5.77004C0.121428 5.66723 0.141077 5.56529 0.179905 5.47009C0.218734 5.37489 0.275979 5.28829 0.348355 5.21526C0.420732 5.14224 0.506815 5.08422 0.601666 5.04454C0.696518 5.00486 0.79827 4.9843 0.901086 4.98404H3.28709C3.44223 3.69357 4.06487 2.50469 5.03724 1.64221C6.00962 0.779738 7.26433 0.303467 8.56409 0.303467C9.86385 0.303467 11.1186 0.779738 12.0909 1.64221C13.0633 2.50469 13.6859 3.69357 13.8411 4.98404H16.2221C16.3254 4.98364 16.4278 5.0037 16.5233 5.04306C16.6189 5.08242 16.7057 5.14031 16.7788 5.21337C16.8518 5.28644 16.9097 5.37324 16.9491 5.46878C16.9884 5.56432 17.0085 5.66671 17.0081 5.77004V19.523C17.0076 19.6257 16.9868 19.7272 16.947 19.8218C16.9072 19.9165 16.8492 20.0023 16.7762 20.0745C16.7032 20.1466 16.6166 20.2037 16.5216 20.2424C16.4265 20.2811 16.3247 20.3007 16.2221 20.3H0.901086ZM4.86409 4.98404H12.2641C12.1169 4.10917 11.6645 3.31475 10.9871 2.74183C10.3097 2.16891 9.45125 1.85454 8.56409 1.85454C7.67692 1.85454 6.81845 2.16891 6.14108 2.74183C5.46372 3.31475 5.01128 4.10917 4.86409 4.98404Z" fill="rgb(153, 153, 153)"></path>
                            <path d="M12.7541 8.65607V6.78107H14.5011V8.65607C14.5011 9.00107 14.1101 9.28107 13.6281 9.28107C13.1461 9.28107 12.7541 9.00107 12.7541 8.65607ZM2.62207 8.65607V6.78107H4.36907V8.65607C4.36907 9.00107 3.97807 9.28107 3.49507 9.28107C3.01207 9.28107 2.62207 9.00107 2.62207 8.65607Z" fill="white"></path>
                        </svg>
                        <p onclick="window.location.replace('index.php?page=cart')">GIỎ HÀNG</p>
                    </form>
                    <div class="dotline"></div>
                    <div class="step-checkout active">
                        <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.35 0.806049C13.2609 0.652538 13.1331 0.525046 12.9794 0.436268C12.8257 0.347491 12.6515 0.300525 12.474 0.300049H8.70996V4.75205H15.633L13.35 0.806049Z" fill="#C92027"></path>
                            <path d="M7.65586 0.300049H3.85586C3.67808 0.300351 3.5035 0.347343 3.34959 0.43632C3.19568 0.525297 3.06784 0.653138 2.97886 0.807049L0.703857 4.75205H7.65386V0.300049H7.65586Z" fill="#C92027"></path>
                            <path d="M0.326904 5.80707V17.0591C0.327434 17.3879 0.458386 17.7032 0.691032 17.9357C0.923679 18.1681 1.23903 18.2988 1.56791 18.2991H14.7619C15.0908 18.2988 15.4061 18.1681 15.6388 17.9357C15.8714 17.7032 16.0024 17.3879 16.0029 17.0591V5.80707H0.326904ZM10.5599 10.5391L7.83191 13.2671C7.78296 13.3161 7.72482 13.355 7.66081 13.3816C7.59681 13.4081 7.5282 13.4218 7.4589 13.4218C7.38961 13.4218 7.321 13.4081 7.257 13.3816C7.193 13.355 7.13486 13.3161 7.08591 13.2671L5.8069 11.9881C5.75437 11.9399 5.71212 11.8816 5.68272 11.8167C5.65332 11.7518 5.63736 11.6816 5.63581 11.6103C5.63426 11.5391 5.64716 11.4683 5.67371 11.4021C5.70027 11.336 5.73994 11.2759 5.79034 11.2255C5.84073 11.1751 5.90081 11.1354 5.96694 11.1089C6.03308 11.0823 6.10391 11.0694 6.17516 11.071C6.24641 11.0725 6.31661 11.0885 6.38153 11.1179C6.44645 11.1473 6.50475 11.1895 6.55291 11.2421L7.4589 12.1481L9.8149 9.79207C9.86389 9.74309 9.92204 9.70423 9.98604 9.67772C10.05 9.65121 10.1186 9.63757 10.1879 9.63757C10.2572 9.63757 10.3258 9.65121 10.3898 9.67772C10.4538 9.70423 10.5119 9.74309 10.5609 9.79207C10.6099 9.84105 10.6487 9.89921 10.6753 9.96321C10.7018 10.0272 10.7154 10.0958 10.7154 10.1651C10.7154 10.2343 10.7018 10.3029 10.6753 10.3669C10.6487 10.4309 10.6099 10.4891 10.5609 10.5381L10.5599 10.5391Z" fill="#C92027"></path>
                        </svg>
                        <p>THANH TOÁN</p>
                    </div>
                    <div class="dotline"></div>
                    <div class="step-complete">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.3259 9.70705V0.930049C16.3259 0.762962 16.2596 0.602719 16.1414 0.484572C16.0233 0.366424 15.863 0.300049 15.6959 0.300049L11.3039 0.300049V6.52405C11.3043 6.63809 11.2736 6.75007 11.2153 6.84807C11.157 6.94607 11.0732 7.0264 10.9728 7.08049C10.8724 7.13459 10.7592 7.16042 10.6453 7.15524C10.5314 7.15005 10.421 7.11404 10.3259 7.05105L8.32593 5.73905L6.32593 7.05105C6.23091 7.11324 6.12084 7.14859 6.00738 7.15336C5.89391 7.15812 5.78127 7.13213 5.68136 7.07813C5.58146 7.02413 5.49801 6.94413 5.43984 6.8466C5.38167 6.74906 5.35095 6.63761 5.35093 6.52405V0.300049H0.955928C0.788841 0.300049 0.628598 0.366424 0.51045 0.484572C0.392303 0.602719 0.325928 0.762962 0.325928 0.930049L0.325928 14.23C0.325928 14.3128 0.342223 14.3947 0.373884 14.4711C0.405544 14.5476 0.45195 14.617 0.51045 14.6755C0.568951 14.734 0.638402 14.7804 0.714837 14.8121C0.791272 14.8438 0.873195 14.86 0.955928 14.86H10.0709C10.3089 13.3875 11.0752 12.0522 12.2265 11.1037C13.3777 10.1553 14.8351 9.65877 16.3259 9.70705Z" fill="#999999"></path>
                            <path d="M8.67093 4.45905L10.0439 5.35905V0.300049H6.60693V5.35805L7.97993 4.45805C8.08259 4.39063 8.20277 4.35479 8.32559 4.35497C8.44841 4.35514 8.56847 4.39133 8.67093 4.45905Z" fill="#999999"></path>
                            <path d="M16.5559 12.4811C15.8103 12.4811 15.0814 12.7022 14.4614 13.1164C13.8414 13.5307 13.3582 14.1195 13.0729 14.8083C12.7875 15.4972 12.7129 16.2553 12.8583 16.9866C13.0038 17.7179 13.3629 18.3896 13.8901 18.9169C14.4173 19.4441 15.0891 19.8032 15.8204 19.9486C16.5517 20.0941 17.3097 20.0194 17.9986 19.7341C18.6875 19.4488 19.2763 18.9656 19.6905 18.3456C20.1048 17.7256 20.3259 16.9967 20.3259 16.2511C20.3248 15.2515 19.9273 14.2932 19.2205 13.5865C18.5137 12.8797 17.5554 12.4821 16.5559 12.4811ZM18.7759 15.5811L16.2959 18.0621C16.2044 18.1535 16.0803 18.2049 15.9509 18.2049C15.8215 18.2049 15.6974 18.1535 15.6059 18.0621L14.2429 16.6991C14.1961 16.6541 14.1587 16.6002 14.133 16.5406C14.1073 16.4811 14.0937 16.4169 14.0931 16.3521C14.0924 16.2872 14.1047 16.2228 14.1293 16.1627C14.1538 16.1026 14.1901 16.048 14.236 16.0021C14.2818 15.9562 14.3365 15.92 14.3965 15.8954C14.4566 15.8709 14.521 15.8586 14.5859 15.8592C14.6508 15.8599 14.7149 15.8735 14.7745 15.8992C14.8341 15.9249 14.8879 15.9623 14.9329 16.0091L15.9509 17.0271L18.0859 14.8921C18.178 14.8035 18.3011 14.7547 18.4289 14.756C18.5566 14.7572 18.6788 14.8085 18.7691 14.8989C18.8594 14.9892 18.9107 15.1113 18.912 15.2391C18.9133 15.3668 18.8644 15.49 18.7759 15.5821V15.5811Z" fill="#999999"></path>
                        </svg>
                        <p>HOÀN THÀNH ĐƠN HÀNG</p>
                    </div>
                </div>

                <div class="checkout-content">
                    <div class="checkout-content_left">
                        <div class="form-checkout">
                            <div class="form-container">
                                <div class="head-checkout">
                                    <div class="title-form">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.0058 11.4922C12.784 11.4922 13.5447 11.2615 14.1917 10.8293C14.8387 10.3972 15.343 9.78287 15.6408 9.06417C15.9386 8.34546 16.0165 7.55461 15.8647 6.79164C15.7129 6.02866 15.3382 5.32783 14.7879 4.77775C14.2377 4.22768 13.5366 3.85308 12.7734 3.70131C12.0102 3.54955 11.2191 3.62743 10.5001 3.92513C9.7812 4.22283 9.16671 4.72696 8.73438 5.37378C8.30205 6.0206 8.07129 6.78106 8.07129 7.55898C8.07248 8.60178 8.48741 9.60152 9.22501 10.3389C9.96262 11.0763 10.9627 11.491 12.0058 11.4922ZM12.0058 5.03228C12.5057 5.03228 12.9944 5.18047 13.41 5.45811C13.8256 5.73574 14.1496 6.13036 14.3409 6.59205C14.5322 7.05374 14.5823 7.56177 14.4847 8.05191C14.3872 8.54204 14.1465 8.99226 13.793 9.34563C13.4395 9.69899 12.9892 9.93963 12.4989 10.0371C12.0086 10.1346 11.5004 10.0846 11.0386 9.89334C10.5767 9.7021 10.182 9.37825 9.90427 8.96274C9.62654 8.54722 9.47829 8.05872 9.47829 7.55898C9.47909 6.88911 9.74563 6.24689 10.2195 5.77321C10.6933 5.29953 11.3357 5.03307 12.0058 5.03228Z" fill="black"></path>
                                            <path d="M7.72185 14.6262C8.78685 16.0687 8.35935 15.5079 11.4283 19.888C11.4932 19.9808 11.5795 20.0566 11.6799 20.1089C11.7803 20.1613 11.8919 20.1886 12.0051 20.1886C12.1183 20.1886 12.2299 20.1613 12.3303 20.1089C12.4307 20.0566 12.517 19.9808 12.5819 19.888C15.6659 15.4854 15.2414 16.0432 16.2899 14.6247C17.4425 13.2195 18.3742 11.647 19.0528 9.96117C19.4927 8.79766 19.6262 7.54069 19.4405 6.31079C19.2548 5.0809 18.7561 3.91931 17.9923 2.93741C17.2854 2.02323 16.3783 1.28314 15.3406 0.773951C14.303 0.264758 13.1625 0 12.0066 0C10.8507 0 9.71018 0.264758 8.67256 0.773951C7.63495 1.28314 6.72784 2.02323 6.02085 2.93741C5.25583 3.91862 4.75583 5.07987 4.56881 6.30979C4.3818 7.53971 4.51403 8.79703 4.95284 9.96117C5.63317 11.6479 6.56691 13.221 7.72185 14.6262ZM7.13235 3.79664C7.70779 3.05158 8.44646 2.44834 9.29157 2.03328C10.1367 1.61822 11.0658 1.4024 12.0073 1.4024C12.9489 1.4024 13.878 1.61822 14.7231 2.03328C15.5682 2.44834 16.3069 3.05158 16.8823 3.79664C17.4986 4.59508 17.8997 5.53819 18.0473 6.53581C18.1949 7.53344 18.084 8.55224 17.7253 9.49482C17.0871 11.0486 16.2201 12.4982 15.1528 13.7954C14.3743 14.8451 14.6084 14.5257 12.0029 18.2625C9.40035 14.5257 9.62985 14.8451 8.85285 13.7954C7.78984 12.5013 6.92584 11.0558 6.28935 9.50682C5.93067 8.56424 5.81982 7.54544 5.96741 6.54781C6.115 5.55018 6.5161 4.60707 7.13235 3.80863V3.79664Z" fill="black"></path>
                                            <path d="M8.29775 17.6808C8.24841 17.6027 8.18416 17.5351 8.10868 17.4819C8.03321 17.4286 7.94798 17.3907 7.85786 17.3704C7.76775 17.3501 7.6745 17.3477 7.58346 17.3634C7.49242 17.3791 7.40535 17.4125 7.32725 17.4619L5.32775 18.7245C5.22736 18.7879 5.14467 18.8756 5.08736 18.9796C5.03006 19.0836 5 19.2003 5 19.319C5 19.4377 5.03006 19.5545 5.08736 19.6585C5.14467 19.7624 5.22736 19.8502 5.32775 19.9136L11.6278 23.8918C11.74 23.9625 11.87 24.0001 12.0028 24.0001C12.1355 24.0001 12.2655 23.9625 12.3778 23.8918L18.6777 19.9136C18.7778 19.8501 18.8602 19.7624 18.9173 19.6586C18.9744 19.5548 19.0043 19.4382 19.0043 19.3198C19.0043 19.2013 18.9744 19.0848 18.9173 18.981C18.8602 18.8772 18.7778 18.7894 18.6777 18.7259L16.6782 17.4634C16.6002 17.4104 16.5122 17.3737 16.4196 17.3554C16.327 17.3371 16.2317 17.3376 16.1393 17.3569C16.0469 17.3762 15.9594 17.4139 15.8819 17.4677C15.8044 17.5215 15.7385 17.5904 15.6882 17.6702C15.6378 17.75 15.6041 17.8391 15.5889 17.9322C15.5737 18.0254 15.5774 18.1206 15.5998 18.2123C15.6223 18.3039 15.6629 18.3901 15.7193 18.4657C15.7757 18.5414 15.8468 18.6049 15.9282 18.6525L16.9858 19.3212L12.0028 22.4703L7.01976 19.3212L8.07725 18.6525C8.15568 18.6033 8.22362 18.5391 8.27718 18.4635C8.33073 18.388 8.36884 18.3027 8.38933 18.2124C8.40981 18.1221 8.41226 18.0287 8.39655 17.9375C8.38084 17.8462 8.34726 17.759 8.29775 17.6808Z" fill="black"></path>
                                        </svg>
                                        <div>ĐỊA CHỈ GIAO HÀNG</div>
                                    </div>
                                    <div class="btn-login">
                                        <?php
                                        if (!isset($_SESSION["user"])) {
                                            echo '
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22 12C22 6.49 17.51 2 12 2C6.49 2 2 6.49 2 12C2 14.9 3.25 17.51 5.23 19.34C5.23 19.35 5.23 19.35 5.22 19.36C5.32 19.46 5.44 19.54 5.54 19.63C5.6 19.68 5.65 19.73 5.71 19.77C5.89 19.92 6.09 20.06 6.28 20.2C6.35 20.25 6.41 20.29 6.48 20.34C6.67 20.47 6.87 20.59 7.08 20.7C7.15 20.74 7.23 20.79 7.3 20.83C7.5 20.94 7.71 21.04 7.93 21.13C8.01 21.17 8.09 21.21 8.17 21.24C8.39 21.33 8.61 21.41 8.83 21.48C8.91 21.51 8.99 21.54 9.07 21.56C9.31 21.63 9.55 21.69 9.79 21.75C9.86 21.77 9.93 21.79 10.01 21.8C10.29 21.86 10.57 21.9 10.86 21.93C10.9 21.93 10.94 21.94 10.98 21.95C11.32 21.98 11.66 22 12 22C12.34 22 12.68 21.98 13.01 21.95C13.05 21.95 13.09 21.94 13.13 21.93C13.42 21.9 13.7 21.86 13.98 21.8C14.05 21.79 14.12 21.76 14.2 21.75C14.44 21.69 14.69 21.64 14.92 21.56C15 21.53 15.08 21.5 15.16 21.48C15.38 21.4 15.61 21.33 15.82 21.24C15.9 21.21 15.98 21.17 16.06 21.13C16.27 21.04 16.48 20.94 16.69 20.83C16.77 20.79 16.84 20.74 16.91 20.7C17.11 20.58 17.31 20.47 17.51 20.34C17.58 20.3 17.64 20.25 17.71 20.2C17.91 20.06 18.1 19.92 18.28 19.77C18.34 19.72 18.39 19.67 18.45 19.63C18.56 19.54 18.67 19.45 18.77 19.36C18.77 19.35 18.77 19.35 18.76 19.34C20.75 17.51 22 14.9 22 12ZM16.94 16.97C14.23 15.15 9.79 15.15 7.06 16.97C6.62 17.26 6.26 17.6 5.96 17.97C4.44 16.43 3.5 14.32 3.5 12C3.5 7.31 7.31 3.5 12 3.5C16.69 3.5 20.5 7.31 20.5 12C20.5 14.32 19.56 16.43 18.04 17.97C17.75 17.6 17.38 17.26 16.94 16.97Z"
                                                    fill="#C92027"></path>
                                                <path
                                                    d="M12 6.92969C9.93 6.92969 8.25 8.60969 8.25 10.6797C8.25 12.7097 9.84 14.3597 11.95 14.4197C11.98 14.4197 12.02 14.4197 12.04 14.4197C12.06 14.4197 12.09 14.4197 12.11 14.4197C12.12 14.4197 12.13 14.4197 12.13 14.4197C14.15 14.3497 15.74 12.7097 15.75 10.6797C15.75 8.60969 14.07 6.92969 12 6.92969Z"
                                                    fill="#C92027"></path>
                                                </svg>
                                            <a href="index.php?page=login&bill=1">Đăng nhập</a>
                                            ';
                                        } ?>
                                    </div>
                                </div>

                                <div class="group-checkout">
                                    <label for="name">
                                        HỌ TÊN
                                        <span>*</span>
                                    </label>
                                    <input type="text" name="fullname" placeholder="Nhập họ tên của bạn" value="<?php if (isset($fullname)) {
                                                                                                                    echo $fullname;
                                                                                                                } ?>">
                                </div>

                                <div class="group-checkout">
                                    <label for="email">
                                        EMAIL
                                        <span>*</span>
                                    </label>
                                    <input type="text" name="email" placeholder="Nhập email của bạn" value="<?php if (isset($email)) {
                                                                                                                echo $email;
                                                                                                            } ?>">
                                </div>

                                <div class="group-checkout">
                                    <label for="phone">
                                        SĐT
                                        <span>*</span>
                                    </label>
                                    <input type="text" name="phone" placeholder="Nhập số điện thoại" value="<?php if (isset($phone)) {
                                                                                                                echo $phone;
                                                                                                            } ?>">
                                </div>
                                <div class="group-checkout"></div>

                                <div class="group-checkout">
                                    <label for="city">
                                        TỈNH / THÀNH PHỐ
                                        <span>*</span>
                                    </label>
                                    <select name="city" class="form-select" id="city">
                                        <option value="<?php if (isset($province)) {
                                                            echo $province;
                                                        } ?>">
                                            <?php
                                            if (isset($province)) {
                                                echo $province;
                                            } else {
                                                echo 'Tỉnh / Thành Phố';
                                            }
                                            ?>
                                        </option>
                                    </select>
                                </div>

                                <div class="group-checkout">
                                    <label for="district">
                                        QUẬN / HUYỆN
                                        <span>*</span>
                                    </label>
                                    <select name="district" class="form-select" id="district">
                                        <option value="<?php if (isset($district)) {
                                                            echo $district;
                                                        } ?>">
                                            <?php
                                            if (isset($district)) {
                                                echo $district;
                                            } else {
                                                echo 'Quận / Huyện';
                                            }
                                            ?>
                                        </option>
                                    </select>
                                </div>

                                <div class="group-checkout">
                                    <label for="ward">
                                        PHƯỜNG / XÃ
                                        <span>*</span>
                                    </label>
                                    <select name="ward" class="form-select" id="ward">
                                        <option value="<?php if (isset($ward)) {
                                                            echo $ward;
                                                        } ?>">
                                            <?php
                                            if (isset($ward)) {
                                                echo $ward;
                                            } else {
                                                echo 'Quận / Huyện';
                                            }
                                            ?>
                                        </option>
                                    </select>
                                </div>

                                <div class="group-checkout w-100">
                                    <label for="address">
                                        ĐỊA CHỈ
                                        <span>*</span>
                                    </label>
                                    <input name="detailAddress" type="text" placeholder="Nhập Địa Chỉ Cụ Thể" value="<?php if (isset($detail)) {
                                                                                                                            echo $detail;
                                                                                                                        } ?>">
                                </div>

                                <div class="group-checkout w-100">
                                    <label for="notes">
                                        GHI CHÚ
                                        <span>*</span>
                                    </label>
                                    <textarea name="notes" id="" rows="5" placeholder="Nhập ghi chú của bạn"></textarea>
                                </div>


                                <div class="group-checkout">
                                    <label for="ship">ĐƠN VỊ VẬN CHUYỂN: </label>
                                    <select name="transport" class="form-control" id="ship" onchange="saveShippingMethod()">
                                        <option value=" 1">Hoả tốc</option>
                                        <option value="2">Nhanh</option>
                                        <option selected value="3">Tiết kiệm</option>
                                    </select>
                                </div>

                                <div class="pay-method">
                                    <div class="pay-head">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.8445 14.8124C21.6705 14.8128 21.5038 14.8821 21.3809 15.0053C21.258 15.1285 21.189 15.2954 21.189 15.4694V20.0639H2.8125V12.1934H10.032C10.2006 12.1853 10.3597 12.1126 10.4762 11.9905C10.5926 11.8683 10.6576 11.7059 10.6576 11.5371C10.6576 11.3683 10.5926 11.206 10.4762 11.0838C10.3597 10.9616 10.2006 10.8889 10.032 10.8809H2.8125V8.25586H10.032C10.2006 8.2478 10.3597 8.17514 10.4762 8.05296C10.5926 7.93077 10.6576 7.76842 10.6576 7.59961C10.6576 7.4308 10.5926 7.26845 10.4762 7.14626C10.3597 7.02408 10.2006 6.95142 10.032 6.94336H2.8125C2.4644 6.94336 2.13056 7.08165 1.88442 7.32779C1.63828 7.57393 1.5 7.90776 1.5 8.25586L1.5 20.0684C1.5 20.4165 1.63828 20.7503 1.88442 20.9964C2.13056 21.2426 2.4644 21.3809 2.8125 21.3809H21.1875C21.5356 21.3809 21.8694 21.2426 22.1156 20.9964C22.3617 20.7503 22.5 20.4165 22.5 20.0684V15.4754C22.5008 15.3887 22.4844 15.3028 22.4519 15.2225C22.4193 15.1421 22.3712 15.0691 22.3102 15.0074C22.2493 14.9458 22.1768 14.8969 22.0969 14.8634C22.0169 14.8299 21.9312 14.8126 21.8445 14.8124Z" fill="black"></path>
                                            <path d="M7.40688 14.8184H4.78188C4.61325 14.8264 4.4542 14.8991 4.33772 15.0213C4.22124 15.1435 4.15625 15.3058 4.15625 15.4746C4.15625 15.6434 4.22124 15.8057 4.33772 15.9279C4.4542 16.0501 4.61325 16.1228 4.78188 16.1309H7.40688C7.5755 16.1228 7.73454 16.0501 7.85102 15.9279C7.9675 15.8057 8.03249 15.6434 8.03249 15.4746C8.03249 15.3058 7.9675 15.1435 7.85102 15.0213C7.73454 14.8991 7.5755 14.8264 7.40688 14.8184Z" fill="black"></path>
                                            <path d="M22.1029 5.02025L17.5099 3.05225C17.4278 3.01776 17.3396 3 17.2504 3C17.1613 3 17.0731 3.01776 16.9909 3.05225L12.398 5.02175C12.2809 5.07263 12.1812 5.15642 12.1109 5.26294C12.0406 5.36947 12.0027 5.49412 12.002 5.62175V8.24375C12.002 11.8543 13.3369 13.9648 16.9249 16.0318C17.0245 16.0886 17.1373 16.1185 17.252 16.1185C17.3666 16.1185 17.4793 16.0886 17.5789 16.0318C21.1654 13.9753 22.5004 11.8648 22.5004 8.24375V5.61875C22.4995 5.49117 22.4614 5.36663 22.3908 5.26035C22.3202 5.15407 22.2201 5.07064 22.1029 5.02025ZM21.1879 8.24825C21.1879 11.2782 20.1844 12.9477 17.2504 14.7057C14.3164 12.9432 13.3129 11.2752 13.3129 8.24825V6.05825L17.2504 4.37075L21.1879 6.05825V8.24825Z" fill="black"></path>
                                            <path d="M19.629 7.08002C19.4928 6.97217 19.3196 6.92241 19.1469 6.9415C18.9742 6.9606 18.8159 7.04702 18.7065 7.18203L16.644 9.76204L15.828 8.54104C15.7803 8.46934 15.7189 8.40773 15.6473 8.35977C15.5757 8.3118 15.4954 8.27841 15.4109 8.26149C15.3264 8.24456 15.2395 8.24445 15.1549 8.26114C15.0704 8.27784 14.99 8.31101 14.9183 8.35878C14.8466 8.40655 14.785 8.46798 14.737 8.53955C14.6891 8.61113 14.6557 8.69144 14.6388 8.77592C14.6218 8.8604 14.6217 8.94738 14.6384 9.0319C14.6551 9.11643 14.6883 9.19684 14.736 9.26854L16.0485 11.238C16.1053 11.3254 16.1819 11.3981 16.2721 11.4502C16.3623 11.5023 16.4635 11.5324 16.5676 11.538H16.5946C16.6932 11.5379 16.7905 11.5156 16.8793 11.4728C16.9681 11.4299 17.0461 11.3676 17.1075 11.2905L19.7325 8.01004C19.7874 7.94243 19.8283 7.86458 19.8528 7.78104C19.8773 7.6975 19.885 7.60992 19.8754 7.52339C19.8657 7.43685 19.839 7.35308 19.7967 7.27697C19.7544 7.20086 19.6974 7.13391 19.629 7.08002Z" fill="black"></path>
                                        </svg>
                                        <p>PHƯƠNG THỨC THANH TOÁN</p>
                                    </div>
                                    <div class="methods">
                                        <div class="method-group">
                                            <input type="radio" name="method" id="cod-method" value="1">
                                            <label for="cod-method"><i class="fa-solid fa-money-bill"></i> Thanh toán
                                                khi
                                                nhận hàng (COD)</label>
                                        </div>
                                        <div class="method-group">
                                            <input type="radio" name="method" id="vnpay-method" value="2">
                                            <label for="vnpay-method"><i class="fa-solid fa-credit-card"></i> Thanh toán
                                                Online qua VNPay</label>
                                        </div>
                                        <div class="method-group">
                                            <input type="radio" name="method" id="momo-method" value="3">
                                            <label for="momo-method"><i class="fa-solid fa-wallet"></i> Thanh toán
                                                Online qua Momo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- mobile -->
                        <div class="cart-container-mobile">

                            <?php foreach ($_SESSION["cart"] as  $cart) { ?>

                                <div class="cart-item-mb">
                                    <img src="uploads/<?php echo $cart['img'] ?>" alt="" class="img-item">
                                    <div class="cart-item-content">
                                        <div class="title-box">
                                            <a class="title-item" href="">
                                                <?php echo $cart['name'] ?>
                                            </a>
                                        </div>
                                        <div class="options-box">
                                            <div class="select">
                                                <p class="size-item">Kích thước: <span>
                                                        <?php echo $cart['size'] ?>
                                                    </span></p>
                                                <p class="color">Màu sắc: <span>
                                                        <?php echo $cart['color'] ?>

                                                    </span></p>
                                                <p>Số lượng:
                                                    <?php echo $cart['quantity'] ?>
                                                </p>
                                            </div>
                                            <div class="price">
                                                <p class=" price-current cart-price" style="color: #c92027;">
                                                    <?php echo number_format($cart['price'] * $cart['quantity'], '0', ',', '.') ?>đ

                                                </p>
                                                <!-- <p class="price-last">147,000đ</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="cart-item">
                            <div class="header-cart-item">
                                Giỏ Hàng <span>(
                                    <?php if ($total_order) {
                                        echo $total_order;
                                    } ?>
                                    Sản Phẩm)
                                </span>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?= $html_cart_row ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bill">
                        <div class="bill-header"> Đơn Hàng</div>
                        <div class="bill-container">
                            <div class="flex transience">
                                <p>Tạm Tính</p>
                                <p class="temporary">
                                    <?php
                                    if (isset($temporary)) {
                                        echo number_format($temporary, 0, ',', '.') . ' đ';
                                    } else {
                                        echo '0 đ';
                                    }
                                    ?>
                                </p>
                            </div>

                            <div class="discount flex">
                                <p>Mã Giảm Giá</p>
                                <p class="discounted">
                                    <?php
                                    if (isset($_SESSION['discounted'])) {
                                        echo '<input type="hidden" name="discounted" value="' . $_SESSION['discounted'] . '">';
                                        echo "-" . number_format($_SESSION['discounted'], 0, '.', ',') . ' đ';
                                    } else {
                                        echo '<input type="hidden" name="discounted" value="0">';
                                        echo '0 đ';
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="discount flex">
                                <p>Phí vận chuyển</p>
                                <p class="discounted" id="pay_ship">
                                    5.000 ₫
                                </p>
                            </div>
                            <div class="line-dash"></div>

                            <div class="total flex">
                                <p id="">Tổng</p>
                                <p class="total-price" id="total_pr">
                                    <?php if (isset($total_price)) {
                                        echo number_format($total_price + 5000, 0, ',', '.') . ' đ';
                                    } ?>
                                </p>
                                <input type="hidden" id="total-price" value="<?php echo $total_price ?>" name="">
                            </div>

                            <div class="line-dash"></div>

                            <button name="order" type="submit" class="continue btn-form">
                                ĐẶT HÀNG ➔
                            </button>
                        </div>
                    </div>
                    </ỏ>
                </div>
            </div>
            </section>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    district.options.add(opt);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset
                    .id)[0].Wards;

                for (const w of dataWards) {
                    var opt = document.createElement('option');
                    opt.value = w.Name;
                    opt.text = w.Name;
                    opt.setAttribute('data-id', w.Id);
                    wards.options.add(opt);
                }
            }
        };
    }
</script>


<script>
    const numberFormat = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND',
    });

    $(document).ready(function() {
        $("#ship").change(function() {
            var selectedMethod = $(this).val();
            var pay_ship;
            var tt_price = $("#total-price").val();
            if (selectedMethod == 1) {
                pay_ship = numberFormat.format(15000);
                var total_price = numberFormat.format(Number(tt_price) + 15000);
            } else if (selectedMethod == 2) {
                pay_ship = numberFormat.format(10000);
                total_price = numberFormat.format(Number(tt_price) + 10000);

            } else {
                pay_ship = numberFormat.format(5000);
                total_price = numberFormat.format(Number(tt_price) + 5000);
            }



            $.ajax({
                type: "POST",
                url: "index.php?page=checkout",
                data: {
                    select: selectedMethod,
                },
                success: function() {
                    $("#pay_ship").html(pay_ship);
                    $("#total_pr").html(total_price);
                }
            });
        });
    });
</script>