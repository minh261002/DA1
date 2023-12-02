<style>
    #file-info {
        display: none;
    }

    input {
        display: none;
    }
</style>


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

    <main class="my-5">
        <div class="container">
            <h3 class="text-center">Thêm Sản Phẩm</h3>
            <form action="index.php?page=add-product" method="post" style="width:500px; margin:0 auto;"
                class="mt-3 mb-5" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group mb-3">
                    <label for="id_category">Tên Danh Mục</label>

                    <select class="form-control" name="id_category" id="id_category">
                        <option value="0">Chọn Danh Mục</option>
                        <?php
                        if (isset($list_category)) {
                            foreach ($list_category as $dm) {
                                echo '<option value="' . $dm['id'] . '">' . $dm['name'] . '</option>';
                            }
                        }
                        ?>

                    </select>
                    <span class="err" id="categoryErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <span class="err" id="nameErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="img">Hình Ảnh</label>
                    <input type="file" name="img" id="img" class="form-control d-block">

                    <span class="err" id="imgErr"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="gallery">Bộ sưu tập</label>
                    <!-- <input type="file" name="gallery[]" id="gallery" class="form-control d-block" multiple> -->
                    <span class="err" id="gelleryErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="info"> Mô Tả</label>
                    <input type="text" name="info" id="info" class="form-control">
                    <span class="err" id="infoErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Giá</label>
                    <input type="text" name="price" id="price" class="form-control">
                    <span class="err" id="priceErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="sale">Sale</label>
                    <input type="text" name="sale" id="sale" class="form-control">
                    <span class="err" id="saleErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="view">Lượt Xem</label>
                    <input type="text" name="view" id="view" class="form-control">
                    <span class="err" id="viewErr"></span>
                </div>
                <div class="form-group mb-3">
                    <div class="group-checkout">
                        <label for="hot">Hot</label>

                        <select class="form-control" name="hot" id="hot">
                            <option value="0">Bình Thường</option>
                            <option value="1">Sản Phẩm Hot</option>
                        </select>
                        <span class="err" id="hotErr"></span>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="size">Size</label>
                    <input type="text" name="size" id="size" class="form-control">
                    <span class="err" id="sizeErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="color">Màu Sắc</label>
                    <input type="text" name="color" id="color" class="form-control">
                    <span class="err" id="colorErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Số Lượng</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                    <span class="err" id="quantityErr"></span>
                </div>



                <div class="form-group mb-3">
                    <input type="submit" name="themmoi" value="Thêm Sản Phẩm Mới" class="btn btn-dark px-5">
                </div>
            </form>
        </div>
    </main>


</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy các phần tử cần thiết
        var form = document.querySelector("form");
        var id_category = document.getElementById("id_category");
        var name = document.getElementById("name");
        var img = document.getElementById("img");
        var gallery = document.getElementById("gallery");
        var info = document.getElementById("info");
        var price = document.getElementById("price");
        var sale = document.getElementById("sale");
        var view = document.getElementById("view");
        var hot = document.getElementById("hot");
        var size = document.getElementById("size");
        var color = document.getElementById("color");
        var quantity = document.getElementById("quantity");

        // Xử lý sự kiện khi form được submit
        form.addEventListener("submit", function (event) {
            var isValid = true; // Variable to track overall form validity

            // Reset error messages
            resetErrorMessages();

            // Kiểm tra rỗng và hiển thị thông báo
            isValid = validateField(id_category, "Vui lòng chọn danh mục.") && isValid;
            isValid = validateField(name, "Vui lòng nhập tên sản phẩm.") && isValid;
            isValid = validateFile(img, "Vui lòng chọn ảnh.") && isValid;
            isValid = validateFile(gallery, "Vui lòng chọn ảnh cho bộ sưu tập.") && isValid;
            isValid = validateField(info, "Vui lòng nhập mô tả.") && isValid;
            isValid = validateField(price, "Vui lòng nhập giá.") && isValid;
            isValid = validateField(sale, "Vui lòng nhập giảm giá.") && isValid;
            isValid = validateField(view, "Vui lòng nhập số lượt xem.") && isValid;
            isValid = validateField(hot, "Vui lòng chọn trạng thái hot.") && isValid;
            isValid = validateField(size, "Vui lòng nhập size.") && isValid;
            isValid = validateField(color, "Vui lòng nhập màu sắc.") && isValid;
            isValid = validateField(quantity, "Vui lòng nhập số lượng.") && isValid;

            // Check if any field is empty and display a general error
            if (!isValid) {
                document.getElementById("generalErr").textContent = "Vui lòng điền đầy đủ thông tin.";
                event.preventDefault(); // Stop the form submission
            }
        });

        // Add a function to reset error messages on input change
        function resetErrorMessages() {
            document.getElementById("categoryErr").textContent = "";
            document.getElementById("nameErr").textContent = "";
            document.getElementById("imgErr").textContent = "";
            document.getElementById("galleryErr").textContent = "";
            document.getElementById("infoErr").textContent = "";
            document.getElementById("priceErr").textContent = "";
            document.getElementById("saleErr").textContent = "";
            document.getElementById("viewErr").textContent = "";
            document.getElementById("hotErr").textContent = "";
            document.getElementById("sizeErr").textContent = "";
            document.getElementById("colorErr").textContent = "";
            document.getElementById("quantityErr").textContent = "";
            document.getElementById("generalErr").textContent = ""; // Clear general error message
        }

        // Function to validate a field and display an error message
        function validateField(field, errorMessage) {
            if (field.value.trim() === "") {
                var errorId = field.id + "Err";
                document.getElementById(errorId).textContent = errorMessage;
                return false;
            }
            return true;
        }

        // Function to validate a file input and display an error message
        function validateFile(field, errorMessage) {
            if (field.files.length === 0) {
                var errorId = field.id + "Err";
                document.getElementById(errorId).textContent = errorMessage;
                return false;
            }
            return true;
        }

        // Other event listeners...
    });
</script>