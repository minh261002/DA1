<h3 class="text-center">Quản Lý Sản Phẩm</h3>
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

        <?php $i++; }?>
    </tbody>
    <a href="index.php?page=add-product" style="color:red; text-decoration:underline;">Thêm Sản Phẩm Mới</a>
</table>