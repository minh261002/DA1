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
            <a href="index.php?page=statistical">
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
</section>


<!-- NAVBAR -->
<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#index.php?page=home" class="nav-link">Trang Chủ</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm Kiếm...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="../uploads/<?= $_SESSION['admin']['avatar'] ?>">
        </a>
    </nav>
    <main>
        <h3 class="text-center">Quản Lý Sản Phẩm</h3>
        <table class="table table-show-category">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Hình Ảnh</th>
                    <th>Giá</th>
                    <th>Ngày Nhập</th>

                    <th>Thao Tác</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            foreach ($product as $key => $product) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td>
                            <?php echo $product['name'] ?>
                        </td>
                        <td><img src="../Uploads/<?php echo $product['img'] ?>" alt="" width="50px"></td>
                        <td>
                            <?php echo $product['price'] ?>
                        </td>
                        <td>
                            <?php echo $product['created_at'] ?>
                        </td>
                        <td><a href="index.php?page=update-product&id=<?php echo $product['id'] ?>"><i
                                    class="bx bx-edit"></i></a><a
                                href="index.php?page=del-product&id=<?php echo $product['id'] ?>"><i
                                    class="bx bx-trash"></i></a></td>
                    </tr>
                </tbody>
                <?php
                $i++;
            }
            ?>