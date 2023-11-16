<style>
.file {
    display: block !important;
}
</style>
<main class="my-5">
    <div class="container">
        <a href="index.php?page=user">Quay Lại</a>
        <h3 class="text-center">Thêm Người Dùng Mới</h3>
        <form action="index.php?page=create-user" method="post" enctype="multipart/form-data"
            onsubmit="return validateForm()">
            <h1>Quản Lý Người Dùng</h1>
            <div class="form-group mb3mb-3">
                <label for="">Ảnh Đại Diện</label>
                <input type="file" name="avatar" id="avatar" class="form-control file">
            </div>
            <div class="form-group mb-3">
                <label for="">Tên Đăng Nhập</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Họ Và Tên</label>
                <input type="text" name="fullname" id="fullname" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Ngày sinh</label>
                <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Giới Tính</label>
                <select name="gender" id="gender">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group mb-3">
                <div class="group-checkout">
                    <label for="city">
                        TỈNH / THÀNH PHỐ
                        <span>*</span>
                    </label>
                    <select class="form-select" name="city" id="city">
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
                    <select class="form-select" name="district" id="district">
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
                    <select class="form-select" name="ward" id="ward">
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
                    <input type="text" name="fulladdress" id="address" class="form-control">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="">Ban</label>

                <select name="ban" id="ban">
                    <option value="0">Bình thường</option>
                    <option value="1">Cấm</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="">Vai trò</label>

                <select name="role" id="role">
                    <option value="0">Quản Trị</option>
                    <option value="1">Người Dùng</option>
                </select>
            </div>

            <input class="btn btn-primary" type="hidden" name="id" value="<?=$one[0]['id'] ?>">
            <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Sign in</button>
        </form>
    </div>
</main>
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
            const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset
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

function validateForm() {
    var avatar = document.getElementById("avatar").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var fullname = document.getElementById("fullname").value;
    var email = document.getElementById("email").value;

    if (avatar === "" || username === "" || password === "" || fullname === "" || email === "") {
        alert("Vui lòng điền đầy đủ thông tin");
        return false;
    }

    // Kiểm tra mật khẩu ít nhất 6 kí tự
    if (password.length < 6) {
        alert("Mật khẩu phải có ít nhất 6 kí tự");
        return false;
    }




    // Kiểm tra email có ký tự "@"
    if (email.indexOf("@") === -1) {
        alert("Email phải có ký tự '@'");
        return false;
    }

    return true;
}
</script>