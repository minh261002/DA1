<?php
  
    function render_alluser(){
        $sql = "SELECT * FROM user";
        return  pdo_query($sql);
    }
    function  create_user($id,$avatar,$username, $password, $fullname,$email,$phone,$address, $ban, $role){
        try{
            $sql = "INSERT INTO user( avatar,username, password, fullname,email,phone,address, ban, role) VALUES (?,?, ?, ?, ?, ?,?,?,?)";
            pdo_execute($sql,$avatar,$username, $password, $fullname,$email,$phone,$address, $ban, $role);
            echo "Thêm user mới thành công";
        }catch (PDOException $e) {
            echo "Thêm thất bại! " . $e->getMessage();
        }
    }
    function updateuser($id, $name, $email, $address, $password, $phone, $id_loaiuser){
        try{
            $sql = "UPDATE user SET name=?, email=?, address=?, password=?, phone=?, id_loaiuser=? WHERE id=?";
            pdo_execute($sql, $name, $email, $address, $password, $phone, $id_loaiuser, $id);
            echo "Update user thành công";
        }catch (PDOException $e) {
            echo "Thêm thất bại! " . $e->getMessage();
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
    
        // function getuserinfor($user,$password){
        //     try{
        //         $conn = connectdb();
        //         $stmt = $conn->prepare("SELECT * FROM user WHERE user='".$user."' AND password='".$password."' ");
        //         $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //         $kq=$stmt->fetchAll();
                
        //         echo "Thành công";
        //         getnewproduct_2table();
        //         include "./view/mainsanpham.php";
        //         return $kq;
               
        //     }catch (PDOException $e){
        //         echo " thất bại: " . $e->getMessage();
        //     }  
        //     }
            // function getnewuser_2table(){
            //     include_once "./modules/connectdb.php";  
            //     $conn = connectdb(); 
            //     $sql="SELECT user.id,  user.name, user.password, user.email,user.phone,user.address, loaiuser.nameloai 
            //     FROM user 
            //     INNER JOIN loaiuser ON user.id_loaiuser = loaiuser.id";
            //     return pdo_query($sql);
            // }
            // function getall_loaiuser(){
            //     $sql = "SELECT * FROM loaiuser";
            //     return pdo_query($sql);
            // }
            // function checkuser($name,$password){
            //     $sql="Select * FROM user WHERE name=? and password=?";
            //     return pdo_query_one($sql, $name,$password);
               
            // }
            // function get_user($id){
            //     $sql="Select * FROM user WHERE id=?";
            //     return pdo_query_one($sql, $id);
            // }

?>