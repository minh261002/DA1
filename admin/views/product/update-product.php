<section id="sidebar">
    <a href="index.php" class="brand">
        <img src="../uploads/logo_owenstore.svg" alt="">
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="index.php?page=home">
                <i class='bx bxs-home'></i>
                <span class="text">Trang Chủ</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=category">
                <i class='bx bxs-category-alt'></i>
                <span class="text">Danh Mục</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=product">
                <i class='bx bxs-window-alt'></i>
                <span class="text">Sản Phẩm</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=bill">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">Đơn Hàng</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=respon">
                <i class='bx bxs-chat'></i>
                <span class="text">Phản Hồi</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=user">
                <i class='bx bxs-group'></i>
                <span class="text">Tài Khoản</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=voucher">
                <i class='bx bxs-offer'></i>
                <span class="text">Mã Giảm Giá</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=voucher">
                <i class='bx bxs-slideshow'></i>
                <span class="text">Slider Shows</span>
            </a>
        </li>
        <li>
            <a href="index.php?page=voucher">
                <i class='bx bxs-analyse'></i>
                <span class="text">Thống Kê</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="index.php?page=logout" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Đăng Xuất</span>
            </a>
        </li>
    </ul>
</section>>
<section id="content">
    <main class="my-5">
        <div class="container">
            <h3 class="text-center"> Chỉnh Sửa Sản Phẩm</h3>

            <form action="index.php?page=update-product&id=<?= $one[0]['id'] ?>" method="post"
                style="width:500px; margin:0 auto;" class="mt-3 mb-5" enctype="multipart/form-data">


                <div class="form-group mb-3">
                    <label for="id_category">Tên Danh Mục</label>

                    <select class="form-control" name="id_category" id="id_category">
                        <option value="0"><?= $list_category[0]['name'] ?></option>
                        <?php
                    if (isset($list_category)) {
                        foreach ($list_category  as $dm) {
                            echo '<option value="' . $dm['id'] . '">' . $dm['name'] . '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $one[0]['name'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="img">Hình Ảnh</label>
                    <input type="file" name="img" id="img" class="form-control d-block" value="<?= $one[0]['img'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="gallery">Hình Ảnh Chi Tiết</label>
                    <?php foreach (json_decode($one[0]['gallery']) as $key => $gallery) { ?>
                    <input type="file" name="<?php echo ($key) ?>" value="<?php echo $gallery  ?>"
                        id="<?php echo $key ?>" class="form-control d-block">
                    <?php } ?>
                </div>

                <div class="form-group mb-3">
                    <label for="info"> Mô Tả</label>
                    <input type="text" name="info" id="info" class="form-control" value="<?= $one[0]['info'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="price">Giá</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= $one[0]['price'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sale">Sale</label>
                    <input type="text" name="sale" id="sale" class="form-control" value="<?= $one[0]['sale'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="view">Lượt Xem</label>
                    <input type="text" name="view" id="view" class="form-control" value="<?= $one[0]['view'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="hot">Hot</label>

                    <select class="form-control" name="hot" id="hot">
                        <option value="0">Bình Thường</option>
                        <option value="1">Sản Phẩm Hot</option>
                    </select>
                </div>



                <div class="form-group mb-3">
                    <input type="submit" name="capnhat" value="Chỉnh Sửa Sản Phẩm" class="btn btn-dark px-5">
                </div>
            </form>
        </div>
    </main>



</section>