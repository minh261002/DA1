<?php
// require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

// function hang_hoa_select_all(){
//     $sql = "SELECT * FROM hang_hoa";
//     return pdo_query($sql);
// }

function get_product_by_id($id){
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query_one($sql, $id);
}

function search($search) {
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
    return pdo_query($sql);
}

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

function product_view($id){
    $sql = "UPDATE product SET view = view + 1 WHERE id=?";
    pdo_execute($sql, $id);
}

function get_list_product($id, $limit)
{
    $sql = "SELECT * FROM product WHERE 1";
    if ($id > 0) {
        $sql .= " AND id_category= " . $id;
    }

    $sql .= " ORDER BY id DESC LIMIT " . $limit;
    return pdo_query($sql);
}

function show_product($list_product){
    $html_product='';

    foreach ($list_product as $pd) {
        extract ($pd);

        if(isset($sale) && $sale > 0){
            $discountAmount = $sale * $price / 100;
            $discountedPrice = $price - $discountAmount;

            $boxPrice='
                <div class="product-price">
                    <span class="product-origin">'.number_format($discountedPrice,0,',','.').' đ</span>
                    <span class="product-discount">'.number_format($price,0,',','.').' đ</span>
                </div>
            ';

            $boxSale = '
                <div class="product-status">
                    <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                        <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                            <img alt="" aria-hidden="true" src="https://tokyolife.vn/_next/static/media/tagsale.0850a4f6.svg" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                        </span>
                        <img alt="" srcset="/_next/static/media/tagsale.0850a4f6.svg 1x, /_next/static/media/tagsale.0850a4f6.svg 2x" src="/_next/static/media/tagsale.0850a4f6.svg" decoding="async" data-nimg="intrinsic" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                    </span>
                    <span class="percent-discount"> -'.$sale.'%</span>
                </div>';
        }else{
            $boxPrice= '
                <div class="product-price">
                    <span class="product-origin">'.number_format($price,0,',','.').' đ</span>
                </div>
            ';

            $boxSale='';
        }

        if($hot == 1){
            $hot = '
                <div class="selling">
                    <span>Bán chạy</span>
                </div>
            ';
        }else{
            $hot = '';
        }

        $link = "index.php?page=details&id=".$id;

        $html_product .= '
            <div class="product-item">
                <a href="'.$link.'">
                    <img class="product-image" src="'.$img.'" width="100%">
                </a>
                '. $hot. '
                <div class="product-content">
                    <a href="'.$link.'" class="name-product">Áo giữ nhiệt WM Air Nữ cổ tròn G9SMT024J</a>
                    '.$boxPrice.'
                </div>

                '. $boxSale .'
            </div>
        ';
    }

    return $html_product;
}
// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

function get_products_by_category($categoryId){
    $sql = "SELECT * FROM product WHERE id_category=?";
    return pdo_query($sql, $categoryId);
}

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }