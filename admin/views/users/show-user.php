<a href="index.php?page=create-user">Thêm Người Dùng Mới</a>
<h3 class="text-center">Danh Sách Người Dùng</h3>
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
            <th scope="col">Thao Tác</th>
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
            <td><a href="index.php?page=update-user&id=<?php echo $user['id']?>">sửa</a> | <a
                    href="index.php?page=del-user&id=<?php echo $user['id']?>">Xóa</a></td>


        </tr>
        <?php  $i++;?>
        <?php  }?>

    </tbody>
</table>