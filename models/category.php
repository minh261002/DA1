<?php
// require_once 'pdo.php';
// Lấy tất cả danh mục cha
function getParentCategories(){
    $sql = "SELECT * FROM category WHERE parent_id IS NULL";
    return pdo_query($sql);
}

// Lấy tất cả danh mục con dựa trên ID của danh mục cha
function getChildCategories($parentId){
    $sql = "SELECT * FROM category WHERE parent_id = ?";
    return pdo_query($sql, $parentId);
}

function get_list_category($id) {
    $sql = "SELECT * FROM category WHERE parent_id = ?";
    return pdo_query($sql, $id);
}

function get_category($id) {
    $sql = "SELECT * FROM category WHERE id = ?";
    return pdo_query_one($sql, $id);
}

function get_products_by_category_ids(array $category_ids) {
    $in  = str_repeat('?,', count($category_ids) - 1) . '?';
    $sql = "SELECT * FROM product WHERE id_category IN ($in)";
    $result = pdo_query($sql, ...$category_ids);
    
    return $result;
}

function set_home_category(){
    $sql = "SELECT * FROM category WHERE home = 1";
    return pdo_query($sql);
}

function show_category_home(){
    $html_category = '';
    $list_category = set_home_category();

    foreach ($list_category as $category) {
        extract($category);

        if ($home == 1) {
            $html_category .= '
                <div class="category-item">
                    <a href="index.php?page=product&id='.$id.'">
                        <img src="assets/img/'.$avatar.'">
                        <p>'.$name.'</p>
                    </a>
                </div>
            ';
        }
    }

    return $html_category;
}
// /**
//  * Thêm loại mới
//  * @param String $ten_loai là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function loai_insert($ten_loai){
//     $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
//     pdo_execute($sql, $ten_loai);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function loai_update($ma_loai, $ten_loai){
//     $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
//     pdo_execute($sql, $ten_loai, $ma_loai);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function loai_delete($ma_loai){
//     $sql = "DELETE FROM loai WHERE ma_loai=?";
//     if(is_array($ma_loai)){
//         foreach ($ma_loai as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_loai);
//     }
// }
// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_select_all(){
//     $sql = "SELECT * FROM loai";
//     return pdo_query($sql);
// }
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_loai là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_select_by_id($ma_loai){
//     $sql = "SELECT * FROM loai WHERE ma_loai=?";
//     return pdo_query_one($sql, $ma_loai);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_loai là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function loai_exist($ma_loai){
//     $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
//     return pdo_query_value($sql, $ma_loai) > 0;
// }