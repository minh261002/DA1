<main>
    <section class="search py-5">
        <div class="wrap-content">
            <div class="search-head">
                <p>Kết quả tìm kiếm:</p>
                <span style="font-weight: bold;">
                    <?php echo $_POST['search'] ?>
                </span>
                <span>
                    <?php
                    $key = $_POST['search'];

                    $products = search($key);
                    echo count($products);
                    ?>
                    sản phẩm
                </span>
            </div>
            <hr>
            <div class="sort-container">
                <p>Sắp xếp theo</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <p>Sắp xếp</p>
                        <i class="fa-solid fa-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Giá từ thấp đến cao</a></li>
                        <li><a class="dropdown-item" href="#">Giá từ cao đến thấp</a></li>
                        <li><a class="dropdown-item" href="#">Tên (từ A đến Z)</a></li>
                        <li><a class="dropdown-item" href="#">Tên (từ Z đến A)</a></li>
                    </ul>
                </div>
            </div>

            <div class="search-list">
                <?php
                if (isset($_POST['search'])) {
                    $key = $_POST['search'];
                    $products = search($key);
                    $count = count($products);
                    if (count($products) > 0) {
                        foreach ($products as $key => $pro) {
                            ?>

                <div class="product-item">
                    <a href="index.php?page=details&id=<?php echo $pro['id'] ?>">
                        <img class="product-image" src="Uploads/<?php echo $pro['img'] ?>" alt="" width="100%">
                    </a>
                    <?php if ($pro['hot'] == 1) { ?>
                    <div class="selling">
                        <span>Bán chạy</span>
                    </div>
                    <?php } ?>
                    <div class="product-content">
                        <a href="index.php?page=details&id=<?php echo $pro['id'] ?>" class="name-product">
                            <?php echo $pro['name'] ?>
                        </a>
                        <div class="product-price">
                            <span class="product-origin">
                                <?php echo number_format($pro['price'] - ($pro['sale'] * $pro['price'] / 100), 0, ',', '.') ?>đ
                            </span>
                            <span class="product-discount">
                                <?php echo number_format($pro['price'], 0, ',', '.') ?>đ
                            </span>
                        </div>
                    </div>

                    <div class="product-status">
                        <span
                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                            <span
                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                                <img alt="" aria-hidden="true"
                                    src="https://tokyolife.vn/_next/static/media/tagsale.0850a4f6.svg"
                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                            </span>
                            <img alt=""
                                srcset="/_next/static/media/tagsale.0850a4f6.svg 1x, /_next/static/media/tagsale.0850a4f6.svg 2x"
                                src="/_next/static/media/tagsale.0850a4f6.svg" decoding="async" data-nimg="intrinsic"
                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                        </span>
                        <span class="percent-discount">
                            <?php echo $pro['sale'] ?>%
                        </span>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>
            </div>

        </div>

    </section>
</main>