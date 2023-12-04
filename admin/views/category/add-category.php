<!-- ... your HTML code ... -->
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="index.php" class="brand">
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

<!-- CONTENT -->
<section id="content">

<<<<<<< HEAD
<<<<<<< HEAD
            <p class="err">
                <?php if (isset($message)) {
                echo $message;
            } ?>
            </p>



            <div class="form-group mb-3">
                <label for="category_name">Tên Danh Mục</label>
                <input type="text" name="category_name" id="category_name" class="form-control">
                <span class="err" id="ctnameErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="category_img">Ảnh</label>
                <input type="file" name="category_img" id="category_img" class="form-control d-block">
                <span class="err" id="ctimgErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="home">Tùy Chọn</label>
                <select name="home" id="home" class="form-control">
                    <option value="0">Mặc Định</option>
                    <option value="1">Hiện Danh Mục Lên Trang Chủ</option>
                    <option value="2">Ẩn Danh Mục</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <input type="submit" name="addCategory" value="Thêm Danh Mục Mới" class="btn btn-dark px-5">
            </div>

            <a href="index.php?page=category">Quay Lại</a>
=======
=======
>>>>>>> 85056f60f152e057e8cc812e806b13275e2cb812
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#index.php?page=category" class="nav-link">Danh Mục Sản Phẩm</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm Kiếm...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
<<<<<<< HEAD
>>>>>>> 85056f60f152e057e8cc812e806b13275e2cb812
=======
>>>>>>> 85056f60f152e057e8cc812e806b13275e2cb812
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

    <main>
        <div class="head-title">
            <div class="left">
                <h1>Danh Mục Sản Phẩm</h1>
            </div>
        </div>

        <div class="admin-category">
            <form action="index.php?page=addCategory" method="POST" enctype="multipart/form-data"
                onsubmit="return validateForm()">

                <p class="err">
                    <?php if (isset($_SESSION["message"]) && $_SESSION["message"] != "") {
                        echo $_SESSION["message"];
                        unset($_SESSION["message"]);
                    } ?>
                </p>

                <div class="form-group mb-3">
                    <label for="category_name">Tên Danh Mục</label>
                    <input type="text" name="category_name" id="category_name" class="form-control">
                    <span class="err" id="ctnameErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="category_img">Ảnh</label>
                    <input type="file" name="category_img" id="category_img" class="form-control d-block">
                    <span class="err" id="ctimgErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="home">Tùy Chọn</label>
                    <select name="home" id="home" class="form-control">
                        <option value="0">Mặc Định</option>
                        <option value="1">Hiện Danh Mục Lên Trang Chủ</option>
                        <option value="2">Ẩn Danh Mục</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <input type="submit" name="addCategory" value="Thêm Danh Mục Mới" class="btn btn-dark px-5">
                </div>

                <a href="index.php?page=category">Quay Lại</a>
            </form>
        </div>
    </main>
</section>
<!-- ... your HTML code ... -->
<!-- ... your HTML code ... -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy các phần tử cần thiết
        var form = document.querySelector("form");
        var category_name = document.getElementById("category_name");
        var category_img = document.getElementById("category_img");

        // Xử lý sự kiện khi form được submit
        form.addEventListener("submit", function (event) {
            var isValid = true; // Variable to track overall form validity

            // Reset error messages
            document.getElementById("ctnameErr").textContent = "";
            document.getElementById("ctimgErr").textContent = "";

            // Kiểm tra rỗng và hiển thị thông báo
            if (category_name.value.trim() === "") {
                document.getElementById("ctnameErr").textContent = "Vui lòng nhập tên danh mục.";
                isValid = false;
            }

            if (category_img.value.trim() === "") {
                document.getElementById("ctimgErr").textContent = "Vui lòng chọn ảnh.";
                isValid = false;
            }

            // Ngừng submit nếu có lỗi
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Add a function to reset error messages on input change
        category_name.addEventListener("input", function () {
            document.getElementById("ctnameErr").textContent = "";
        });

        category_img.addEventListener("input", function () {
            document.getElementById("ctimgErr").textContent = "";
        });
    });
</script>