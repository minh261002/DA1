<?php
// require_once 'pdo.php';

function get_category()
{
    $sql = "SELECT * FROM category WHERE home !=2 AND hide = 0";
    return pdo_query($sql);
}

function admin_get_category()
{
    $sql = "SELECT * FROM category";
    return pdo_query($sql);
}

function get_category_by_id($category_id)
{
    $sql = "SELECT * FROM category WHERE id=? AND hide = 0";
    return pdo_query_one($sql, $category_id);
}

function set_home_category()
{
    $sql = "SELECT * FROM category WHERE home = 1 AND hide = 0";
    return pdo_query($sql);
}

function show_category_home()
{
    $html_category = '';
    $list_category = set_home_category();

    foreach ($list_category as $category) {
        extract($category);

        if ($home == 1) {
            $html_category .= '
                <div class="category-item">
                    <a href="index.php?page=product&id=' . $id . '">
                        <img src="assets/img/' . $avatar . '">
                        <p>' . $name . '</p>
                    </a>
                </div>
            ';
        }
    }

    return $html_category;
}


function admin_hide_category($category_id)
{
    $sql = "UPDATE category SET hide = 1 WHERE id=?";
    pdo_execute($sql, $category_id);
}

function admin_show_cattegory($category_id)
{
    $sql = "UPDATE category SET hide = 0 WHERE id=?";
    pdo_execute($sql, $category_id);
}

function category_exist($category_name)
{
    $sql = "SELECT name FROM category";
    $category = pdo_query($sql);
    return $category ? true : false;
}
// /**
//  * Thêm loại mới
//  * @param String $ten_loai là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function category_insert($category_name, $category_img, $category_home)
{
    $sql = "INSERT INTO category(name, avatar, home) VALUES(?,?,?)";
    pdo_execute($sql, $category_name, $category_img, $category_home);
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_loai là mã loại cần cập nhật
//  * @param String $ten_loai là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */


function update_category($category_id, $category_img, $category_name, $category_home, $category_hide)
{
    if ($category_img != '') {
        $sql = "UPDATE category SET avatar=?, name=?, home=?, hide=? WHERE id=?";
        pdo_execute($sql, $category_img, $category_name, $category_home, $category_hide, $category_id);
    } else {
        $sql = "UPDATE category SET name=?, home=?,hide =? WHERE id=?";
        pdo_execute($sql, $category_name, $category_home, $category_hide, $category_id);
    }
}

function get_name_category($id_category)
{
    $sql = "SELECT name FROM category WHERE id=?";
    return pdo_query_one($sql, $id_category);
}

// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_loai là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function category_delete($id_category)
{
    $sql = "DELETE FROM category WHERE id=?";
    pdo_execute($sql, $id_category);
}

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