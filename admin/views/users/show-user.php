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
</section>
<section id="content">
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
</section>