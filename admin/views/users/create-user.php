<?php
if (isset($one[0]['address'])) {
    $address = json_decode($one[0]['address'], true);
    $ward = $address['ward'];
    $district = $address['district'];
    $province = $address['province'];
    $detail = $address['detail'];
}

if (isset($one[0]['created_at'])) {
    $one[0]['created_at'] = date('H:i:s / d-m-Y', strtotime($one[0]['created_at']));
}

if (isset($one[0]['updated_at'])) {
    $one[0]['updated_at'] = date(' H:i:s / d-m-Y', strtotime($one[0]['updated_at']));
}

?>

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
        <li class="active">
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
<section id="content">
    <!-- NAVBAR -->
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
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Quản Lý Tài Khoản</h1>
            </div>
        </div>

        <div class="admin_user">
            <h5 class="m-4">Thêm Tài Khoản Mới</h5>
            <form action="index.php?page=create-user" method="POST" class="form-update" enctype="multipart/form-data">
                <div class="update_avatar">
                    <img src="../uploads/default_user.png" width="80px" id="previewAvatar">
                    <br> <label for="avatar" class="chs-img">Chọn Ảnh</label>
                    <input type="file" name="avatar" id="avatar">

                    <script>
                        const fileAvatar = document.getElementById('avatar');
                        const previewAvatar = document.getElementById('previewAvatar');

                        fileAvatar.addEventListener('change', function () {
                            const file = fileAvatar.files[0];

                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function (e) {
                                    previewAvatar.src = e.target.result;
                                };

                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
                </div>

                <div class="update_info">
                    <p class="err" style="z-index: 9999;">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </p>
                    <div class="info_content mb-3">
                        <div class="form-group mb-3">
                            <label for="username">Tên Đăng Nhập</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group mb-3 form-password">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <i class='bx bx-show' id="showPassword"></i>
                            <i class='bx bx-hide' id="hidePassword"></i>
                        </div>

                        <script>
                            const passwordInput = document.getElementById('password');
                            const showPasswordIcon = document.getElementById('showPassword');
                            const hidePasswordIcon = document.getElementById('hidePassword');

                            showPasswordIcon.addEventListener('click', function () {
                                passwordInput.type = 'text';
                                showPasswordIcon.style.display = 'none';
                                hidePasswordIcon.style.display = 'inline-block';
                            });

                            hidePasswordIcon.addEventListener('click', function () {
                                passwordInput.type = 'password';
                                hidePasswordIcon.style.display = 'none';
                                showPasswordIcon.style.display = 'inline-block';
                            });
                        </script>
                    </div>

                    <div class="info_content_ct mb-3">
                        <div class="form-group mb-3">
                            <label for="fullname">Họ Và Tên</label>
                            <input type="text" name="fullname" id="fullname" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dateOfBirth">Ngày Sinh</label>
                            <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Giới Tính</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0">Chọn</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                    </div>

                    <div class="info_content mb-3">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>

                    <div class="form-address mb-4">
                        <label for="">Địa Chỉ</label>
                        <div class="info_content_ad mb-3">
                            <select class="form-select form-control" name="province" id="city">
                                <option value="<?php if (isset($province)) {
                                    echo $province;
                                } ?>">
                                    <?php if (isset($province)) {
                                        echo $province;
                                    } ?>
                                </option>
                            </select>

                            <select class="form-select form-control" name="district" id="district">
                                <option value="<?php if (isset($district)) {
                                    echo $district;
                                } ?>">
                                    <?php if (isset($district)) {
                                        echo $district;
                                    }
                                    ?>
                                </option>
                            </select>

                            <select class="form-select form-control" name="ward" id="ward">
                                <option value="<?php if (isset($ward)) {
                                    echo $ward;
                                } ?>">
                                    <?php if (isset($ward)) {
                                        echo $ward;
                                    } ?>
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="detail" id="detail" class="form-control" value="<?php if (isset($detail)) {
                                echo $detail;
                            } ?>">
                        </div>
                    </div>

                    <div class="info_content mb-3">
                        <div class="form-group mb-3">
                            <label for="role">Vai trò</label>
                            <select name="role" id="role" class="form-control">
                                <option value="0">Tài Khoản Khách Hàng</option>
                                <option value="1">Quản Trị Viên</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <button type="submit" name="create-user" class="btn btn-dark px-5">Tạo Tài Khoản</button>
                        <a href="index.php?page=user" class="btn">Quay Lại</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</section>


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
    promise.then(function (result) {
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
        citis.onchange = function () {
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
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex]
                    .dataset
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
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            var errors = [];

            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('detail').value; // Updated to use 'detail' for address

            // Check if fields are empty
            if (username === '' || password === '' || fullname === '' || email === '' || phone === '' ||
                address === '') {
                errors.push('Vui lòng điền đầy đủ thông tin.');
            }

            // Check password length
            if (password.length < 6) {
                errors.push('Mật khẩu phải có ít nhất 6 ký tự.');
            }

            // Check email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                errors.push('Địa chỉ email không hợp lệ.');
            }

            // Check phone number format (10 digits)
            var phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phone)) {
                errors.push('Số điện thoại phải có 10 chữ số.');
            }

            // Display errors or submit the form
            if (errors.length > 0) {
                event.preventDefault(); // Prevent form submission
                alert(errors.join('\n')); // Display all errors
            }
        });
    });
</script>