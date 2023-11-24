<style>
.file {
    display: block !important;
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
            <a href="index.php?page=user">Quay Lại</a>
            <h3 class="text-center">Chỉnh Sửa Thông Tin Người Dùng</h3>
            <form action="index.php?page=update-user" method="post" enctype="multipart/form-data">

                <div class="form-group mb3mb-3">
                    <label for="">Ảnh Đại Diện</label>
                    <input type="file" name="avatar" id="avatar" value="<?= $one[0]['avatar'] ?>"
                        class="form-control file">
                </div>
                <div class="form-group mb-3">
                    <label for="">Tên Đăng Nhập</label>
                    <input type="text" name="username" id="username" value="<?= $one[0]['username'] ?>"
                        class=" form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Mật Khẩu</label>
                    <input type="password" name="password" id="password" value="<?= $one[0]['password'] ?>"
                        class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Họ Và Tên</label>
                    <input type="text" name="fullname" id="fullname" class="form-control"
                        value="<?= $one[0]['fullname'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Ngày sinh</label>
                    <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control"
                        value="<?= $one[0]['dateOfBirth'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Giới Tính</label>
                    <select name="gender" id="gender" value="<?= $one[0]['gender'] ?>">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= $one[0]['email'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $one[0]['phone'] ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="group-checkout">
                        <label for="city">
                            TỈNH / THÀNH PHỐ
                            <span>*</span>
                        </label>
                        <select class="form-select" name="city" id="city" value="<?= $one[0]['city'] ?>">
                            <option selected disabled hidden>
                                <?php
                                            if (isset($province)) {
                                                echo $province;
                                            } else {
                                                echo 'Tỉnh / Thành Phố';
                                            }
                                            ?>
                            </option>
                        </select>
                    </div>

                    <div class="group-checkout">
                        <label for="district">
                            QUẬN / HUYỆN
                            <span>*</span>
                        </label>
                        <select class="form-select" name="district" id="district" value="<?= $one[0]['district'] ?>">
                            <option selected disabled hidden>
                                <?php
                                            if (isset($district)) {
                                                echo $district;
                                            } else {
                                                echo 'Quận / Huyện';
                                            }
                                            ?>
                            </option>
                        </select>
                    </div>

                    <div class="group-checkout">
                        <label for="ward">
                            PHƯỜNG / XÃ
                            <span>*</span>
                        </label>
                        <select class="form-select" name="ward" id="ward" value="<?= $one[0]['ward'] ?>">
                            <option selected disabled hidden>
                                <?php
                                            if (isset($ward)) {
                                                echo $ward;
                                            } else {
                                                echo 'Quận / Huyện';
                                            }
                                            ?>
                            </option>
                        </select>
                        <label for="">Địa chỉ</label>
                        <input type="text" name="fulladdress" id="address" class="form-control"
                            value="<?= $one[0]['fulladdress'] ?>">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="">Ban</label>

                    <select name="ban" id="ban" value="<?= $one[0]['ban'] ?>">
                        <option value="0">Bình thường</option>
                        <option value="1">Cấm</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">Vai trò</label>

                    <select name="role" id="role" value="<?= $one[0]['role'] ?>">
                        <option value="0">Quản Trị</option>
                        <option value="1">Người Dùng</option>
                    </select>
                </div>

                <input class="btn btn-primary" type="hidden" name="id" value="<?=$one[0]['id'] ?>">
                <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Sign in</button>

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
promise.then(function(result) {
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
    citis.onchange = function() {
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
    district.onchange = function() {
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