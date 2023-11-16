<main class="my-5">
    <div class="container">
        <h3 class="text-center"> Chỉnh Sửa Sản Phẩm</h3>
        <form action="index.php?page=update-product" method="post" style="width:500px; margin:0 auto;" class="mt-3 mb-5"
            enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="id_category">Tên Danh Mục</label>
                <input type="text" name="id_category" id="id_category" class="form-control"
                    value="<?= $one[0]['id_category'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $one[0]['name'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="img">Hình Ảnh</label>
                <input type="file" name="img" id="img" class="form-control d-block" value="<?= $one[0]['img'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="gallery">Hình Ảnh Chi Tiết</label>
                <input type="file" name="gallery" id="gallery" class="form-control d-block">
            </div>

            <div class="form-group mb-3">
                <label for="info"> Mô Tả</label>
                <input type="text" name="info" id="info" class="form-control" value="<?= $one[0]['info'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="price">Giá</label>
                <input type="text" name="price" id="price" class="form-control" value="<?= $one[0]['price'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="sale">Sale</label>
                <input type="text" name="sale" id="sale" class="form-control" value="<?= $one[0]['sale'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="view">Lượt Xem</label>
                <input type="text" name="view" id="view" class="form-control" value="<?= $one[0]['view'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="hot">Hot</label>
                <input type="text" name="hot" id="hot" class="form-control" value="<?= $one[0]['hot'] ?>">
            </div>


            <div class="form-group mb-3">
                <input type="submit" name="themmoi" value="Chỉnh Sửa Sản Phẩm" class="btn btn-dark px-5">
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