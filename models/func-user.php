<?php
  
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
    

?>