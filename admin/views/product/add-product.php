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
    <main class="my-5">
        <div class="container">
            <h3 class="text-center">Thêm Sản Phẩm</h3>
            <form action="index.php?page=add-product" method="post" style="width:500px; margin:0 auto;"
                class="mt-3 mb-5" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="id_category">Tên Danh Mục</label>

                    <select class="form-control" name="id_category" id="id_category">
                        <option value="0">Chọn Danh Mục</option>
                        <?php
            if(isset( $list_category )){
                foreach($list_category  as $dm){
                    echo '<option value="'.$dm['id'].'">'.$dm['name'].'</option>';
                }
            } 
        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="img">Hình Ảnh</label>
                    <input type="file" name="img" id="img" class="form-control d-block">
                </div>

                <div class="form-group mb-3">
                    <label for="gallery">Hình Ảnh Chi Tiết</label>
                    <input type="file" name="img1" id="img1" class="form-control d-block">
                    <input type="file" name="img2" id="img2" class="form-control d-block">
                    <input type="file" name="img3" id="img3" class="form-control d-block">
                    <input type="file" name="img4" id="img4" class="form-control d-block">
                </div>

                <div class="form-group mb-3">
                    <label for="info"> Mô Tả</label>
                    <input type="text" name="info" id="info" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="price">Giá</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="sale">Sale</label>
                    <input type="text" name="sale" id="sale" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="view">Lượt Xem</label>
                    <input type="text" name="view" id="view" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="hot">Hot</label>

                    <select class="form-control" name="hot" id="hot">
                        <option value="0">Bình Thường</option>
                        <option value="1">Sản Phẩm Hot</option>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <input type="submit" name="themmoi" value="Thêm Sản Phẩm Mới" class="btn btn-dark px-5">
                </div>
            </form>
        </div>
    </main>



    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Danh Mục </th>
                <th scope="col">Tên Sản Phẩm </th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Ảnh phụ</th>
                <th scope="col">Mô Tả</th>
                <th scope="col">Giá</th>
                <th scope="col">Sale</th>
                <th scope="col">View</th>
                <th scope="col">Hot</th>
                <th scope="col">Ngày Nhập</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <?php
        $i = 1;
     
        foreach ($product as $key => $product){
           
    ?>
        <tbody>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $product['id_category'] ?></td>

                <td><?php echo $product['name'] ?></td>
                <td><img src="../Uploads/<?php echo $product['img']?>" alt="" width="50px"></td>
                <td><?php echo $product['gallery'] ?></td>
                <td><?php echo $product['info'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['sale'] ?></td>
                <td><?php echo $product['view'] ?></td>
                <td><?php echo $product['hot'] ?></td>
                <td><?php echo $product['created_at'] ?></td>
                <td><a href="index.php?page=update-product&id=<?php echo $product['id']?>">sửa</a> | <a
                        href="index.php?page=del-product&id=<?php echo $product['id']?>">Xóa</a></td>
            </tr>
            <?php  $i++; ?>
            <?php  }?>
        </tbody>

    </table>
</section>