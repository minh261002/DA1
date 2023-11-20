<?php
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $category = get_category_by_id($category_id);
    extract($category);
}
?>
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <img src="../uploads/logo_owenstore.svg" alt="">
    </a>
    <ul class="side-menu top">
        <li>
            <a href="index.php?page=home">
                <i class='bx bxs-home'></i>
                <span class="text">Trang Chủ</span>
            </a>
        </li>
        <li class="active">
            <a href="index.php?page=category">
                <i class='bx bxs-category-alt'></i>
                <span class="text">Danh Mục</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-window-alt'></i>
                <span class="text">Sản Phẩm</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-chat'></i>
                <span class="text">Phản Hồi</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bxs-group'></i>
                <span class="text">Tài Khoản</span>
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

<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#index.php?page=category" class="nav-link">Danh Mục Sản Phẩm</a>
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
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh Mục Sản Phẩm</h1>
            </div>
        </div>

        <div class="admin-category">

            <form action="index.php?page=updateCategory" method="POST" enctype="multipart/form-data">

                <div class="form-group mb-3">
                    <label for="id">ID Danh Mục</label>
                    <input type="text" name="category_id" id="category_id" class="form-control" value="<?= $id ?>"
                        disabled>
                    <span class="err">Không Cần Nhập ID Danh Mục</span>
                </div>

                <div class="form-group mb-3">
                    <label for="id">Tên Danh Mục</label>
                    <input type="text" name="category_name" id="category_name" class="form-control"
                        value="<?= $name ?>">
                    <span class="err" id="ctnameErr"></span>
                </div>

                <div class="form-group mb-3">
                    <img src="../Uploads/<?= $avatar ?>" width='50px'>
                    <input type="file" name="category_img" id="category_img" class="form-control d-block">
                    <input type="hidden" name="avatar_old" value="<?= $avatar ?>">
                    <span class="err" id="ctimgErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="home">Tùy Chọn</label>
                    <select name="home" id="home" class="form-control">
                        <option value="0" <?php echo ($home == 0) ? 'selected' : ''; ?>>Mặc Định</option>
                        <option value="1" <?php echo ($home == 1) ? 'selected' : ''; ?>>Hiện Danh Mục Lên Trang Chủ
                        </option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="hide">Trạng Thái</label>
                    <select name="hide" id="hide" class="form-control">
                        <option value="0" <?php echo ($hide == 0) ? 'selected' : ''; ?>>Đang Kinh Doanh</option>
                        <option value="1" <?php echo ($hide == 1) ? 'selected' : ''; ?>>Ngừng Kinh Doanh</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <input type="hidden" name="category_id" value=<?= $id ?>>
                    <input type="submit" name="updateCategory" value="Lưu Thay Đổi  " class="btn btn-dark px-5">
                </div>

                <a href="index.php?page=category">Quay Lại</a>

            </form>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->