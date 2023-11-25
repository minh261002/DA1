<?php
extract($details);

$discountedPrice = '';

if (isset($sale) && $sale !== 0) {
    $discountAmount = $sale * $price / 100;
    $discountedPrice = $price - $discountAmount;
} else {
    $discountedPrice = $price;
}


?>
<main>
    <section class="breadcrumb my-3">
        <div class="container flex justify-content-start">
            <p>Trang chủ</p>
            <div class="coline"></div>
            <p><a href="index.php?page=product">Sản phẩm</a></p>
            <div class="coline"></div>
            <p>
                <a href="index.php?page=product&id=<?= $id_category ?>">
                    <?= $category_name ?>
                </a>
            </p>
            <div class="coline"></div>
            <p><strong>
                    <?= $name ?>
                </strong></p>
        </div>
    </section>

    <section class="product-info my-3">
        <div class="container">
            <!-- desktop -->
            <div class="product-img">
                <div class="thumbnail-img">
                    <?php
                    $images = json_decode($gallery);
                    if (is_array($images)) {

                        foreach ($images as $image) {
                            echo '<img src="uploads/img1/' . $image . '" width="100%" onclick="changeImage(this)" />';
                        }
                    }
                    ?>
                </div>

                <div class="large-img">
                    <img src="uploads/<?= $img ?>" width="100%" id="largeImage">
                </div>

                <script>
                    function changeImage(thumbnail) {
                        var largeImage = document.getElementById("largeImage");
                        largeImage.src = thumbnail.src;
                    }
                </script>
            </div>

            <!-- mobile -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($images as $key => $image) { ?>
                        <div class="swiper-slide"><img src="Uploads/<?php echo $image ?>" alt=""></div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>


            <!-- thông tin sản phẩm -->
            <div class="product-info">
                <?php if (isset($hot) && $hot === 1) {
                    echo '<div class="muibox">Bán Chạy</div>';
                } ?>

                <div class="product-name">
                    <?= $name ?>
                </div>

                <div class="product-sku">SKU:
                    <?php echo $id ?>
                </div>

                <div class="product-price flex">

                    <?php
                    if (isset($sale) && $sale !== 0) {
                        echo '<div class="price"> ' . number_format($discountedPrice, 0, ',', '.') . '  đ <span> ' . number_format($price, 0, ',', '.') . ' đ</span> </div>';
                    } else {
                        echo '<div class="price"> ' . number_format($discountedPrice, 0, ',', '.') . ' đ </div>';
                    }
                    ?>
                    <div class="status">
                        Còn Hàng
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="icon-wrapper">
                                <path id="Union"
                                    d="M8.60124 1.34619C4.9279 1.34619 1.93457 4.33952 1.93457 8.01286C1.93457 11.6862 4.9279 14.6795 8.60124 14.6795C12.2746 14.6795 15.2679 11.6862 15.2679 8.01286C15.2679 4.33952 12.2746 1.34619 8.60124 1.34619ZM11.7879 6.47952L8.0079 10.2595C7.91457 10.3529 7.7879 10.4062 7.65457 10.4062C7.52124 10.4062 7.39457 10.3529 7.30124 10.2595L5.41457 8.37286C5.22124 8.17952 5.22124 7.85952 5.41457 7.66619C5.6079 7.47286 5.9279 7.47286 6.12124 7.66619L7.65457 9.19952L11.0812 5.77286C11.2746 5.57952 11.5946 5.57952 11.7879 5.77286C11.9812 5.96619 11.9812 6.27952 11.7879 6.47952Z"
                                    fill="#00B578"></path>
                            </g>
                        </svg>

                    </div>
                </div>

                <div class="line-dotted"></div>

                <form action="index.php?page=addToCart" method="POST" id="form-cart">

                    <div class="color">
                        <p>Màu Sắc</p>

                        <div class="color-type flex">
                            <?php
                            $currentColor = null;

                            usort($variant, function ($a, $b) {
                                return strcmp($a['color'], $b['color']);
                            });

                            foreach ($variant as $va) {
                                extract($va);

                                if ($currentColor !== $color) {
                                    echo '
                                            <div class="size-item">
                                                <input type="radio" name="color" id="' . $color . '" value="' . $color . '" class="color">
                                                <label for="' . $color . '" class="color-label" >' . $color . '</label>
                                            </div>
                                        ';
                                    $currentColor = $color;
                                }
                            }
                            ?>
                        </div>
                        <span class="err" id="colorErr"></span>
                    </div>

                    <div class="size">
                        <p>Kích Thước</p>
                        <div class="size-type flex">
                            <?php
                            $currentSize = null;
                            usort($variant, function ($a, $b) {
                                return strcmp($a['size'], $b['size']);
                            });

                            foreach ($variant as $va) {
                                extract($va);

                                if ($currentSize !== $size) {
                                    echo '<div class="size-item">
                                                    <input type="radio" name="size" id="' . $size . '" value="' . $size . '" class="size">
                                                    <label for="' . $size . '" class="size-label">' . $size . '</label>
                                                </div>
                                        ';
                                    $currentSize = $size;
                                }
                            }
                            ?>

                        </div>
                        <span class="err" id="sizeErr"></span>
                    </div>

                    <script src="assets/js/form-cart.js"></script>

                    <div class="quantity flex">
                        <p>Chọn Số Lượng</p>
                        <div class="btn-quantity flex">
                            <button id="decrement">-</button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10">
                            <button id="increment">+</button>
                        </div>

                        <script>
                            var decrementButton = document.getElementById("decrement");
                            var incrementButton = document.getElementById("increment");
                            var quantityInput = document.getElementById("quantity");

                            decrementButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                var currentQuantity = parseInt(quantityInput.value);
                                if (currentQuantity > 1) {
                                    quantityInput.value = currentQuantity - 1;
                                }
                            });

                            incrementButton.addEventListener("click", function (e) {
                                e.preventDefault();
                                var currentQuantity = parseInt(quantityInput.value);
                                quantityInput.value = currentQuantity + 1;
                            });
                        </script>
                    </div>

                    <div class="guide" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <svg width="25" height="10" viewBox="0 0 25 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.515508 10C0.44699 9.99935 0.379275 9.98516 0.316248 9.95825C0.253222 9.93133 0.196124 9.89222 0.148232 9.84317C0.100341 9.79411 0.0625972 9.73607 0.0371678 9.67238C0.0117383 9.60868 -0.00087643 9.54059 4.7298e-05 9.472V0.528C-0.00087643 0.459413 0.0117383 0.391319 0.0371678 0.327625C0.0625972 0.26393 0.100341 0.205889 0.148232 0.156832C0.196124 0.107776 0.253222 0.0686685 0.316248 0.0417552C0.379275 0.0148419 0.44699 0.000652049 0.515508 0L24.4585 0C24.527 0.000652049 24.5947 0.0148419 24.6577 0.0417552C24.7208 0.0686685 24.7779 0.107776 24.8257 0.156832C24.8736 0.205889 24.9114 0.26393 24.9368 0.327625C24.9622 0.391319 24.9749 0.459413 24.9739 0.528V9.472C24.9749 9.54059 24.9622 9.60868 24.9368 9.67238C24.9114 9.73607 24.8736 9.79411 24.8257 9.84317C24.7779 9.89222 24.7208 9.93133 24.6577 9.95825C24.5947 9.98516 24.527 9.99935 24.4585 10H0.515508ZM1.03097 8.941H23.943V1.059H22.5684V5.251C22.5684 5.38785 22.5141 5.5191 22.4175 5.61587C22.3208 5.71264 22.1897 5.767 22.053 5.767C21.9163 5.767 21.7852 5.71264 21.6885 5.61587C21.5918 5.5191 21.5375 5.38785 21.5375 5.251V1.059H19.6285L19.6065 3.746V3.753C19.6061 3.82076 19.5923 3.88777 19.566 3.9502C19.5396 4.01263 19.5013 4.06925 19.4531 4.11684C19.4049 4.16443 19.3478 4.20205 19.2851 4.22756C19.2224 4.25307 19.1553 4.26596 19.0876 4.2655C19.0199 4.26504 18.953 4.25124 18.8906 4.22488C18.8282 4.19853 18.7717 4.16013 18.7241 4.11189C18.6766 4.06365 18.639 4.00651 18.6135 3.94373C18.588 3.88095 18.5752 3.81376 18.5756 3.746V1.059H16.6666V5.251C16.6666 5.38785 16.6123 5.5191 16.5156 5.61587C16.419 5.71264 16.2879 5.767 16.1512 5.767C16.0144 5.767 15.8833 5.71264 15.7867 5.61587C15.69 5.5191 15.6357 5.38785 15.6357 5.251V1.059H13.7267V3.742C13.7267 3.87885 13.6724 4.0101 13.5757 4.10687C13.479 4.20364 13.3479 4.258 13.2112 4.258C13.0745 4.258 12.9434 4.20364 12.8467 4.10687C12.7501 4.0101 12.6958 3.87885 12.6958 3.742V1.059H10.7888V5.251C10.7888 5.31902 10.7754 5.38638 10.7494 5.44923C10.7234 5.51208 10.6853 5.56918 10.6372 5.61728C10.5892 5.66538 10.5321 5.70354 10.4693 5.72957C10.4065 5.7556 10.3393 5.769 10.2713 5.769C10.2034 5.769 10.1361 5.7556 10.0733 5.72957C10.0105 5.70354 9.95346 5.66538 9.90541 5.61728C9.85736 5.56918 9.81924 5.51208 9.79324 5.44923C9.76723 5.38638 9.75385 5.31902 9.75385 5.251V1.063H7.84284V3.746V3.761C7.84186 3.82876 7.82755 3.89567 7.80074 3.95789C7.77393 4.02012 7.73513 4.07645 7.68657 4.12367C7.63801 4.17089 7.58064 4.20807 7.51772 4.23309C7.45481 4.25811 7.38758 4.27048 7.31989 4.2695C7.2522 4.26851 7.18537 4.25419 7.1232 4.22735C7.06104 4.20051 7.00477 4.16168 6.9576 4.11306C6.91043 4.06445 6.87329 4.00702 6.84829 3.94404C6.8233 3.88105 6.81094 3.81376 6.81192 3.746V1.059H1.03097V8.941ZM2.55937 6.269C2.24927 5.94664 2.07603 5.51653 2.07603 5.069C2.07603 4.62147 2.24927 4.19136 2.55937 3.869C2.71195 3.71194 2.89444 3.58709 3.09605 3.50184C3.29765 3.41659 3.51429 3.37267 3.73314 3.37267C3.952 3.37267 4.16863 3.41659 4.37024 3.50184C4.57185 3.58709 4.75433 3.71194 4.90692 3.869C5.21701 4.19136 5.39026 4.62147 5.39026 5.069C5.39026 5.51653 5.21701 5.94664 4.90692 6.269C4.75433 6.42606 4.57185 6.55091 4.37024 6.63616C4.16863 6.72141 3.952 6.76533 3.73314 6.76533C3.51429 6.76533 3.29765 6.72141 3.09605 6.63616C2.89444 6.55091 2.71195 6.42606 2.55937 6.269ZM3.28361 4.607C3.16673 4.72959 3.10152 4.89254 3.10152 5.062C3.10152 5.23146 3.16673 5.39441 3.28361 5.517C3.28165 5.52766 3.28255 5.53866 3.28624 5.54885C3.28993 5.55904 3.29626 5.56807 3.30459 5.575C3.36443 5.63044 3.43493 5.67308 3.51179 5.70031C3.58866 5.72754 3.67026 5.73878 3.75161 5.73335C3.83297 5.72792 3.91236 5.70594 3.98493 5.66874C4.0575 5.63154 4.12173 5.5799 4.17368 5.517C4.29085 5.39381 4.35598 5.23009 4.35549 5.06C4.35641 4.89101 4.29114 4.72838 4.17368 4.607C4.11515 4.54775 4.04545 4.50071 3.96863 4.46862C3.89181 4.43652 3.80939 4.41999 3.72615 4.42C3.64364 4.41993 3.56195 4.43645 3.48594 4.46857C3.40992 4.50069 3.34112 4.54776 3.28361 4.607Z"
                                fill="#222222"></path>
                        </svg>
                        Hướng dẫn chọn kích thước

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="assets/img/size_guide.webp" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group flex flex-column">
                        <div class="btn-cart flex">
                            <input type="hidden" name="product-id" value="<?= $details['id'] ?>">
                            <input type="hidden" name="product-img" value="<?= $img ?>">
                            <input type="hidden" name="product-name" value="<?= $name ?>">
                            <input type="hidden" name="product-price" value="<?= $discountedPrice ?>">
                            <button class="add-to-cart" id="btn-addToCart" type="submit" name="btn-addToCart">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.25 2H3.99001C5.07001 2 5.92 2.93 5.83 4L5 13.96C4.86 15.59 6.14999 16.99 7.78999 16.99H18.44C19.88 16.99 21.14 15.81 21.25 14.38L21.79 6.88C21.91 5.22 20.65 3.87 18.98 3.87H6.07001"
                                        stroke="#C92027" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M16.5 22C17.1904 22 17.75 21.4404 17.75 20.75C17.75 20.0596 17.1904 19.5 16.5 19.5C15.8096 19.5 15.25 20.0596 15.25 20.75C15.25 21.4404 15.8096 22 16.5 22Z"
                                        stroke="#C92027" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M8.5 22C9.19036 22 9.75 21.4404 9.75 20.75C9.75 20.0596 9.19036 19.5 8.5 19.5C7.80964 19.5 7.25 20.0596 7.25 20.75C7.25 21.4404 7.80964 22 8.5 22Z"
                                        stroke="#C92027" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.25 8H21.25" stroke="#C92027" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                                Thêm Giỏ Hàng
                            </button>

                            <button class="buy-now">
                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.625 17.6584C17.625 17.8655 17.5427 18.0641 17.3963 18.2106C17.2498 18.3571 17.0511 18.4394 16.844 18.4394H16.063V19.2204C16.063 19.4275 15.9807 19.6261 15.8343 19.7726C15.6878 19.9191 15.4891 20.0014 15.282 20.0014C15.0749 20.0014 14.8762 19.9191 14.7297 19.7726C14.5833 19.6261 14.501 19.4275 14.501 19.2204V18.4394H13.72C13.5129 18.4394 13.3142 18.3571 13.1678 18.2106C13.0213 18.0641 12.939 17.8655 12.939 17.6584C12.939 17.4512 13.0213 17.2526 13.1678 17.1061C13.3142 16.9596 13.5129 16.8774 13.72 16.8774H14.501V16.0964C14.501 15.8891 14.5833 15.6903 14.7299 15.5437C14.8765 15.3972 15.0752 15.3149 15.2825 15.3149C15.4898 15.3149 15.6885 15.3972 15.8351 15.5437C15.9817 15.6903 16.064 15.8891 16.064 16.0964V16.8774H16.845C17.052 16.8776 17.2504 16.96 17.3966 17.1065C17.5429 17.2529 17.625 17.4514 17.625 17.6584ZM17.625 5.47135V12.9714C17.625 13.1785 17.5427 13.3771 17.3963 13.5236C17.2498 13.6701 17.0511 13.7524 16.844 13.7524C16.6369 13.7524 16.4382 13.6701 16.2917 13.5236C16.1453 13.3771 16.063 13.1785 16.063 12.9714V6.25235H14.5V8.59635C14.5 8.80349 14.4177 9.00214 14.2713 9.1486C14.1248 9.29507 13.9261 9.37735 13.719 9.37735C13.5119 9.37735 13.3132 9.29507 13.1667 9.1486C13.0203 9.00214 12.938 8.80349 12.938 8.59635V6.25235H5.438V8.59635C5.438 8.80349 5.35572 9.00214 5.20925 9.1486C5.06279 9.29507 4.86414 9.37735 4.657 9.37735C4.44987 9.37735 4.25121 9.29507 4.10475 9.1486C3.95828 9.00214 3.876 8.80349 3.876 8.59635V6.25235H2.313V18.4404H10.594C10.8013 18.4404 11 18.5227 11.1466 18.6693C11.2932 18.8158 11.3755 19.0146 11.3755 19.2219C11.3755 19.4291 11.2932 19.6279 11.1466 19.7745C11 19.921 10.8013 20.0034 10.594 20.0034H1.531C1.42835 20.0034 1.32671 19.9831 1.23189 19.9438C1.13707 19.9045 1.05093 19.8469 0.978398 19.7743C0.905862 19.7016 0.848353 19.6154 0.809163 19.5205C0.769973 19.4257 0.749869 19.324 0.750001 19.2214V5.47135C0.750001 5.26422 0.832283 5.06557 0.978749 4.9191C1.12521 4.77264 1.32386 4.69035 1.531 4.69035H3.912C4.06427 3.39811 4.68555 2.20671 5.65797 1.34214C6.63039 0.47758 7.88632 0 9.1875 0C10.4887 0 11.7446 0.47758 12.717 1.34214C13.6895 2.20671 14.3107 3.39811 14.463 4.69035H16.844C17.0511 4.69035 17.2498 4.77264 17.3963 4.9191C17.5427 5.06557 17.625 5.26422 17.625 5.47135ZM12.885 4.69035C12.7403 3.81345 12.289 3.01642 11.6113 2.44138C10.9336 1.86634 10.0738 1.55068 9.185 1.55068C8.29624 1.55068 7.43637 1.86634 6.75871 2.44138C6.08105 3.01642 5.62965 3.81345 5.485 4.69035H12.885Z"
                                        fill="white"></path>
                                </svg>
                                Mua Ngay</button>
                        </div>

                        <button class="btn-store">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.2388 16.0571C11.9163 16.0571 11.5938 15.9896 11.3313 15.8621L7.39375 13.8896C7.16875 13.7771 6.72625 13.7846 6.50875 13.9121L4.73875 14.9246C3.97375 15.3596 3.18625 15.4196 2.59375 15.0671C1.99375 14.7221 1.65625 14.0171 1.65625 13.1321V5.84213C1.65625 5.15963 2.10625 4.38713 2.69875 4.04963L5.94625 2.18963C6.49375 1.87463 7.32625 1.85213 7.88875 2.13713L11.8263 4.10963C12.0513 4.22213 12.4863 4.20713 12.7113 4.08713L14.4738 3.08213C15.2388 2.64713 16.0263 2.58713 16.6188 2.93963C17.2188 3.28463 17.5563 3.98963 17.5563 4.87463V12.1721C17.5563 12.8546 17.1063 13.6271 16.5138 13.9646L13.2663 15.8246C12.9813 15.9746 12.6062 16.0571 12.2388 16.0571ZM6.35876 12.7495C6.35876 12.7571 6.35892 12.7647 6.35923 12.7723C6.21119 12.8137 6.07119 12.8709 5.94625 12.9446L4.18375 13.9496C3.77125 14.1821 3.39625 14.2421 3.15625 14.0996C2.91625 13.9646 2.78125 13.6121 2.78125 13.1396V5.84213C2.78125 5.56463 3.01375 5.15963 3.25375 5.02463L6.35876 3.24624V12.7495ZM7.48376 12.7451C7.6279 12.7777 7.765 12.8245 7.88875 12.8846L11.7362 14.812V5.26004C11.5893 5.22689 11.4498 5.17848 11.3238 5.11463L7.48376 3.19098V12.7451ZM13.2663 5.06213C13.1435 5.13276 13.0064 5.18869 12.8612 5.22974V14.7487L15.9587 12.9746C16.1987 12.8396 16.4313 12.4346 16.4313 12.1646V4.86713C16.4313 4.39463 16.2962 4.04213 16.0487 3.90713C15.8087 3.77213 15.4338 3.82463 15.0288 4.05713L13.2663 5.06213Z"
                                    fill="#57534E"></path>
                            </svg>
                            Tìm Cửa Hàng Có Sản Phẩm</button>
                    </div>

                    <div class="line-bg"></div>

                    <div class="info-delivery flex text-center">
                        <div class="delivery-item">
                            <div class="delivery-icon"><svg width="43" height="29" viewBox="0 0 43 29" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M33.492 18.1899L34.4921 9.47797H31.859L28.2271 24.6968L41.144 23.9601L42.2023 20.0104L33.492 18.1899Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M31.6702 20.0103H29.0371L27.626 25.2766H39.475C40.2021 25.2766 40.9495 24.6871 41.1443 23.96H31.9284C31.2013 23.96 30.7698 23.3706 30.9646 22.6435L31.6702 20.0103Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M42.0187 18.3103L39.7929 16.719L37.2584 15.068L39.7709 12.1111L39.7629 10.4481C39.7602 9.87535 39.3464 9.47797 38.7527 9.47797H34.4921L31.6699 20.0104H42.2024L42.3554 19.4393C42.4792 18.9768 42.3514 18.5482 42.0187 18.3103Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M27.1707 8.16132H32.8702C33.2337 8.16132 33.4495 8.45607 33.3521 8.81959L29.2952 23.96L10.2995 25.0747C9.93596 25.0747 9.79705 24.8983 9.89449 24.5347L13.526 10.8864L27.1707 8.16132Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M11.5217 23.9601C11.1581 23.9601 10.9424 23.6653 11.0399 23.3018L12.0015 19.7131C12.1018 19.3386 12.5051 19.1246 12.8653 19.2681C14.0612 19.7446 15.3629 20.0105 16.7292 20.0105C22.5461 20.0105 27.2617 15.295 27.2617 9.47808C27.2617 9.03121 27.2247 8.59374 27.1707 8.16153H14.4385C14.0749 8.16153 13.7013 8.4562 13.6038 8.81981L9.37057 24.6185C9.27313 24.982 9.48891 25.2767 9.85243 25.2767H28.9424L29.2951 23.9602H11.5217V23.9601Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M37.7327 27.0063C38.9843 25.911 39.3191 24.2464 38.4806 23.2883C37.6421 22.3302 35.9478 22.4414 34.6963 23.5367C33.4447 24.632 33.1099 26.2966 33.9484 27.2547C34.7869 28.2128 36.4812 28.1016 37.7327 27.0063Z"
                                        fill="black"></path>
                                    <path
                                        d="M36.9731 26.1389C37.5989 25.5913 37.7663 24.759 37.347 24.2799C36.9278 23.8008 36.0806 23.8564 35.4548 24.4041C34.8291 24.9517 34.6617 25.7841 35.0809 26.2631C35.5002 26.7422 36.3474 26.6866 36.9731 26.1389Z"
                                        fill="white"></path>
                                    <path
                                        d="M17.3177 27.0169C18.5692 25.9216 18.9041 24.257 18.0656 23.2989C17.2271 22.3408 15.5328 22.452 14.2812 23.5473C13.0297 24.6426 12.6949 26.3072 13.5334 27.2653C14.3719 28.2234 16.0662 28.1122 17.3177 27.0169Z"
                                        fill="black"></path>
                                    <path
                                        d="M16.5581 26.1495C17.1838 25.6019 17.3512 24.7695 16.932 24.2905C16.5127 23.8114 15.6656 23.867 15.0398 24.4146C14.414 24.9623 14.2466 25.7946 14.6659 26.2737C15.0851 26.7527 15.9323 26.6972 16.5581 26.1495Z"
                                        fill="white"></path>
                                    <path
                                        d="M39.7706 12.1111H36.4194L35.2534 13.4276L35.709 16.2931L39.7926 15.4024L39.7706 12.1111Z"
                                        fill="#ECEAEC"></path>
                                    <path
                                        d="M36.8542 15.4024C36.1271 15.4024 35.6956 14.813 35.8904 14.0859L36.4196 12.1111C35.6924 12.1111 34.9451 12.7005 34.7503 13.4276L34.2211 15.4024C34.0263 16.1296 34.4578 16.719 35.1849 16.719H39.7928L39.7865 15.4024H36.8542Z"
                                        fill="#ECEAEC"></path>
                                    <path
                                        d="M16.7296 18.6938C21.8193 18.6938 25.9454 14.5677 25.9454 9.4779C25.9454 4.38811 21.8193 0.262024 16.7296 0.262024C11.6398 0.262024 7.51367 4.38811 7.51367 9.4779C7.51367 14.5677 11.6398 18.6938 16.7296 18.6938Z"
                                        fill="#ECEAEC"></path>
                                    <path
                                        d="M16.7294 17.3773C21.0921 17.3773 24.6287 13.8407 24.6287 9.478C24.6287 5.11532 21.0921 1.57867 16.7294 1.57867C12.3667 1.57867 8.83008 5.11532 8.83008 9.478C8.83008 13.8407 12.3667 17.3773 16.7294 17.3773Z"
                                        fill="white"></path>
                                    <path
                                        d="M16.7296 4.21159C16.3657 4.21159 16.0713 3.91683 16.0713 3.55331V2.89503C16.0713 2.53151 16.3657 2.23676 16.7296 2.23676C17.0934 2.23676 17.3878 2.53151 17.3878 2.89503V3.55331C17.3878 3.91683 17.0934 4.21159 16.7296 4.21159Z"
                                        fill="#C8C5C9"></path>
                                    <path
                                        d="M16.7296 16.7189C16.3657 16.7189 16.0713 16.4242 16.0713 16.0607V15.4024C16.0713 15.0389 16.3657 14.7441 16.7296 14.7441C17.0934 14.7441 17.3878 15.0389 17.3878 15.4024V16.0607C17.3878 16.4242 17.0934 16.7189 16.7296 16.7189Z"
                                        fill="#C8C5C9"></path>
                                    <path
                                        d="M23.3126 10.1362H22.6544C22.2905 10.1362 21.9961 9.84141 21.9961 9.47789C21.9961 9.11437 22.2905 8.81961 22.6544 8.81961H23.3126C23.6765 8.81961 23.9709 9.11437 23.9709 9.47789C23.9709 9.84141 23.6766 10.1362 23.3126 10.1362Z"
                                        fill="#C8C5C9"></path>
                                    <path
                                        d="M10.8048 10.1362H10.1466C9.78271 10.1362 9.48828 9.84141 9.48828 9.47789C9.48828 9.11437 9.78271 8.81961 10.1466 8.81961H10.8048C11.1687 8.81961 11.4631 9.11437 11.4631 9.47789C11.4631 9.84141 11.1687 10.1362 10.8048 10.1362Z"
                                        fill="#C8C5C9"></path>
                                    <path
                                        d="M8.17171 18.6938H1.58894C1.22509 18.6938 0.930664 18.399 0.930664 18.0355C0.930664 17.672 1.22509 17.3772 1.58894 17.3772H8.17171C8.53556 17.3772 8.82999 17.672 8.82999 18.0355C8.82999 18.399 8.53556 18.6938 8.17171 18.6938Z"
                                        fill="black"></path>
                                    <path
                                        d="M7.51321 21.3269H3.56355C3.1997 21.3269 2.90527 21.0321 2.90527 20.6686C2.90527 20.3051 3.1997 20.0103 3.56355 20.0103H7.51321C7.87706 20.0103 8.17149 20.3051 8.17149 20.6686C8.17149 21.0321 7.87706 21.3269 7.51321 21.3269Z"
                                        fill="black"></path>
                                    <path
                                        d="M6.8552 23.96H5.53865C5.1748 23.96 4.88037 23.6652 4.88037 23.3017C4.88037 22.9382 5.1748 22.6434 5.53865 22.6434H6.8552C7.21905 22.6434 7.51348 22.9382 7.51348 23.3017C7.51348 23.6652 7.21905 23.96 6.8552 23.96Z"
                                        fill="black"></path>
                                    <path
                                        d="M14.754 12.111C14.5856 12.111 14.4171 12.0467 14.2886 11.9181C14.0314 11.661 14.0314 11.2445 14.2886 10.9873L20.5422 4.73371C20.7993 4.47654 21.2158 4.47654 21.473 4.73371C21.7302 4.99088 21.7302 5.40738 21.473 5.66455L15.2194 11.9181C15.0908 12.0467 14.9224 12.111 14.754 12.111Z"
                                        fill="#E5646E"></path>
                                    <path
                                        d="M16.7296 10.7944C17.4568 10.7944 18.0462 10.205 18.0462 9.47787C18.0462 8.75076 17.4568 8.16132 16.7296 8.16132C16.0025 8.16132 15.4131 8.75076 15.4131 9.47787C15.4131 10.205 16.0025 10.7944 16.7296 10.7944Z"
                                        fill="#5D5360"></path>
                                </svg></div>
                            <div class="delivery-item-content">Miễn phí vận chuyển với đơn hàng từ 500K</div>
                        </div>
                        <div class="delivery-item">
                            <div class="delivery-icon"><svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.0717 29.6837C19.8878 29.5485 19.6744 29.4603 19.4497 29.4265C19.225 29.3927 18.9955 29.4144 18.7808 29.4897C16.3632 30.3238 13.7458 30.3504 11.3122 29.5654C8.87865 28.7805 6.75675 27.2253 5.25743 25.1278C3.75811 23.0303 2.96019 20.5006 2.98057 17.9095C3.00095 15.3184 3.83856 12.802 5.37068 10.729V12.6667C5.37068 13.0527 5.52179 13.4229 5.79079 13.6959C6.05978 13.9688 6.42461 14.1222 6.80502 14.1222C7.18543 14.1222 7.55026 13.9688 7.81925 13.6959C8.08824 13.4229 8.23936 13.0527 8.23936 12.6667V7.32993C8.23936 6.94392 8.08824 6.57371 7.81925 6.30075C7.55026 6.0278 7.18543 5.87445 6.80502 5.87445H1.54576C1.16535 5.87445 0.800519 6.0278 0.531527 6.30075C0.262536 6.57371 0.111418 6.94392 0.111418 7.32993C0.111418 7.71595 0.262536 8.08616 0.531527 8.35912C0.800519 8.63207 1.16535 8.78542 1.54576 8.78542H3.2249C1.57589 10.9407 0.535892 13.5107 0.216343 16.2199C-0.103205 18.9292 0.309742 21.6756 1.41093 24.1649C2.51213 26.6542 4.26006 28.7926 6.46742 30.3508C8.67478 31.909 11.2584 32.8285 13.9414 33.0105C14.2748 33.0325 14.6071 33.0435 14.9382 33.0435C16.5523 33.0453 18.1557 32.7775 19.684 32.2507C19.9359 32.167 20.1601 32.014 20.3315 31.8087C20.5029 31.6035 20.615 31.3541 20.6551 31.0881C20.6953 30.8222 20.662 30.5502 20.5591 30.3023C20.4561 30.0543 20.2874 29.8403 20.0717 29.6837Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M32.4033 24.258H30.6642C32.6858 21.7043 33.8141 18.5806 33.882 15.3494C33.9498 12.1183 32.9535 8.95173 31.0408 6.31876C29.128 3.6858 26.4005 1.7265 23.2622 0.731127C20.124 -0.264247 16.742 -0.242757 13.6172 0.792416C13.3563 0.876193 13.1241 1.02919 12.9466 1.23443C12.769 1.43966 12.653 1.68909 12.6114 1.95503C12.5698 2.22097 12.6042 2.493 12.7109 2.74091C12.8176 2.98883 12.9923 3.20293 13.2156 3.35944C13.4061 3.49476 13.6271 3.58306 13.8599 3.61684C14.0926 3.65062 14.3303 3.6289 14.5526 3.55351C17.0566 2.71935 19.7675 2.6928 22.288 3.47775C24.8085 4.2627 27.0062 5.81789 28.5591 7.91545C30.1119 10.013 30.9384 12.5427 30.9173 15.1339C30.8962 17.725 30.0286 20.2414 28.4418 22.3145V20.3767C28.4418 19.9907 28.2853 19.6205 28.0067 19.3475C27.7281 19.0745 27.3502 18.9212 26.9562 18.9212C26.5622 18.9212 26.1843 19.0745 25.9057 19.3475C25.6271 19.6205 25.4706 19.9907 25.4706 20.3767V25.7135C25.4706 26.0996 25.6271 26.4698 25.9057 26.7427C26.1843 27.0157 26.5622 27.169 26.9562 27.169H32.4033C32.7973 27.169 33.1752 27.0157 33.4538 26.7427C33.7324 26.4698 33.8889 26.0996 33.8889 25.7135C33.8889 25.3275 33.7324 24.9573 33.4538 24.6843C33.1752 24.4114 32.7973 24.258 32.4033 24.258Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M22.3239 10.0966H10.208C9.90379 10.0966 9.65723 10.3432 9.65723 10.6474V21.6619C9.65723 21.966 9.90379 22.2126 10.208 22.2126H22.3239C22.628 22.2126 22.8746 21.966 22.8746 21.6619V10.6474C22.8746 10.3432 22.628 10.0966 22.3239 10.0966Z"
                                        fill="#7D7D7D"></path>
                                    <path
                                        d="M14.0625 10.0965V14.5023C14.0625 14.6484 14.1205 14.7885 14.2238 14.8917C14.3271 14.995 14.4672 15.053 14.6132 15.053H17.9176C18.0636 15.053 18.2037 14.995 18.307 14.8917C18.4103 14.7885 18.4683 14.6484 18.4683 14.5023V10.0965H14.0625Z"
                                        fill="#ECEAEC"></path>
                                    <path
                                        d="M15.1641 19.4587H11.309C11.163 19.4587 11.0229 19.4007 10.9196 19.2974C10.8163 19.1942 10.7583 19.0541 10.7583 18.908C10.7583 18.762 10.8163 18.6219 10.9196 18.5186C11.0229 18.4153 11.163 18.3573 11.309 18.3573H15.1641C15.3102 18.3573 15.4502 18.4153 15.5535 18.5186C15.6568 18.6219 15.7148 18.762 15.7148 18.908C15.7148 19.0541 15.6568 19.1942 15.5535 19.2974C15.4502 19.4007 15.3102 19.4587 15.1641 19.4587Z"
                                        fill="#ECEAEC"></path>
                                    <path
                                        d="M13.5119 21.111H11.309C11.163 21.111 11.0229 21.0529 10.9196 20.9497C10.8163 20.8464 10.7583 20.7063 10.7583 20.5602C10.7583 20.4142 10.8163 20.2741 10.9196 20.1708C11.0229 20.0675 11.163 20.0095 11.309 20.0095H13.5119C13.658 20.0095 13.7981 20.0675 13.9013 20.1708C14.0046 20.2741 14.0626 20.4142 14.0626 20.5602C14.0626 20.7063 14.0046 20.8464 13.9013 20.9497C13.7981 21.0529 13.658 21.111 13.5119 21.111Z"
                                        fill="#ECEAEC"></path>
                                </svg></div>
                            <div class="delivery-item-content">1 đổi 1 trong vòng 7 ngày</div>
                        </div>
                        <div class="delivery-item">
                            <div class="delivery-icon"><svg width="37" height="36" viewBox="0 0 37 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.1143 11.9251C13.7558 11.9251 13.376 11.9251 12.9961 11.9671H12.933C6.01431 12.6211 0.333008 19.1884 0.333008 26.5078C0.333008 35.0088 8.22916 36 14.1143 36C19.9573 36 26.7705 35.1142 27.7197 28.1321C28.711 19.9476 22.2142 11.9251 14.1143 11.9251Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M21.4333 3.50162L19.3239 9.90005H8.90393L6.79456 3.50162C6.66766 3.18521 6.73111 2.82651 6.9209 2.5524C7.13184 2.27829 7.44824 2.10938 7.7858 2.10938H11.1396C11.5615 0.885773 12.7428 0 14.1139 0C15.485 0 16.6452 0.885773 17.0882 2.10938H20.442C20.7796 2.10938 21.096 2.27829 21.3069 2.5524C21.4967 2.82651 21.5602 3.18521 21.4333 3.50162Z"
                                        fill="#C92027"></path>
                                    <path
                                        d="M17.2568 26.8242C17.2568 28.1953 16.3922 29.3343 15.1686 29.7773V30.7266C15.1686 31.3174 14.7047 31.7812 14.1139 31.7812C13.5231 31.7812 13.0592 31.3174 13.0592 30.7266V29.7985C11.8356 29.3555 10.9287 28.1953 10.9287 26.8242C10.9287 26.2337 11.4138 25.7695 11.9834 25.7695C12.5742 25.7695 13.0381 26.2337 13.0381 26.8242C13.0381 27.3939 13.5231 27.8789 14.0928 27.8789H14.1139C14.7047 27.8578 15.1475 27.3939 15.1475 26.8242C15.1475 26.2337 14.7047 25.7907 14.1139 25.7695H14.0928C12.3633 25.7695 10.9287 24.335 10.9287 22.6055C10.9287 21.2132 11.8359 20.0531 13.0592 19.6312V18.0703C13.0592 17.4795 13.5231 17.0156 14.1139 17.0156C14.7047 17.0156 15.1686 17.4795 15.1686 18.0703V19.6312C16.3922 20.0742 17.2568 21.2344 17.2568 22.6055C17.2568 23.1751 16.7929 23.6602 16.2021 23.6602C15.6325 23.6602 15.1475 23.1751 15.1475 22.6055C15.1475 22.015 14.7047 21.5719 14.1139 21.5508H14.0928C13.5231 21.5508 13.0381 22.015 13.0381 22.6055C13.0381 23.1751 13.5231 23.6602 14.0928 23.6602H14.1139C15.8649 23.6813 17.2568 25.0735 17.2568 26.8242Z"
                                        fill="white"></path>
                                    <path
                                        d="M36.333 21.2344C36.333 22.3945 35.3838 23.3438 34.2236 23.3438L28.8799 25.4531L23.6064 23.3438C22.4463 23.3438 21.4971 22.3945 21.4971 21.2344C21.4971 20.0742 22.4463 19.125 23.6064 19.125H34.2236C35.3838 19.125 36.333 20.0742 36.333 21.2344Z"
                                        fill="#FFDA2D"></path>
                                    <path
                                        d="M36.333 25.4531C36.333 26.6133 35.3838 27.5625 34.2236 27.5625L28.8799 29.6719L23.6064 27.5625C22.4463 27.5625 21.4971 26.6133 21.4971 25.4531C21.4971 24.293 22.4463 23.3438 23.6064 23.3438H34.2236C35.3838 23.3438 36.333 24.293 36.333 25.4531Z"
                                        fill="#FDBF00"></path>
                                    <path
                                        d="M36.333 29.6719C36.333 30.832 35.3838 31.7812 34.2236 31.7812L28.8799 33.8906L23.6064 31.7812C22.4463 31.7812 21.4971 30.832 21.4971 29.6719C21.4971 28.5117 22.4463 27.5625 23.6064 27.5625H34.2236C35.3838 27.5625 36.333 28.5117 36.333 29.6719Z"
                                        fill="#FFDA2D"></path>
                                    <path
                                        d="M36.333 33.8906C36.333 35.0508 35.3838 36 34.2236 36H23.6064C22.4463 36 21.4971 35.0508 21.4971 33.8906C21.4971 32.7305 22.4463 31.7812 23.6064 31.7812H34.2236C35.3838 31.7812 36.333 32.7305 36.333 33.8906Z"
                                        fill="#FDBF00"></path>
                                    <path
                                        d="M21.4971 10.6172C21.4971 11.7773 20.5479 12.7266 19.3877 12.7266H8.84082C7.68066 12.7266 6.73145 11.7773 6.73145 10.6172C6.73145 9.45703 7.68066 8.50781 8.84082 8.50781H19.3877C20.5479 8.50781 21.4971 9.45703 21.4971 10.6172Z"
                                        fill="#AD202B"></path>
                                </svg></div>
                            <div class="delivery-item-content">Kiếm tra hàng trước khi thanh toán</div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        </div>
    </section>

    <section class="description my-5">
        <div class="container">
            <p class="title-pd my-3">Chi Tiết Sản Phẩm</p>

            <?= '<pre> ' . $info . '</pre>' ?>
        </div>
    </section>

    <section class="comment my-5">
        <div class="container">
            <p class="title-pd">Phản Hồi Từ Khách Hàng</p>

            <div class="comment-ct text-center">
                <img src="assets/img/EmtyReview.86be870e.svg">
                <p>Sản phẩm này chưa có phản hồi</p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                type: "fraction"
            }
        });
    </script>
</main>