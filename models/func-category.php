<?php
require_once 'pdo.php';
    /**
     * Thêm loại mới
     * @param String $tendm, $uutien, $hienthi là tên loại
     * @throws PDOException lỗi thêm mới
     */
    // render category
    function render_category(){
        $sql = "SELECT * FROM category";
        return pdo_query($sql);
    }
    // function themdm($tendm, $uutien,$hienthi){
    //     try{
    //         $sql = "INSERT INTO danhmuc(tendm, uutien, hienthi) VALUES(?,?,?)";
    //         pdo_execute($sql, $tendm,$uutien,$hienthi);
    //         echo "Thêm danh mục mới thành công !";
    //     }catch (PDOException $e) {
    //         echo "Thêm thất bại! " . $e->getMessage();
    //     }
    // }
      /**
     * Cập nhật tên loại
     * @param int $id là mã loại cần cập nhật
     * @param String $tendm là tên loại mới
     * @throws PDOException lỗi cập nhật
     */
    // function updatedm($id, $tendm,$uutien,$hienthi){
    //     try{
    //         $sql = "UPDATE danhmuc SET tendm=?, uutien=?, hienthi=? WHERE id=?";
    //         pdo_execute($sql, $tendm,$uutien,$hienthi,$id);
    //         echo "Update danh mục thành công !";
    //     }catch (PDOException $e) {
    //         echo "Update thất bại! " . $e->getMessage();
    //     }
       
    // }
      /**
     * Xóa một hoặc nhiều loại
     * @param mix $id là mã loại hoặc mảng mã loại
     * @throws PDOException lỗi xóa
     */
    // function deldm($id){
    //     $sql = "DELETE FROM danhmuc WHERE id=?";
    //     if(is_array($id)){
    //         foreach ($id as $ma) {
    //             pdo_execute($sql, $ma);
    //         }
    //     }
    //     else{
    //         pdo_execute($sql, $id);
    //     }
    // }
    /**
     * Truy vấn tất cả các loại
     * @return array mảng loại truy vấn được
     * @throws PDOException lỗi truy vấn
     */
  
    /**
     * Truy vấn một loại theo mã
     * @param int $id là mã loại cần truy vấn
     * @return array mảng chứa thông tin của một loại
     * @throws PDOException lỗi truy vấn
      */
    // function getonedm($id){
    //     $sql = "SELECT * FROM danhmuc WHERE id=?";
    //     return pdo_query($sql,$id);
    // }
    
      /**
     * Kiểm tra sự tồn tại của một loại
     * @param int $id là mã loại cần kiểm tra
     * @return boolean có tồn tại hay không
     * @throws PDOException lỗi truy vấn
     */
    // function loai_exist($id){
    //     $sql = "SELECT count(*) FROM danhmuc WHERE id=?";
    //     return pdo_query_value($sql, $id) > 0;
    // }

?>