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
            <a href="index.php?page=arrange">
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


    <p class="err">
        <?php if (isset($message)) {
            echo $message;
        } ?>
    </p>
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
<script>
    function validateForm() {
        var category_name = document.getElementById("category_name").value;
        var category_img = document.getElementById("category_img").value;
        var home = document.getElementById("home").value;
        var ctnameErr = document.getElementById("ctnameErr");
        var ctimgErr = document.getElementById("ctimgErr");

        // Thiết lập biến để theo dõi việc xác thực
        var isValid = true;

        // Kiểm tra tên danh mục
        if (category_name.trim() === "") {
            ctnameErr.textContent = "Vui lòng nhập tên danh mục.";
            isValid = false;
        } else {
            ctnameErr.textContent = "";
        }

        // Kiểm tra ảnh
        if (category_img.trim() === "") {
            ctimgErr.textContent = "Vui lòng chọn ảnh.";
            isValid = false;
        } else {
            ctimgErr.textContent = "";
        }

        // Kiểm tra giá trị của trường "Tùy Chọn"
        if (home !== "0" && home !== "1" && home !== "2") {
            // Nếu không phải là 0, 1 hoặc 2, thì hiển thị lỗi
            alert("Giá trị không hợp lệ cho trường 'Tùy Chọn'.");
            isValid = false;
        }

        return isValid; // Trả về true nếu tất cả kiểm tra đều đúng, ngược lại trả về false
    }
</script>