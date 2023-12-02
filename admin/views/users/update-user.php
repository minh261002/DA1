<?php
if (isset($one[0]['address'])) {
    $address = json_decode($one[0]['address'], true);

    if (isset($address['ward'])) {
        $ward = $address['ward'];
    }

    if (isset($address['district'])) {
        $district = $address['district'];
    }

    if (isset($address['province'])) {
        $province = $address['province'];
    }

    if (isset($address['detail'])) {
        $detail = $address['detail'];
    }
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
            <form action="index.php?page=update-user" method="POST" class="form-update" enctype="multipart/form-data">
                <div class="update_avatar">
                    <img src="../uploads/<?= $one[0]['avatar'] ?>" width="80px" id="previewAvatar">
                    <br> <label for="avatar" class="chs-img">Chọn Ảnh</label>
                    <input type="file" name="avatar" id="avatar">
                    <input type="hidden" name="avatar-old" value="<?= $one[0]['avatar'] ?>">

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
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?= $one[0]['username'] ?>">
                        </div>
                        <div class="form-group mb-3 form-password">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="<?= $one[0]['password'] ?>">
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
                            <input type="text" name="fullname" id="fullname" class="form-control"
                                value="<?= $one[0]['fullname'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="dateOfBirth">Ngày Sinh</label>
                            <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control"
                                value="<?= $one[0]['dateOfBirth'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Giới Tính</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0">Chọn</option>
                                <option value="1" <?php
                                if ($one[0]['gender'] == 1) {
                                    echo "selected";
                                }
                                ?>>Nam
                                </option>
                                <option value="2">
                                    <?php if ($one[0]['gender'] == 2) {
                                        echo "selected";
                                    } ?>
                                    Nữ
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="info_content mb-3">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="<?= $one[0]['email'] ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Số Điện Thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="<?= $one[0]['phone'] ?>">
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
                                <option value="2">Chọn</option>
                                <option value="1" <?php
                                if ($one[0]['role'] == 1) {
                                    echo "selected";
                                }
                                ?>>Quản Trị Viên
                                </option>
                                <option value="0" <?php if ($one[0]['role'] == 0) {
                                    echo "selected";
                                } ?>>
                                    Tài Khoản Khách Hàng
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="ban">Trạng Thái</label>
                            <select name="ban" id="ban" class="form-control">
                                <option value="1" <?php
                                if ($one[0]['ban'] == 1) {
                                    echo "selected";
                                }
                                ?>>Tài Khoản Bị Khóa
                                </option>
                                <option value="0" <?php if ($one[0]['ban'] == 0) {
                                    echo "selected";
                                } ?>>
                                    Tài Khoản Đang Hoạt Động
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="info_content mb-3">
                        <div class="form-group">
                            <p>Đăng Ký Ngày:
                                <?= $one[0]['created_at'] ?>
                            </p>
                            <p>Cập nhật lần cuối:
                                <?= $one[0]['updated_at'] ?>
                            </p>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <input type="hidden" name="id" value="<?= $one[0]['id'] ?>">
                        <button type="submit" name="update_user" class="btn btn-dark">Lưu Thay Đổi</button>
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
</script>