<?php
// require_once 'pdo.php';

function checkUser($username, $password)
{
    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
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

    $sql = "UPDATE user SET avatar=?, fullname=?, dateOfBirth=?, gender=?, phone=?, email=?, address=?, updated_at=NOW() WHERE id=?";
    pdo_execute($sql, $avatar, $fullname, $dateOfBirth, $gender, $phone, $email, json_encode($address), $id);
}

function getUpdatedUserInfo($id)
{
    $sql = "SELECT * FROM user WHERE id = ?";
    return pdo_query_one($sql, $id);
}

// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

function user_change_password($id, $password_new)
{
    $sql = "UPDATE user SET password=? WHERE id=?";
    pdo_execute($sql, $password_new, $id);
}