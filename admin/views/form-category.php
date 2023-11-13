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
input[type="number"],
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
</style>
<form action="admin.php?act=adddm" method="post" onsubmit="return check();">
    <h1>DANH MỤC SẢN PHẨM</h1>

    <label>Tên danh mục</label>
    <input type="text" name="tendm" id="tendm" value=""><br>
    <label>Thứ tự ưu tiên</label><br>
    <input type="number" name="uutien" id="uutien" value=""><br>
    <label>Thứ tự hiển thị </label><br>
    <input type="number" name="hienthi" id="hienthi" value=""><br>

    <input type="hidden" name="id" value="<?=$kq1[0]['id'] ?>">
    <input type="submit" name="themmoi" value=" Thêm mới "><br>
</form>
<table border="1" style="color:black; width:1100px;margin:20px;" ;>
    <tr>
        <th>STT</th>
        <th>HÌNH ẢNH</th>
        <th>TÊN DANH MỤC</th>
        <th>DANH MỤC CON</th>
        <th>HOME</th>
        <th>HÀNH ĐỘNG</th>
    </tr>
    <?php   
       if(isset($kq)&&(count($kq)>0)){
        $i=1;
        foreach ($kq as $dm){
            echo ' <tr>
            <th>'.$i.'</th>
            <th>'.$dm['avatar'].'</th>
            <th>'.$dm['name'].'</th>
            <th>'.$dm['parent_id'].'</th>
            <th>'.$dm['home'].'</th>
            <th><a href="admin.php?act=updatedmform&id='.$dm['id'].'">sửa</a> | <a href="admin.php?act=deldm&id='.$dm['id'].'">Xóa</a></th>
        </tr>';
        $i++;
        }
       }
    ?>

</table>