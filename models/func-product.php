<?php

    function render_allproduct(){
        $sql = "SELECT * FROM product";
            return pdo_query($sql);
    }

    // function getnewproduct(){
    //     $sql = "SELECT * FROM sanpham ORDER BY id desc";
    //     return pdo_query($sql);
    // }
    // function insert_sanpham($iddm, $name, $image, $price, $giacu){
    //     try{
    //         $sql = "INSERT INTO sanpham(iddm, name, image, price, giacu) VALUES (?,?,?,?,?)";
    //         pdo_execute($sql, $iddm, $name, $image, $price, $giacu);
    //         echo "Thêm thành công !";
    //     }
    //     catch (PDOException $e){
    //                 echo "Thêm thất bại: " . $e->getMessage();
    //              }
    // }
    // function getonesp($id){
    //     $sql = "SELECT * FROM sanpham WHERE id=?";
    //     return pdo_query($sql,$id);
    // }
    // function updatesp($id, $name, $image, $price, $giacu, $iddm) {
    //     try {
    //         $sql = "UPDATE sanpham SET name=?, image=?, price=?, giacu=?, iddm=? WHERE id=?";
    //         pdo_execute($sql, $name, $image, $price, $giacu, $iddm, $id);
    //         echo "Update thành công!";
    //     } catch (PDOException $e) {
    //         echo "Update thất bại! " . $e->getMessage();
    //     }
    // }
    // function delsp($id){
    //     $sql = "DELETE FROM sanpham WHERE  id=?";
    //     if(is_array($id)){
    //         foreach ($id as $ma) {
    //             pdo_execute($sql, $ma);
    //         }
    //     }
    //     else{
    //         pdo_execute($sql, $id);
    //     }
    // }
    // function get_product_detail($idproduct){
      
    //     $conn = connectdb();
    //     $sql="SELECT * FROM sanpham where id=".$idproduct;
       
    //      return pdo_query_one($sql);
    // }  
    // function render_allproduct(){
      
    //     $sql="SELECT * , category.name as category_name
    //     FROM product
    //     INNER JOIN category ON product.id_category = category.id  ORDER BY product.id desc" ;
     
    //     return pdo_query($sql);
    // }
    
 ?>