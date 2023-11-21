<?php
$html_flash_sale = '';

foreach ($flashSaleProducts as $pd) {
    extract($pd);

    if (isset($sale) && $sale > 0) {
        $discountAmount = $sale * $price / 100;
        $discountedPrice = $price - $discountAmount;


        $currentDateTime = date('Y-m-d H:i:s');

        $createdDate = strtotime($created_at);

        $currentDate = strtotime($currentDateTime);
        $newProduct = strtotime('-3 days', $currentDate);

        if ($createdDate >= $newProduct) {
            $new = '
                <div class="new-pd">
                    <img class="new-icon" src="uploads/new-icon.png" />
                </div>
            ';
        } else {
            $new = '';
        }

        $boxPrice = '
                <div class="product-price">
                    <span class="product-origin">' . number_format($discountedPrice, 0, ',', '.') . ' đ</span>
                    <span class="product-discount">' . number_format($price, 0, ',', '.') . ' đ</span>
                </div>
            ';

        $boxSale = '
                <div class="product-status">
                    <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                            <img alt="" aria-hidden="true" src="https://tokyolife.vn/_next/static/media/tagsale.0850a4f6.svg" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                        </span>
                        <img alt="" srcset="/_next/static/media/tagsale.0850a4f6.svg 1x, /_next/static/media/tagsale.0850a4f6.svg 2x" src="/_next/static/media/tagsale.0850a4f6.svg" decoding="async" data-nimg="intrinsic" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                    </span>
                    <span class="percent-discount"> -' . $sale . '%</span>
                </div>';
    } else {
        $boxPrice = '
                <div class="product-price">
                    <span class="product-origin">' . number_format($price, 0, ',', '.') . ' đ</span>
                </div>
            ';

        $boxSale = '';
    }

    if ($hot == 1) {
        $hot = '
                <div class="selling">
                    <span>Bán chạy</span>
                </div>
            ';
    } else {
        $hot = '';
    }

    $link = "index.php?page=details&id=" . $id;

    $html_flash_sale .= '
            <div class="flashsale-item">
                <a href="' . $link . '">
                    <img class="product-image" src="uploads/' . $img . '" width="100%">
                </a>
                ' . $hot . '
                ' . $new . '
                <div class="product-content">
                    <a href="' . $link . '" class="name-product">' . $name . '</a>
                    ' . $boxPrice . '
                </div>

                ' . $boxSale . '
            </div>
        ';
}

$html_new_product = show_product($new_product);

$html_hot_product = show_product($hot_product);

?>

