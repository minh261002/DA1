<?php
// require_once 'pdo.php';
function render_alluser(){
    $sql = "SELECT * FROM user";
    return  pdo_query($sql);
}
function  create_user($id,$avatar,$username, $password, $fullname,$dateOfBirth, $gender, $email,$phone,$address, $ban, $role){
    try{
        $sql = "INSERT INTO user( avatar,username, password, fullname,dateOfBirth, gender,email,phone,address, ban, role, created_at) VALUES (?,?,?,?, ?, ?, ?, ?,?,?,?, NOW())";
        pdo_execute($sql,$avatar,$username, md5($password), $fullname,$dateOfBirth, $gender,$email,$phone,json_encode($address), $ban, $role);
        echo "Thêm user mới thành công";
    }catch (PDOException $e) {
        echo "Thêm thất bại! " . $e->getMessage();
    }
}
function updateuser($id, $avatar, $username, $password, $fullname, $dateOfBirth, $gender, $email, $phone, $address, $ban, $role) {
    try {
        $sql = "UPDATE user SET avatar=?, username=?, password=?, fullname=?, dateOfBirth=?, gender=?, email=?, phone=?, address=?, ban=?, role=?, created_at=NOW() WHERE id=?";
        pdo_execute($sql, $avatar, $username, md5($password), $fullname, $dateOfBirth, $gender, $email, $phone, json_encode($address), $ban, $role, $id);
        echo "Update user thành công";
    } catch (PDOException $e) {
        echo "Update thất bại! " . $e->getMessage();
    }
}   
function deluser($id){
    $sql = "DELETE FROM user  WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
} 
function getoneuser($id){
    $sql = "SELECT * FROM user WHERE  id=?";
    return  pdo_query($sql, $id);
}

function checkUser($username, $password)
{
    $sql = "SELECT * FROM user WHERE  username = ? AND password = ?";
    return pdo_query_one($sql, $username, $password);
}

function usernameExists($username)
{
    $sql = "SELECT * FROM user WHERE username = ?";
    $user = pdo_query_one($sql, $username);
    return $user ? true : false;
}

function emailExists($email)
{
    $sql = "SELECT * FROM user WHERE email = ?";
    $user = pdo_query_one($sql, $email);
    return $user ? true : false;
}

function user_insert($username, $email, $password)
{
    $sql = "INSERT INTO user(username, email, password, created_at) VALUES (?, ?, ?, NOW())";
    pdo_execute($sql, $username, $email, $password);
}


function update_user($id, $avatar, $fullname, $dateOfBirth, $gender, $phone, $email, $address)
{
    if ($avatar != "") {
        $sql = "UPDATE user SET avatar=?, fullname=?, dateOfBirth=?, gender=?, phone=?, email=?, address=?, updated_at=NOW() WHERE id=?";
        pdo_execute($sql, $avatar, $fullname, $dateOfBirth, $gender, $phone, $email, json_encode($address), $id);
    } else {
        $sql = "UPDATE user SET fullname=?, dateOfBirth=?, gender=?, phone=?, email=?, address=?, updated_at=NOW() WHERE id=?";
        pdo_execute($sql, $fullname, $dateOfBirth, $gender, $phone, $email, json_encode($address), $id);
    }
}

function getUpdatedUserInfo($id)
{
    $sql = "SELECT * FROM user WHERE id = ?";
    return pdo_query_one($sql, $id);
}



function user_change_password($id, $password_new)
{
    $sql = "UPDATE user SET password=? WHERE id=?";
    pdo_execute($sql, $password_new, $id);
}

function get_user_password($id)
{
    $sql = "SELECT password FROM user WHERE id=?";
    return pdo_query($sql, $id);
}