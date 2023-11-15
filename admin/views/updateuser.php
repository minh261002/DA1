<style>
.file {
    display: block !important;
}
</style>
<div class="container">
    <form action="index.php?page=update-user" method="post" enctype="multipart/form-data">
        <h1>Cập Nhật Thông Tin Người Dùng</h1>
        <div class="form-group mb3mb-3">
            <label for="">Ảnh Đại Diện</label>
            <input type="file" name="avatar" id="avatar" value="<?= $one[0]['avatar'] ?>" class="form-control file">
        </div>
        <div class="form-group mb-3">
            <label for="">Tên Đăng Nhập</label>
            <input type="text" name="username" id="username" value="<?= $one[0]['username'] ?>" class=" form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Mật Khẩu</label>
            <input type="password" name="password" id="password" value="<?= $one[0]['password'] ?>"
                class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Họ Và Tên</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $one[0]['fullname'] ?>">
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
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Ảnh Đại Diện</th>
            <th scope="col">Tên Đăng Nhập</th>
            <th scope="col">Mật Khẩu</th>
            <th scope="col">Họ Và Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Vai Trò</th>
            <th scope="col">Hành Động</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($user as $key => $user) {  
            ?>

        <tr>

            <td><?php echo $i?></td>
            <td><img src="../Uploads/<?php echo $user['avatar']?>" alt="" width="50px"></td>
            <td><?php echo $user['username']?></td>
            <td><?php echo $user['password']?></td>
            <td><?php echo $user['fullname']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['phone']?></td>
            <td><?php echo $user['address']?></td>
            <td><?php 
            if($user['role'] == 0){
                echo 'Người Dùng';
            }else{
                echo 'Admin';
            }
        ?></td>
            <td><a href="index.php?page=update-user&id=<?php echo $i?>">sửa</a> | <a
                    href="admin.php?act=del-user&<?php echo $i?>">Ẩn</a></td>


        </tr>
        <?php  $i++;?>
        <?php  }?>
    </tbody>
</table>
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
</script>