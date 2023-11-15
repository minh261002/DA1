<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

form {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 20px;
    width: 500px;
}

h1 {
    color: #ff5733;
}

label {
    font-weight: 600;
}

input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-weight: 600;
    padding: 10px;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    background-color: #fff;
    border: 1px solid #ccc;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 100%;
}

th,
td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background-color: white;
    color: black;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0e0e0;
}

#container {
    display: flex;
    margin: 20px;

}

.form {
    margin: 20px;
}
</style>
<div id="container">
    <form action="admin.php?act=adspadd" method="POST" enctype="multipart/form-data">
        <h1>QUẢN LÝ SẢN PHẨM</h1>
        <label for="name">Tên sản phẩm <input type="text" name="name" id="name"></label><br>
        <label for="image">Hình ảnh <input type="file" name="image" id="image"></label><br>
        <label for="price">Giá<input type="text" name="price" id="price"></label><br>
        <label for="giacu">Giá cũ<input type="text" name="giacu" id="giacu"></label><br>
        <label for="iddm">Danh mục <select name="iddm" id="iddm">
                <option value="0">Chọn danh mục</option>
                <?php
            if(isset($kq)){
                foreach($kq as $dm){
                    echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
                }
            } 
        ?>
            </select></label><br>
        <input type="submit" name="themmoi" value="Thêm mới">
    </form>
    <table border="1" style="color: black; width: 1100px;">
        <tr>
            <th>STT</th>
            <th>Tên Danh Mục</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình ảnh</th>
            <!-- <th>Gallery</th>
        <th>Mô tả</th> -->
            <th>Giá tiền</th>
            <th>Sale</th>
            <th>Lượt xem</th>
            <th>Hot</th>

            <th>HÀNH ĐỘNG</th>
        </tr>
        <?php   
    if (isset($dssp) && count($dssp) > 0) {
        $i = 1;
      

        foreach ($dssp as $sp) {
            extract($sp);
          
            echo '

            <tr>
            <th>' . $i . '</th>
            <th>' . $id_category.'</th> 
    
            <th>' . $name. '</th>
            <th><img width="80px" height="100px" src="../Uploads/'.$img.'" alt=""></th>
           
           
            <th>'. number_format($price, 0, ',', '.') .' VNĐ</th>
            <th>' . $sale . '</th>
            <th>' . $view. '</th>
            <th>' . $hot. '</th>
           
            <th><a href="admin.php?act=updatesp&id=' . $sp['id'] . '">sửa</a> | <a href="admin.php?act=delsp&id=' . $sp['id'] . '">Xóa</a></th>
        </tr>';
            $i++;
        }
    }
    ?>
    </table>
</div>