<main>
    <section class="slide-show">
        <div class="owl-carousel owl-theme wrap-content slide-home ">

            <div class="item" style="width:100%">
                <img src="assets/img/1698802318426883.webp">
            </div>
            <div class="item" style="width:100%">
                <img src="assets/img/bn2.webp">
            </div>
            <div class="item" style="width:100%">
                <img src="assets/img/bn3.webp">
            </div>
            <div class="item" style="width:100%">
                <img src="assets/img/bn4.webp">
            </div>
            <div class="item" style="width:100%">
                <img src="assets/img/bn5.webp" width="100%">
            </div>
            <div class="item" style="width:100%">
                <img src="assets/img/bn6.webp" width="100%">
            </div>
        </div>
    </section>


    <section class="category pb-60">
        <div class="wrap-content">
            <h3 class="category-heading">BẠN ĐANG TÌM GÌ?</h3>
            <div class="category-list">
                <?= $html_category = show_category_home() ?>
            </div>
        </div>
    </section>

    <section class="flash-sale pb-60">
        <div class="wrap-content">
            <div class="flash-sale_bar">
                <svg width="181" height="26" viewBox="0 0 181 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.3233 11.8984H24.5864L29.618 1.8358C29.8415 1.38826 29.5164 0.861816 29.0159 0.861816H22.1054C21.612 0.861816 21.1767 1.18353 21.0315 1.6548L17.1378 14.3099C16.9999 14.7569 17.3343 15.2094 17.8017 15.2094H22.1584L18.9909 25.549C18.8943 25.8023 19.2221 26.0004 19.4014 25.7973L29.7736 12.8967C30.1163 12.5093 29.8409 11.8984 29.3233 11.8984Z"
                        fill="url(#paint0_linear_3752_268777)"></path>
                    <path d="M0 1.74544H14.3708V5.49557H4.66801V11.436H12.1035V15.1198H4.66801V24.9099H0V1.74544Z"
                        fill="url(#paint1_linear_3752_268777)"></path>
                    <path
                        d="M47.2555 20.4961H37.9862L36.4524 24.9099H31.551L39.9201 1.71226H45.355L53.7241 24.9099H48.7893L47.2555 20.4961ZM42.6209 7.08854L39.2532 16.7791H45.9885L42.6209 7.08854Z"
                        fill="url(#paint2_linear_3752_268777)"></path>
                    <path
                        d="M73.1236 18.2062C73.1236 19.1133 72.9458 19.9872 72.5902 20.8279C72.2345 21.6687 71.701 22.4098 70.9897 23.0515C70.3006 23.6931 69.4448 24.2019 68.4223 24.5781C67.3998 24.9542 66.2217 25.1422 64.8879 25.1422C63.6876 25.1422 62.5651 24.9874 61.5203 24.6776C60.4756 24.3679 59.5642 23.9254 58.7862 23.3501C58.0082 22.7528 57.3969 22.0337 56.9523 21.193C56.5078 20.3301 56.2744 19.3456 56.2521 18.2393H61.2536C61.3202 19.1686 61.6537 19.9208 62.2539 20.4961C62.854 21.0492 63.6987 21.3257 64.7879 21.3257C65.8993 21.3257 66.7551 21.0713 67.3553 20.5624C67.9777 20.0314 68.2889 19.3456 68.2889 18.5048C68.2889 17.8854 68.1111 17.3765 67.7554 16.9782C67.422 16.5579 66.9663 16.2149 66.3884 15.9495C65.8327 15.6618 65.1991 15.4185 64.4878 15.2193C63.7765 15.0202 63.043 14.81 62.2872 14.5888C61.5314 14.3454 60.7979 14.0689 60.0866 13.7591C59.3752 13.4494 58.7306 13.0511 58.1527 12.5644C57.597 12.0776 57.1524 11.4803 56.819 10.7723C56.4855 10.0422 56.3188 9.15719 56.3188 8.11733C56.3188 7.07748 56.5189 6.14824 56.919 5.32963C57.3191 4.4889 57.8859 3.78091 58.6195 3.20567C59.353 2.63043 60.2199 2.18794 61.2202 1.87819C62.2205 1.56845 63.3208 1.41357 64.5212 1.41357C66.9219 1.41357 68.8669 1.98881 70.3562 3.13929C71.8677 4.28977 72.7013 5.91593 72.8569 8.01777H67.7221C67.6776 7.24341 67.3553 6.6018 66.7551 6.09293C66.1772 5.56194 65.3881 5.28538 64.3878 5.26326C63.4542 5.21901 62.6873 5.42919 62.0871 5.89381C61.487 6.3363 61.1869 7.03323 61.1869 7.98459C61.1869 8.75895 61.4758 9.36738 62.0538 9.80987C62.654 10.2302 63.3986 10.5953 64.2878 10.905C65.1769 11.1927 66.1327 11.4803 67.1553 11.7679C68.1778 12.0555 69.1336 12.4538 70.0228 12.9626C70.9119 13.4494 71.6454 14.1131 72.2234 14.9538C72.8236 15.7725 73.1236 16.8566 73.1236 18.2062Z"
                        fill="url(#paint3_linear_3752_268777)"></path>
                    <path
                        d="M91.8082 15.0534H81.8387V24.9099H77.1706V1.74544H81.8387V11.2701H91.8082V1.74544H96.4762V24.9099H91.8082V15.0534Z"
                        fill="url(#paint4_linear_3752_268777)"></path>
                    <path
                        d="M125.287 18.2062C125.287 19.1133 125.109 19.9872 124.754 20.8279C124.398 21.6687 123.864 22.4098 123.153 23.0515C122.464 23.6931 121.608 24.2019 120.586 24.5781C119.563 24.9542 118.385 25.1422 117.051 25.1422C115.851 25.1422 114.729 24.9874 113.684 24.6776C112.639 24.3679 111.728 23.9254 110.95 23.3501C110.172 22.7528 109.56 22.0337 109.116 21.193C108.671 20.3301 108.438 19.3456 108.416 18.2393H113.417C113.484 19.1686 113.817 19.9208 114.417 20.4961C115.017 21.0492 115.862 21.3257 116.951 21.3257C118.063 21.3257 118.919 21.0713 119.519 20.5624C120.141 20.0314 120.452 19.3456 120.452 18.5048C120.452 17.8854 120.275 17.3765 119.919 16.9782C119.585 16.5579 119.13 16.2149 118.552 15.9495C117.996 15.6618 117.363 15.4185 116.651 15.2193C115.94 15.0202 115.206 14.81 114.451 14.5888C113.695 14.3454 112.961 14.0689 112.25 13.7591C111.539 13.4494 110.894 13.0511 110.316 12.5644C109.76 12.0776 109.316 11.4803 108.982 10.7723C108.649 10.0422 108.482 9.15719 108.482 8.11733C108.482 7.07748 108.682 6.14824 109.082 5.32963C109.483 4.4889 110.049 3.78091 110.783 3.20567C111.516 2.63043 112.383 2.18794 113.384 1.87819C114.384 1.56845 115.484 1.41357 116.685 1.41357C119.085 1.41357 121.03 1.98881 122.52 3.13929C124.031 4.28977 124.865 5.91593 125.02 8.01777H119.886C119.841 7.24341 119.519 6.6018 118.919 6.09293C118.341 5.56194 117.552 5.28538 116.551 5.26326C115.618 5.21901 114.851 5.42919 114.251 5.89381C113.65 6.3363 113.35 7.03323 113.35 7.98459C113.35 8.75895 113.639 9.36738 114.217 9.80987C114.817 10.2302 115.562 10.5953 116.451 10.905C117.34 11.1927 118.296 11.4803 119.319 11.7679C120.341 12.0555 121.297 12.4538 122.186 12.9626C123.075 13.4494 123.809 14.1131 124.387 14.9538C124.987 15.7725 125.287 16.8566 125.287 18.2062Z"
                        fill="url(#paint5_linear_3752_268777)"></path>
                    <path
                        d="M142.595 20.4961H133.326L131.792 24.9099H126.891L135.26 1.71226H140.695L149.064 24.9099H144.129L142.595 20.4961ZM137.961 7.08854L134.593 16.7791H141.328L137.961 7.08854Z"
                        fill="url(#paint6_linear_3752_268777)"></path>
                    <path d="M156.86 1.74544V21.2262H164.529V24.9099H152.192V1.74544H156.86Z"
                        fill="url(#paint7_linear_3752_268777)"></path>
                    <path
                        d="M181 5.49557H172.164V11.3033H180V14.987H172.164V21.1266H181V24.9099H167.496V1.71226H181V5.49557Z"
                        fill="url(#paint8_linear_3752_268777)"></path>
                    <defs>
                        <linearGradient id="paint0_linear_3752_268777" x1="22.9492" y1="43.0768" x2="31.4679"
                            y2="42.0945" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint1_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint2_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint3_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint4_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint5_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint6_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint7_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                        <linearGradient id="paint8_linear_3752_268777" x1="82.4985" y1="41.4507" x2="113.379"
                            y2="-11.5599" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#7A171B"></stop>
                            <stop offset="1" stop-color="#D10007"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <span class="flash-end"></span>

                <div class="count_down">
                    <div class="hours">
                        <p>0</p>
                    </div>
                    <div class="colon">:</div>
                    <div class="minutes">
                        <p>3</p>
                    </div>
                    <div class="colon">:</div>
                    <div class="seconds">
                        <p>0</p>
                    </div>
                </div>
            </div>

            <div class="owl-carousel owl-theme owl-loaded owl-drag list-flashsale slide-flashsale">
                <?= $html_flash_sale ?>
            </div>
            <script src="assets/js/clock.js"></script>
        </div>
    </section>



    <section class="product pb-60">
        <div class="wrap-content">
            <div class="heading">Sản Phẩm Mới Ra Mắt</div>
            <div class="cate-bar">
                <button class="cate-active cate-button">Nữ</button>
                <button class="cate-button">Nam</button>
                <button class="cate-button">Trẻ Em</button>
            </div>
            <div class=" product-block">
                <div class="image-cate">
                    <img src="Uploads/bnn1.webp">
                </div>
                <div class=" owl-carousel owl-theme owl-loaded owl-drag slide-product list-product ">
                    <?= $html_new_product ?>
                </div>
            </div>
            <div class="showall-cate">
                <a href="index.php?page=page_new_product" class="showall-btn">Xem tất cả sản phẩm </a>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabButtons = document.querySelectorAll('.cate-button');
                const tabContents = document.querySelectorAll('.tab-content');

                tabButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        const category = button.getAttribute('data-category');

                        tabButtons.forEach(function (btn) {
                            btn.classList.remove('cate-active');
                        });
                        button.classList.add('cate-active');

                        tabContents.forEach(function (content) {
                            content.classList.remove('atv');
                        });

                        document.getElementById(category + '-product').classList.add('atv');
                    });
                });
            });
        </script>
    </section>

    <!-- outstanding -->
    <section class="outstanding pb-60">
        <div class="wrap-content">
            <h3 class="heading">SẢN PHẨM NỔI BẬT</h3>
            <div class="list-outstanding">
                <?= $html_hot_product ?>
            </div>
        </div>
        <div class="showall-cate">
            <a href="index.php?page=option_product&act=hot" class="showall-btn">Xem tất cả sản phẩm </a>
        </div>
    </section>




    <section class="news pb-60">
        <div class="wrap-content">
            <h3 class="heading">TIN TỨC</h3>
            <div class="list-news">
                <div class="news-left">
                    <a href="#">
                        <img src="https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16988279259578500.jpg&w=1920&q=75"
                            alt="">
                    </a>
                    <a href="#" class="news-title_left">Điểm đặc biệt tại "Ngôi nhà Thiên thần" của TokyoLife</a>
                    <p class="news-desc">
                        Trong hành trình 7 năm phát triển, TokyoLife luôn hoạt động trên tiêu chí
                        “Phụng sự xã hội xuất
                        sắc”, mang lại những giá trị tốt đẹp đến cộng đồng, tiên phong trong việc xây dựng mô hình việc
                        làm bền vững cho người khuyết tật và tích cực trong các hoạt động bảo vệ môi trường tại Việt
                        Nam.
                    </p>
                </div>
                <div class="news-right">
                    <div class="news-item">
                        <a href="#">
                            <img src="https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16988279259578500.jpg&w=1920&q=75"
                                alt="">
                        </a>
                        <div class="news-item_content">
                            <a href="#" class="news-title">Điểm đặc biệt tại "Ngôi nhà Thiên thần" của TokyoLife</a>
                            <p class="news-desc">
                                Trong hành trình 7 năm phát triển, TokyoLife luôn hoạt động trên tiêu chí
                                “Phụng sự xã hội xuất
                                sắc”, mang lại những giá trị tốt đẹp đến cộng đồng, tiên phong trong việc xây dựng mô
                                hình
                                việc
                                làm bền vững cho người khuyết tật và tích cực trong các hoạt động bảo vệ môi trường tại
                                Việt
                                Nam.
                            </p>
                        </div>
                    </div>
                    <div class="news-item">
                        <a href="#">
                            <img src="https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16988279259578500.jpg&w=1920&q=75"
                                alt="">
                        </a>
                        <div class="news-item_content">
                            <a href="#" class="news-title">Điểm đặc biệt tại "Ngôi nhà Thiên thần" của TokyoLife</a>
                            <p class="news-desc">
                                Trong hành trình 7 năm phát triển, TokyoLife luôn hoạt động trên tiêu chí
                                “Phụng sự xã hội xuất
                                sắc”, mang lại những giá trị tốt đẹp đến cộng đồng, tiên phong trong việc xây dựng mô
                                hình
                                việc
                                làm bền vững cho người khuyết tật và tích cực trong các hoạt động bảo vệ môi trường tại
                                Việt
                                Nam.
                            </p>
                        </div>
                    </div>
                    <div class="news-item">
                        <a href="#">
                            <img src="https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16988279259578500.jpg&w=1920&q=75"
                                alt="">
                        </a>
                        <div class="news-item_content">
                            <a href="#" class="news-title">Điểm đặc biệt tại "Ngôi nhà Thiên thần" của TokyoLife</a>
                            <p class="news-desc">
                                Trong hành trình 7 năm phát triển, TokyoLife luôn hoạt động trên tiêu chí
                                “Phụng sự xã hội xuất
                                sắc”, mang lại những giá trị tốt đẹp đến cộng đồng, tiên phong trong việc xây dựng mô
                                hình
                                việc
                                làm bền vững cho người khuyết tật và tích cực trong các hoạt động bảo vệ môi trường tại
                                Việt
                                Nam.
                            </p>
                        </div>
                    </div>
                    <div class="news-item">
                        <a href="#">
                            <img src="https://tokyolife.vn/_next/image?url=https%3A%2F%2Fpm2ec.s3.ap-southeast-1.amazonaws.com%2Fcms%2F16988279259578500.jpg&w=1920&q=75"
                                alt="">
                        </a>
                        <div class="news-item_content">
                            <a href="#" class="news-title">Điểm đặc biệt tại "Ngôi nhà Thiên thần" của TokyoLife</a>
                            <p class="news-desc">
                                Trong hành trình 7 năm phát triển, TokyoLife luôn hoạt động trên tiêu chí
                                “Phụng sự xã hội xuất
                                sắc”, mang lại những giá trị tốt đẹp đến cộng đồng, tiên phong trong việc xây dựng mô
                                hình
                                việc
                                làm bền vững cho người khuyết tật và tích cực trong các hoạt động bảo vệ môi trường tại
                                Việt
                                Nam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="showall-cate">
                <a href="#" class="showall-btn">Xem tất cả bài viết</a>
            </div>
        </div>
    </section>


    <section class="detail_home pb-60 ">
        <div class="wrap-content">
            <div class="detail_home_content">
                <h3 class="heading">HỆ THỐNG CỬA HÀNG</h3>
                <p class="detail_home_title">
                    <span>TOKYOLIFE</span>
                    CÓ HỆ THỐNG CỬA HÀNG TRÊN TOÀN QUỐC
                </p>
                <p class="detail_home_desc">
                    Trải dài trên khắp Việt Nam, TokyoLife mang đến cuộc sống hiện đại, thông minh và chất lượng hơn tới
                    hàng triệu người tiêu dùng Việt.
                </p>
                <div class="showall-cate">
                    <a href="#" class="showall-btn">XEM DANH SÁCH CỬA HÀNG</a>
                </div>
            </div>
        </div>
    </section>


    <section class="certify pb-60">
        <div class="certify-content">
            <div class="heading">CHỨNG NHẬN CHÍNH HÃNG</div>
            <div class="certify-container_content">
                <img src="https://tokyolife.vn/chung-nhan-chinh-hang.png" alt="" class="certify-image">
                <div class="certify-content_right">
                    <h3 class="certify-title">
                        <span>
                            <svg width="42" height="49" viewBox="0 0 42 49" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M41.3197 41.4248C41.3197 41.4248 35.9921 32.2684 35.0365 30.6262C36.1238 30.2945 37.282 30.0016 37.7633 29.1707C38.5653 27.7861 37.1377 25.5148 37.5125 24.0307C37.8987 22.5033 40.1783 21.1816 40.1783 19.6291C40.1783 18.1164 37.8215 16.3493 37.4351 14.8309C37.0576 13.3471 38.481 11.0733 37.6764 9.69037C36.8717 8.30734 34.1917 8.42097 33.0884 7.35938C31.9533 6.26691 31.9568 3.59399 30.5877 2.86188C29.2129 2.12704 26.9787 3.61215 25.4523 3.26036C23.9434 2.9126 22.5952 0.640625 21.0191 0.640625C19.4195 0.640625 16.8754 3.21782 16.4764 3.31056C14.9508 3.66521 12.7137 2.18372 11.3404 2.92168C9.97259 3.65626 9.98102 6.32944 8.84795 7.42372C7.74654 8.48726 5.06635 8.37856 4.26419 9.76314C3.46216 11.1475 4.88981 13.4183 4.51506 14.9031C4.13927 16.3917 1.78026 17.9001 1.78026 19.6217C1.78026 21.1744 4.06559 22.4919 4.45409 24.0185C4.8317 25.5023 3.40832 27.7759 4.21295 29.1593C4.651 29.9123 5.64488 30.2214 6.63747 30.5186C6.7533 30.5532 6.97239 30.6828 6.824 30.899C6.14494 32.0711 0.679365 41.5039 0.679365 41.5039C0.244558 42.2542 0.597644 42.8973 1.46376 42.9338L5.70326 43.1106C6.56937 43.147 7.65587 43.7764 8.11817 44.5097L10.3804 48.0994C10.8427 48.8327 11.5763 48.819 12.0109 48.0688C12.0109 48.0688 18.3407 37.1408 18.3433 37.1377C18.4703 36.9893 18.5979 37.0198 18.659 37.0717C19.3516 37.6614 20.317 38.2496 21.1228 38.2496C21.913 38.2496 22.6448 37.6959 23.3686 37.0783C23.4275 37.0281 23.5708 36.9252 23.6756 37.1387C23.6773 37.1421 30 48.0103 30 48.0103C30.4359 48.7596 31.1696 48.7723 31.6304 48.0381L33.8863 44.4441C34.3473 43.7103 35.4327 43.0784 36.2988 43.0407L40.5379 42.856C41.4036 42.8179 41.7555 42.1739 41.3197 41.4248ZM28.0254 31.5948C23.338 34.3218 17.7116 34.0296 13.4141 31.3189C7.11703 27.2854 5.04508 18.9416 8.83057 12.4079C12.6593 5.7989 21.0756 3.46687 27.7442 7.09878C27.7792 7.11785 27.8138 7.13757 27.8486 7.15702C27.898 7.18439 27.9473 7.21215 27.9965 7.24017C30.0537 8.42629 31.8377 10.1477 33.1152 12.3434C37.0194 19.0544 34.7362 27.6906 28.0254 31.5948Z"
                                    fill="#C92027"></path>
                                <path
                                    d="M26.9534 9.21614C26.934 9.20485 26.9142 9.19434 26.8948 9.18319C23.3325 7.12149 18.7922 6.97076 14.987 9.18461C9.34023 12.4698 7.41875 19.7363 10.7039 25.383C11.7064 27.1061 13.0801 28.4816 14.6649 29.4688C14.7997 29.5541 14.936 29.6381 15.0753 29.7187C20.7282 32.9937 27.9909 31.0591 31.2657 25.4065C34.5404 19.7536 32.6063 12.4911 26.9534 9.21614ZM28.3676 18.4572L26.3882 20.3865C25.7752 20.9839 25.392 22.1633 25.5369 23.0071L26.0042 25.7313C26.1489 26.5751 25.6474 26.9395 24.8896 26.5411L22.4431 25.2548C21.6853 24.8565 20.4453 24.8565 19.6875 25.2548L17.2411 26.5411C16.4833 26.9395 15.9817 26.5751 16.1264 25.7313L16.5937 23.0071C16.7384 22.1633 16.3553 20.9839 15.7422 20.3865L13.763 18.4572C13.1498 17.8597 13.3416 17.2701 14.1887 17.1468L16.9239 16.7494C17.7711 16.6263 18.7743 15.8974 19.1532 15.1297L20.3764 12.6513C20.7553 11.8836 21.3754 11.8836 21.7542 12.6513L22.9775 15.1297C23.3564 15.8974 24.3595 16.6263 25.2068 16.7494L27.942 17.1468C28.789 17.2701 28.9806 17.8597 28.3676 18.4572Z"
                                    fill="#C92027"></path>
                            </svg>
                        </span>
                        CHỨNG NHẬN NHẬP KHẨU SẢN PHẨM CHÍNH HÃNG TỪ CÁC THƯƠNG HIỆU NỔI TIẾNG NHẬT BẢN ...
                    </h3>
                    <p class="certify-desc">TokyoLife cam kết luôn mang tới cho khách hàng các sản phẩm tốt chính
                        hãng
                        đến từ các các thương hiệu Nhật Bản. Tất cả sản phẩm MADE IN JAPAN đều có giấy chứng nhận
                        nhập
                        khẩu chính hãng từ các nhà phân phối nhằm đưa tới sự trải nghiệm sản phẩm tốt nhất dành cho
                        khách hàng thân yêu của TokyoLife.</p>
                    <a href="#" class="showall-btn">Xem thêm</a>
                </div>
            </div>
        </div>
    </section>


    <section class="brand pb-60">
        <div class="wrap-content">
            <div class="list-brand">
                <img src="https://tokyolife.vn/_next/static/media/brand1.5f106205.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand2.c15e4de3.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand3.7f9e40c0.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand4.d3105e81.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand5.6f426419.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand6.1fb71a7b.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand7.4e71346a.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand9.a15a019b.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand10.b7e30b70.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand11.c7f3d99a.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand12.a41bad20.svg" alt="">
                <img src="https://tokyolife.vn/_next/static/media/brand13.5751f55f.svg" alt="">
            </div>
        </div>
    </section>


    <section class="service pb-60">
        <div class="wrap-content">
            <div class="list-service">
                <div class="service-item">
                    <svg width="62" height="61" viewBox="0 0 62 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.998535" y="0.832031" width="60.0027" height="60" rx="30" fill="#C92027"></rect>
                        <path
                            d="M47.2145 26.0904C46.3244 25.2952 45.1899 24.8545 44.0145 24.8473H36.2445V19.0358C36.2445 16.5931 35.5565 14.831 34.1965 13.7971C32.0455 12.1583 29.0805 13.0927 28.9545 13.1383C28.7751 13.1969 28.6182 13.3131 28.5066 13.47C28.395 13.627 28.3344 13.8166 28.3335 14.0116V20.514C28.3193 21.5868 28.046 22.6389 27.5383 23.574C27.0307 24.5092 26.305 25.2978 25.4275 25.8677C24.4874 26.5551 23.4528 27.0922 22.3585 27.4609L22.1445 27.5148C21.9834 27.2305 21.7532 26.9949 21.4769 26.8313C21.2006 26.6677 20.8878 26.582 20.5695 26.5825H14.8245C14.3409 26.5836 13.8774 26.7829 13.5352 27.137C13.1931 27.491 13.0001 27.971 12.9985 28.472V45.9646C12.9996 46.4659 13.1923 46.9464 13.5345 47.3009C13.8767 47.6555 14.3406 47.8551 14.8245 47.8562H20.5845C20.8517 47.8551 21.1155 47.7935 21.3573 47.6758C21.5991 47.558 21.8132 47.387 21.9845 47.1746C22.4518 47.6944 23.0169 48.1097 23.645 48.3947C24.2731 48.6798 24.9508 48.8286 25.6365 48.832H41.0045C44.3985 48.832 46.5645 46.9943 46.9485 43.7767L48.9375 30.9945C49.075 30.0928 48.989 29.1697 48.6876 28.3119C48.3862 27.454 47.8793 26.6896 47.2145 26.0904ZM20.6285 45.9646C20.6287 45.9717 20.6274 45.9788 20.6249 45.9854C20.6223 45.992 20.6185 45.998 20.6136 46.003C20.6088 46.008 20.603 46.012 20.5966 46.0147C20.5902 46.0173 20.5834 46.0186 20.5765 46.0185H14.8245C14.8177 46.0186 14.8108 46.0173 14.8045 46.0147C14.7981 46.012 14.7923 46.008 14.7875 46.003C14.7826 45.998 14.7788 45.992 14.7762 45.9854C14.7737 45.9788 14.7724 45.9717 14.7725 45.9646V28.472C14.7724 28.4649 14.7737 28.4578 14.7762 28.4512C14.7788 28.4446 14.7826 28.4386 14.7875 28.4336C14.7923 28.4286 14.7981 28.4246 14.8045 28.4219C14.8108 28.4193 14.8177 28.418 14.8245 28.4181H20.5845C20.5914 28.418 20.5982 28.4193 20.6046 28.4219C20.611 28.4246 20.6168 28.4286 20.6216 28.4336C20.6265 28.4386 20.6303 28.4446 20.6329 28.4512C20.6354 28.4578 20.6367 28.4649 20.6365 28.472V45.9646H20.6285ZM47.1705 30.7003L45.1895 43.5063C45.1902 43.5195 45.1878 43.5327 45.1825 43.5447C44.9085 45.8351 43.4985 46.9984 40.9985 46.9984H25.6335C24.8658 46.9929 24.1246 46.7062 23.5413 46.189C22.9581 45.6718 22.5702 44.9574 22.4465 44.1724C22.4377 44.1181 22.4253 44.0645 22.4095 44.0119V29.337L22.7935 29.2448C22.8085 29.2448 22.8155 29.2376 22.8305 29.2376C24.1137 28.8237 25.3262 28.2035 26.4235 27.3998C27.5415 26.6591 28.464 25.6419 29.108 24.4399C29.752 23.2378 30.0972 21.8887 30.1125 20.514V14.7471C31.1544 14.512 32.2437 14.7043 33.1515 15.2837C34.0235 15.9498 34.4675 17.2136 34.4675 19.0368V25.761C34.4683 26.0044 34.562 26.2377 34.7282 26.4098C34.8944 26.582 35.1195 26.679 35.3545 26.6799H44.0125C44.7659 26.6861 45.4923 26.9712 46.0605 27.4837C46.4952 27.8771 46.8254 28.3793 47.0197 28.9423C47.214 29.5054 47.2659 30.1106 47.1705 30.7003Z"
                            fill="white"></path>
                    </svg>
                    <p class="service-title">HÀNG HOÁ CHẤT LƯỢNG</p>
                    <p class="servce-desc">Tận hưởng các mặt hàng chất lượng hàng đầu với giá cả hợp lý</p>
                </div>
                <div class="service-item">
                    <svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.832031" width="60" height="60" rx="30" fill="#C92027"></rect>
                        <g clip-path="url(#clip0_7810_244239)">
                            <path
                                d="M42.2486 26.5224V25.1387C42.2887 21.9335 41.11 18.8326 38.9508 16.4634C37.8737 15.3044 36.5667 14.3828 35.1132 13.7577C33.6597 13.1325 32.0918 12.8174 30.5097 12.8326H29.3678C27.7856 12.8174 26.2177 13.1325 24.7643 13.7577C23.3108 14.3828 22.0037 15.3044 20.9266 16.4634C18.7675 18.8326 17.5887 21.9335 17.6288 25.1387V26.5233C16.3745 26.609 15.1993 27.1671 14.3403 28.0852C13.4813 29.0032 13.0023 30.2128 13 31.47V33.6335C13.002 34.9468 13.5246 36.2058 14.4533 37.1345C15.3819 38.0631 16.6409 38.5857 17.9543 38.5877H20.7451C20.9856 38.587 21.216 38.4911 21.3861 38.321C21.5562 38.151 21.652 37.9205 21.6528 37.68V27.4122C21.652 27.1717 21.5562 26.9412 21.3861 26.7712C21.216 26.6011 20.9856 26.5052 20.7451 26.5045H19.4433V25.1387C19.4433 19.1554 23.7099 14.648 29.3602 14.648H30.5022C36.16 14.648 40.4191 19.1554 40.4191 25.1387V26.5073H39.1173C38.8768 26.5081 38.6464 26.6039 38.4763 26.774C38.3062 26.9441 38.2104 27.1745 38.2096 27.415V37.6678C38.2104 37.9083 38.3062 38.1387 38.4763 38.3088C38.6464 38.4789 38.8768 38.5747 39.1173 38.5755H40.3881C40.0175 43.3106 36.7573 44.4073 35.2448 44.6566C35.0359 44.0169 34.6302 43.4595 34.0855 43.0642C33.5409 42.6689 32.8852 42.4558 32.2122 42.4556H29.9425C29.0969 42.4556 28.286 42.7915 27.6881 43.3894C27.0901 43.9873 26.7542 44.7982 26.7542 45.6438C26.7542 46.4894 27.0901 47.3003 27.6881 47.8982C28.286 48.4961 29.0969 48.832 29.9425 48.832H32.2188C32.9166 48.8305 33.5948 48.6004 34.1494 48.1769C34.7041 47.7534 35.1047 47.1599 35.2899 46.4871C36.3738 46.3359 37.4188 45.979 38.3686 45.4354C40.01 44.4751 41.9533 42.5195 42.211 38.5689C43.4703 38.4904 44.6524 37.9349 45.5165 37.0156C46.3807 36.0962 46.862 34.882 46.8624 33.6203V31.4569C46.8635 30.2023 46.3873 28.9944 45.5305 28.078C44.6737 27.1616 43.5004 26.6055 42.2486 26.5224ZM19.8524 36.7639H17.9712C17.1384 36.7629 16.3401 36.4311 15.7518 35.8416C15.1635 35.2521 14.8335 34.4531 14.8342 33.6203V31.4569C14.8347 30.6245 15.1656 29.8265 15.7541 29.2379C16.3427 28.6494 17.1407 28.3185 17.9731 28.318H19.8543L19.8524 36.7639ZM32.2188 47.0166H29.9425C29.5794 47.0166 29.2312 46.8724 28.9744 46.6156C28.7176 46.3589 28.5734 46.0107 28.5734 45.6476C28.5734 45.2845 28.7176 44.9362 28.9744 44.6795C29.2312 44.4227 29.5794 44.2785 29.9425 44.2785H32.2188C32.5819 44.2785 32.9301 44.4227 33.1869 44.6795C33.4436 44.9362 33.5879 45.2845 33.5879 45.6476C33.5879 46.0107 33.4436 46.3589 33.1869 46.6156C32.9301 46.8724 32.5819 47.0166 32.2188 47.0166ZM45.0545 33.6203C45.054 34.4526 44.7232 35.2507 44.1346 35.8393C43.5461 36.4278 42.748 36.7587 41.9157 36.7592H40.0344V28.3227H41.9157C42.748 28.3232 43.5461 28.6541 44.1346 29.2426C44.7232 29.8312 45.054 30.6292 45.0545 31.4616V33.6203Z"
                                fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_7810_244239">
                                <rect width="36" height="36" fill="white" transform="translate(12 12.832)"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="service-title">HỖ TRỢ 24/7</p>
                    <p class="servce-desc">Nhận hỗ trợ ngay lập tức bất cứ khi nào bạn cần</p>
                </div>
                <div class="service-item">
                    <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.832031" width="60" height="60" rx="30" fill="#C92027"></rect>
                        <g clip-path="url(#clip0_7810_244246)">
                            <path
                                d="M46.5303 24.5177C45.9148 23.8677 45.1702 23.3535 44.3443 23.0082C43.5185 22.6628 42.6295 22.4938 41.7345 22.5121H36.7939V19.7372C36.7932 19.4983 36.6983 19.2693 36.5299 19.0998C36.3614 18.9304 36.133 18.8342 35.8941 18.832H13.4052C13.1653 18.8327 12.9355 18.9283 12.7659 19.0979C12.5963 19.2675 12.5007 19.4974 12.5 19.7372V39.6366C12.5007 39.8764 12.5963 40.1062 12.7659 40.2758C12.9355 40.4454 13.1653 40.541 13.4052 40.5417H17.0097C17.1538 41.3671 17.5845 42.1151 18.2259 42.6542C18.8673 43.1932 19.6782 43.4888 20.5161 43.4888C21.3539 43.4888 22.1649 43.1932 22.8063 42.6542C23.4477 42.1151 23.8783 41.3671 24.0225 40.5417H37.8736C38.0178 41.3671 38.4484 42.1151 39.0898 42.6542C39.7312 43.1932 40.5422 43.4888 41.38 43.4888C42.2178 43.4888 43.0288 43.1932 43.6702 42.6542C44.3116 42.1151 44.7423 41.3671 44.8864 40.5417H47.5857C47.8256 40.541 48.0554 40.4454 48.225 40.2758C48.3946 40.1062 48.4902 39.8764 48.4909 39.6366V30.2861C48.5891 28.1847 47.8887 26.124 46.5303 24.5177ZM14.3094 20.6415H34.9862V38.7386H23.8632C23.6167 38.048 23.1626 37.4505 22.5632 37.0281C21.9638 36.6056 21.2485 36.3788 20.5152 36.3788C19.7819 36.3788 19.0665 36.6056 18.4671 37.0281C17.8677 37.4505 17.4137 38.048 17.1671 38.7386H14.3094V20.6415ZM20.5179 41.68C20.1718 41.6803 19.8334 41.578 19.5455 41.386C19.2576 41.194 19.0331 40.9209 18.9005 40.6012C18.7679 40.2816 18.733 39.9298 18.8004 39.5903C18.8677 39.2509 19.0343 38.939 19.2789 38.6943C19.5236 38.4495 19.8353 38.2828 20.1747 38.2153C20.5141 38.1477 20.866 38.1824 21.1857 38.3149C21.5054 38.4474 21.7786 38.6717 21.9708 38.9595C22.1629 39.2473 22.2654 39.5856 22.2652 39.9317C22.2645 40.3955 22.0799 40.84 21.7518 41.1678C21.4237 41.4955 20.9789 41.6797 20.5152 41.68H20.5179ZM41.3827 41.68C41.0366 41.6805 40.6981 41.5783 40.4101 41.3864C40.1221 41.1945 39.8975 40.9215 39.7647 40.6018C39.6319 40.2822 39.5969 39.9304 39.6642 39.5909C39.7315 39.2514 39.8979 38.9395 40.1425 38.6946C40.3871 38.4497 40.6989 38.2829 41.0383 38.2153C41.3778 38.1477 41.7296 38.1823 42.0494 38.3148C42.3691 38.4472 42.6424 38.6716 42.8346 38.9594C43.0268 39.2472 43.1293 39.5856 43.1292 39.9317C43.1285 40.3948 42.9443 40.8388 42.617 41.1665C42.2896 41.4941 41.8458 41.6788 41.3827 41.68ZM46.6761 38.7314H44.7281C44.4815 38.0408 44.0274 37.4433 43.4281 37.0209C42.8287 36.5984 42.1133 36.3716 41.38 36.3716C40.6467 36.3716 39.9313 36.5984 39.332 37.0209C38.7326 37.4433 38.2785 38.0408 38.032 38.7314H36.8029V24.3215H41.7426C44.7892 24.3215 46.6815 26.6061 46.6815 30.2861V38.7314H46.6761Z"
                                fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_7810_244246">
                                <rect width="36" height="36" fill="white" transform="translate(12.5 12.832)"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="service-title">VẬN CHUYỂN NHANH CHÓNG</p>
                    <p class="servce-desc">Tùy chọn giao hàng nhanh chóng và đáng tin cậy</p>
                </div>
                <div class="service-item">
                    <svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.832031" width="60" height="60" rx="30" fill="#C92027"></rect>
                        <g clip-path="url(#clip0_7810_244254)">
                            <path
                                d="M31.3402 29.9135H28.6677C28.1335 29.9135 27.6212 29.7013 27.2434 29.3236C26.8657 28.9459 26.6535 28.4336 26.6535 27.8994C26.6535 27.3652 26.8657 26.8529 27.2434 26.4751C27.6212 26.0974 28.1335 25.8852 28.6677 25.8852H33.3849C33.5056 25.8852 33.6251 25.8614 33.7365 25.8152C33.848 25.7691 33.9493 25.7014 34.0346 25.6161C34.12 25.5307 34.1876 25.4295 34.2338 25.318C34.28 25.2065 34.3038 25.087 34.3038 24.9663C34.3038 24.8457 34.28 24.7262 34.2338 24.6147C34.1876 24.5032 34.12 24.4019 34.0346 24.3166C33.9493 24.2313 33.848 24.1636 33.7365 24.1174C33.6251 24.0713 33.5056 24.0475 33.3849 24.0475H30.9263V22.1708C30.9263 22.0501 30.9025 21.9307 30.8564 21.8192C30.8102 21.7077 30.7425 21.6064 30.6572 21.5211C30.5719 21.4358 30.4706 21.3681 30.3591 21.3219C30.2476 21.2757 30.1281 21.252 30.0075 21.252C29.8868 21.252 29.7673 21.2757 29.6558 21.3219C29.5443 21.3681 29.4431 21.4358 29.3577 21.5211C29.2724 21.6064 29.2047 21.7077 29.1585 21.8192C29.1124 21.9307 29.0886 22.0501 29.0886 22.1708V24.0515H28.6677C27.646 24.0515 26.6661 24.4574 25.9436 25.1798C25.2212 25.9023 24.8153 26.8822 24.8153 27.9039C24.8153 28.9256 25.2212 29.9054 25.9436 30.6279C26.6661 31.3504 27.646 31.7562 28.6677 31.7562H31.3402C31.8744 31.7562 32.3868 31.9684 32.7645 32.3462C33.1422 32.7239 33.3544 33.2362 33.3544 33.7704C33.3544 34.3046 33.1422 34.8169 32.7645 35.1946C32.3868 35.5724 31.8744 35.7846 31.3402 35.7846H26.541C26.2973 35.7846 26.0636 35.8814 25.8913 36.0537C25.719 36.226 25.6222 36.4597 25.6222 36.7034C25.6222 36.9471 25.719 37.1808 25.8913 37.3532C26.0636 37.5255 26.2973 37.6223 26.541 37.6223H29.0836V39.537C29.0836 39.7807 29.1804 40.0144 29.3527 40.1867C29.525 40.359 29.7588 40.4558 30.0025 40.4558C30.2462 40.4558 30.4799 40.359 30.6522 40.1867C30.8245 40.0144 30.9213 39.7807 30.9213 39.537V37.6223H31.3882C32.4099 37.6162 33.3874 37.2045 34.1055 36.4777C34.8237 35.7509 35.2237 34.7686 35.2176 33.7469C35.2115 32.7252 34.7998 31.7478 34.073 31.0296C33.3462 30.3115 32.364 29.9114 31.3422 29.9175L31.3402 29.9135Z"
                                fill="white"></path>
                            <path
                                d="M42.7279 18.1041C39.3523 14.7285 34.7739 12.832 30 12.832C25.2261 12.832 20.6477 14.7285 17.2721 18.1041C13.8964 21.4798 12 26.0581 12 30.832C12 35.6059 13.8964 40.1843 17.2721 43.56C20.6477 46.9356 25.2261 48.832 30 48.832C34.7739 48.832 39.3523 46.9356 42.7279 43.56C46.1036 40.1843 48 35.6059 48 30.832C48 26.0581 46.1036 21.4798 42.7279 18.1041ZM30 46.9914C26.804 46.9914 23.6797 46.0437 21.0223 44.2681C18.3649 42.4924 16.2938 39.9687 15.0707 37.016C13.8476 34.0632 13.5276 30.8141 14.1511 27.6795C14.7746 24.5449 16.3137 21.6656 18.5736 19.4056C20.8335 17.1457 23.7129 15.6067 26.8475 14.9832C29.9821 14.3597 33.2312 14.6797 36.1839 15.9027C39.1367 17.1258 41.6604 19.197 43.436 21.8544C45.2116 24.5118 46.1594 27.636 46.1594 30.832C46.1533 35.1159 44.4488 39.2226 41.4197 42.2517C38.3905 45.2809 34.2839 46.9853 30 46.9914Z"
                                fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_7810_244254">
                                <rect width="36" height="36" fill="white" transform="translate(12 12.832)"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="service-title">THANH TOÁN AN TOÀN</p>
                    <p class="servce-desc">Nhiều phương thức thanh toán an toàn</p>
                </div>
            </div>
        </div>
    </section>


    <section class="about_us">
        <div class="about-content">
            <img src="uploads/logo_owenstore_ft.svg" alt="">
            <div class="about-desc">
                <p>TokyoLife là cửa hàng bán lẻ đồ gia dụng, hóa mỹ phẩm, phụ kiện chính hãng các thương hiệu Nhật Bản:
                    Inomata, Ebisu, ORP Tokyo, Momotani, Naturie, Rohto (Hada Labo, Melano CC...), Kose (Dòng Softymo),
                    Shiseido (Dòng Senka, Anessa, Tsubaki, Uno, D.Program), KAO (Biore, Laurier), Rosette, Unicharm,
                    Rocket, Naris, Meishoku, Chuchu Baby, Deonatulle, Kumano, Taiyo Brush, Okamura, Dentultima, KAI,
                    Pelican… Nước hoa TokyoLife sản xuất tại Pháp. Hóa phẩm lành tính TokyoLife sản xuất tại Nhật Bản.
                    Mỹ phẩm TokyoLife sản xuất tại Nhật Bản, Hàn Quốc. Sản phẩm Thời trang và Phụ kiện hiệu: TokyoLife,
                    TokyoNow, TokyoBasic, TokyoSmart, TokyoSecret. Sản phẩm tiêu dùng hiệu: TokyoLife, TokyoHome,
                    TokyoSword... và nhiều thương hiệu khác sản xuất tại Việt Nam, Trung Quốc, Thái Lan…</p>
                <span class="quote-down"><svg width="48" height="46" viewBox="0 0 48 46" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_dd_4_712)">
                            <path
                                d="M18.8148 21.5707V37.7315H4V25.0722C4 18.2039 4.82155 13.221 6.47811 10.137C8.64646 6.04291 12.0943 2.93196 16.7946 0.831055L20.1616 6.21798C17.3064 7.38964 15.2054 9.14039 13.8586 11.4433C12.5118 13.7597 11.7576 17.14 11.596 21.5573H18.8148V21.5707ZM42.6532 21.5707V37.7315H27.8384V25.0722C27.8384 18.2039 28.6599 13.221 30.3165 10.137C32.4848 6.04291 35.9327 2.93196 40.633 0.831055L44 6.21798C41.1448 7.38964 39.0438 9.14039 37.697 11.4433C36.3502 13.7597 35.596 17.14 35.4343 21.5573H42.6532V21.5707Z"
                                fill="white"></path>
                        </g>
                        <defs>
                            <filter id="filter0_dd_4_712" x="0" y="0.831055" width="48" height="44.9004"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha">
                                </feColorMatrix>
                                <feOffset dy="4"></feOffset>
                                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="out"></feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                                </feColorMatrix>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4_712">
                                </feBlend>
                                <feColorMatrix in="SourceAlpha" type="matrix"
                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha">
                                </feColorMatrix>
                                <feOffset dy="4"></feOffset>
                                <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                                <feComposite in2="hardAlpha" operator="out"></feComposite>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0">
                                </feColorMatrix>
                                <feBlend mode="normal" in2="effect1_dropShadow_4_712" result="effect2_dropShadow_4_712">
                                </feBlend>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_4_712" result="shape">
                                </feBlend>
                            </filter>
                        </defs>
                    </svg></span>
                <span class="quote-up"><svg width="40" height="38" viewBox="0 0 40 38" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.1852 17.09V0.929199H40V13.5885C40 20.4568 39.1784 25.4397 37.5219 28.5237C35.3535 32.6313 31.9192 35.7288 27.2054 37.8297L23.8384 32.4427C26.6936 31.2711 28.7946 29.5203 30.1414 27.2174C31.4882 24.901 32.2424 21.5207 32.404 17.1034H25.1852V17.09ZM1.3468 17.09V0.929199H16.1616V13.5885C16.1616 20.4568 15.3401 25.4397 13.6835 28.5237C11.5151 32.6313 8.08081 35.7288 3.367 37.8297L0 32.4427C2.85522 31.2711 4.95624 29.5203 6.30304 27.2174C7.64984 24.901 8.40404 21.5207 8.56565 17.1034H1.3468V17.09Z"
                            fill="white"></path>
                    </svg></span>
            </div>
        </div>

    </section>

    <div class="overlay">
        <div class="banner_ads_img">
            <img src="uploads/ads_1.png" alt="">

            <div class="close-ads">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <script>
            let closeAds = document.querySelector('.close-ads');
            let overlay = document.querySelector('.overlay');

            closeAds.addEventListener('click', () => {
                overlay.style.display = 'none';
            })
        </script>
    </div>

    <script>
        $('.slide-home').owlCarousel({
            center: true,
            loop: true,
            nav: true,
            responsive: {
                1024: {
                    items: 1
                },
                768: {
                    items: 1
                },
                480: {
                    items: 1
                },
                374.98: {
                    items: 1
                }
            },
            autoplay: true,
            autoplayTimeout: 4000,
        });

        // flash sale
        $('.slide-flashsale').owlCarousel({
            loop: true,
            nav: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                1024: {
                    items: 4,
                },
                768: {
                    items: 3,
                },
                480: {
                    items: 2,
                },
                374.98: {
                    items: 2,
                }
            },
        })


        // prouct
        $('.list-product').owlCarousel({
            nav: true,
            loop: true,
            margin: 30,
            responsiveClass: true,
            responsive: {
                1024: {
                    items: 4,
                },
                768: {
                    items: 3,
                },
                480: {
                    items: 2,
                },
                374.98: {
                    items: 2,
                }
            },
        })
    </script>
</main>