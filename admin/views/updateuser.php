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
            <input type="file" name="avatar" id="avatar" class="form-control file">
        </div>
        <div class="form-group mb-3">
            <label for="">Tên Đăng Nhập</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $one[0]['username'] ?>">
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
                <option value="0">0</option>
                <option value="1">1</option>
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
            <label for="">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Ban</label>

            <select name="ban" id="ban">
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Vai trò</label>

            <select name="role" id="role">
                <option value="0">0</option>
                <option value="1">1</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Ngày khởi tạo</label>
            <input type="date" name="created_at" id="created_at" class="form-control">
        </div>
        <input class="btn btn-primary" type="hidden" name="id" value="<?=$one[0]['id'] ?>">
        <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Sign in</button>
    </form>
</div>
<table class="table table-striped">
    <thead>
        <tr>
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
        <?php foreach($user as $key => $user) {?>

        <tr>
            <th scope="row"></th>
            <td><?php echo $user['username']?></td>
            <td><?php echo $user['password']?></td>
            <td><?php echo $user['fullname']?></td>
            <td><?php echo $user['email']?></td>
            <td><?php echo $user['phone']?></td>
            <td><?php echo $user['address']?></td>
            <td><?php echo $user['role']?></td>
            <td><a href="admin.php?act=updateuser&id='.$value['id'].'">sửa</a> | <a
                    href="admin.php?act=deluser&id='.$value['id'].'">Xóa</a></td>


        </tr>

        <?php }?>
    </tbody>
</table>