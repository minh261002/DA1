<?php
    $one = []; // Khởi tạo một mảng rỗng để tránh lỗi khi không có dữ liệu
    if(isset($one[0]['name'])) {
        $name = $one[0]['name'];
    } else {
        $name = ''; // Giá trị mặc định nếu không có dữ liệu
    }
?>
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

/* input[type="text"],
input[type="password"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="file"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    background-color: #fff;
  
    color: #000;
  
    border: 1px solid #ccc;
    border-radius: 5px;
} */


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

<script src="/assets/js/check-form.js"></script>
<form action="index.php?page=create-user" method="post" enctype="multipart/form-data"
    onsubmit="return checkcreateuser();">
    <h1>Quản lý user</h1>
    <label for="avatar">Ảnh Đại Diện</label>
    <input type="file" name="avatar" id="avatar" value=""><br>

    <label for="name">Tên đăng nhập</label>
    <input type="text" name="username" id="username" value=""><br>
    <label for="password">Mật Khẩu</label>
    <input type="password" name="password" id="password" value=""><br>
    <label for="name">Tên đầy đủ</label>
    <input type="text" name="fullname" id="fullname" value=""><br>
    <label for="name">Email</label>
    <input type="text" name="email" id="email" value=""><br>
    <label for="phone">Số điện thoại</label>
    <input type="text" name="phone" id="phone" value=""><br>
    <label for="email">Địa chỉ</label>
    <input type="text" name="address" id="address" value=""><br>
    <label for="email">Ban</label>
    <input type="text" name="ban" id="ban" value=""><br>

    <label for="role">Vai trò</label>
    <input type="text" name="role" id="role" value=""><br>
    <!-- <select name="role" id="role">
        <option value="admin">1</option>
        <option value="user">0</option>
    </select><br> -->


    <input type="hidden" name="id" value="<?=$one[0]['id'] ?>">
    <input type="submit" name="themmoi" value=" Thêm mới ">
</form>
<table border="1" style="color:black; width:1100px" ;>
    <tr>
        <th>STT</th>
        <th>Ảnh Đại Diện</th>
        <th>Tên Đăng Nhập</th>
        <th>Mật Khẩu</th>
        <th>Tên Đầy Đủ</th>
        <th>Email</th>
        <th>Số Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Ban</th>
        <th>Vai Trò</th>
        <th>HÀNH ĐỘNG</th>

    </tr>
    <?php   
       if(isset($user)&&(count($user)>0)){
        $i=1;
        foreach ($user as $value){
            echo ' <tr>
            <th>'.$i.'</th>
            <th>'.$value['avatar'].'</th>
            <th>'.$value['username'].'</th>
            <th>'.$value['password'].'</th>
            <th>'.$value['fullname'].'</th>
            <th>'.$value['email'].'</th>
            <th>'.$value['phone'].'</th>
            <th>'.$value['address'].'</th>
            <th>'.$value['ban'].'</th>
            <th>'.$value['role'].'</th>
            <th><a href="admin.php?act=updateuser&id='.$value['id'].'">sửa</a> | <a href="admin.php?act=deluser&id='.$value['id'].'">Xóa</a></th>
        </tr>';
        $i++;
        }
       }
    ?>

</table>
<script>
function checkcreateuser() {
    var avatar = document.getElementById('avatar').value;
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var fullname = document.getElementById('fullname').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var ban = document.getElementById('ban').value;
    var role = document.getElementById('role').value;

    // Check if any field is empty
    if (avatar === '' || username === '' || password === '' || fullname === '' || email === '' || phone === '' ||
        address === '' || ban === '' || role === '') {
        alert('Vui lòng điền đầy đủ thông tin.');
        return false;
    }

    // Check if username contains special characters
    var usernameRegex = /^[a-zA-Z0-9]+$/; // Only allow alphanumeric characters
    if (!username.match(usernameRegex)) {
        alert('Tên đăng nhập không được chứa ký tự đặc biệt.');
        return false;
    }

    // Check if email contains special characters
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // Simple email validation
    if (!email.match(emailRegex)) {
        alert('Email không hợp lệ.');
        return false;
    }

    // Check if password has more than 3 characters
    if (password.length <= 3) {
        alert('Mật khẩu phải có ít nhất 4 ký tự.');
        return false;
    }

    // Check if phone number has exactly 10 digits
    if (phone.length !== 10) {
        alert('Số điện thoại phải có 10 chữ số.');
        return false;
    }

    // Check if email contains the '@' symbol
    if (email.indexOf('@') === -1) {
        alert('Email phải chứa ký tự @.');
        return false;
    }

    return true;
}
</script>