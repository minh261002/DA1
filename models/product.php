<?php

require_once 'pdo.php';

function insert_product($id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot)
{

    $sql = "INSERT INTO product(id_product, size, color, quantity) VALUES ((?, ?, ?, ?)";
    return pdo_last_insert_id($sql, $id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot);
}


function render_allproduct()
{
    $sql = "SELECT * FROM product";
    return pdo_query($sql);
}

// function add_product($id, $id_category, $name, $img, $gallery, $info, $price, $sale, $view, $hot)
// {
//     try {
//         $sql = "INSERT INTO product(id_category, name, img, gallery, info, price, sale, view, hot, created_at) VALUES (?,?,?,?,?,?,?,?,?,NOW())";
//         pdo_execute($sql, $id_category, $name, $img_path, $jsonGallery, $info, $price, $sale, $view, $hot);
//         echo "Thêm thành công !";
//     } catch (PDOException $e) {
//         echo "Thêm thất bại: " . $e->getMessage();
//     }
// }


function getone_product($id)
{
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query($sql, $id);
}

function get_allvariant()
{
    $sql = "SELECT * FROM variant";
    return pdo_query($sql);
}

function admin_show_product_by_category($category_id)
{
    $sql = "UPDATE product SET hide = 0 WHERE id_category=?";
    return pdo_query($sql, $category_id);
}

function admin_hide_product_by_category($category_id)
{
    $sql = "UPDATE product SET hide = 1 WHERE id_category=?";
    return pdo_query($sql, $category_id);
}

function update_product($id, $id_category, $name, $img, $gallery, $info, $price, $sale, $view, $hot)
{
    try {
        $sql = "UPDATE product SET id_category=?, name=?, img=?, gallery=?, info=?, price=?, sale=?, view=?, hot=?, created_at=NOW(), updated_at=NOW() WHERE id=?";
        pdo_execute($sql, $id_category, $name, $img, json_encode($gallery, JSON_FORCE_OBJECT), $info, $price, $sale, $view, $hot, $id);
        echo "Chỉnh sửa thành công";
    } catch (PDOException $e) {
        echo "Chỉnh Sửa thất bại! " . $e->getMessage();
    }
}

function del_sp($id)
{
    $sql = "DELETE FROM product WHERE  id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id);
    }
}
function get_new_product()
{
    $currentDateTime = date('Y-m-d H:i:s');
    $threeDaysAgo = date('Y-m-d H:i:s', strtotime('-50 days', strtotime($currentDateTime)));

    $sql = "SELECT * FROM product WHERE hide = 0 AND created_at >= '$threeDaysAgo' ORDER BY id DESC LIMIT 7";
    return pdo_query($sql);
}

function get_product_by_id($id)
{
    $sql = "SELECT p.*, c.name AS category_name,c.id AS id_category
            FROM product AS p
            JOIN category AS c ON p.id_category = c.id
            WHERE p.hide = 0 AND p.id=?";
    return pdo_query_one($sql, $id);
}


function get_product_by_variant($id)
{
    $sql = "SELECT product.id, variant.* FROM product
    INNER JOIN variant ON product.id = variant.id_product
    WHERE product.hide = 0 AND product.id = ? AND quantity > 0";

    return pdo_query($sql, $id);
}


function get_product_flash_sale()
{
    $sql = "SELECT * FROM product WHERE hide = 0 AND sale > 50 ";
    return pdo_query($sql);
}

function get_hot_product()
{
    $sql = "
    SELECT product.*, SUM(bill_details.quantity) AS total_quantity, category.name AS category_name
    FROM product
    JOIN bill_details ON product.id = bill_details.id_product
    JOIN category ON product.id_category = category.id
    GROUP BY product.id, product.name, category.name
    ORDER BY total_quantity DESC
    LIMIT 10;
    ";
    return pdo_query($sql);
}

function search($search)
{
    $sql = "SELECT * FROM product WHERE hide = 0 AND name LIKE '%$search%'";
    return pdo_query($sql);
}

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

function sum_product()
{
    $sql = "SELECT SUM(quantity) AS sum_product FROM variant";
    return pdo_query_value($sql);
}

function product_view($id)
{
    $sql = "UPDATE product SET view = view + 1 WHERE hide = 0 AND id=?";
    pdo_execute($sql, $id);
}

function get_list_product($id)
{
    $sql = "SELECT * FROM product WHERE hide = 0 AND 1";
    if ($id > 0) {
        $sql .= " AND id_category= " . $id;
    }

    $sql .= " ORDER BY id DESC";
    return pdo_query($sql);
}

function show_product($list_product)
{
    $html_product = '';

    foreach ($list_product as $pd) {
        extract($pd);

        if (isset($sale) && $sale > 0) {
            $discountAmount = $sale * $price / 100;
            $discountedPrice = $price - $discountAmount;

            $boxPrice = '
                <div class="product-price">
                    <span class="product-origin">' . number_format($discountedPrice, 0, ',', '.') . ' đ</span>
                    <span class="product-discount">' . number_format($price, 0, ',', '.') . ' đ</span>
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
                    <span class="percent-discount"> -' . $sale . '%</span>
                </div>';
        } else {
            $boxPrice = '
                <div class="product-price">
                    <span class="product-origin">' . number_format($price, 0, ',', '.') . ' đ</span>
                </div>
            ';

            $boxSale = '';
        }

        if ($hot == 1) {
            $hot = '                    
                <div class="selling">
                    <span>Bán chạy</span>
                </div>
            ';
        } else {
            $hot = '
                <div class="selling" style="opacity:0">
                    <span>Bán chạy</span>
                </div>
            ';
        }

        $currentDateTime = date('Y-m-d H:i:s');

        $createdDate = strtotime($created_at);

        $currentDate = strtotime($currentDateTime);
        $newProduct = strtotime('-15 days', $currentDate);

        if ($createdDate >= $newProduct) {
            $new = '
                <div class="new-pd">
                    <img class="new-icon" src="uploads/new-icon.png" />
                </div>
            ';
        } else {
            $new = '';
        }

        // liên kêts
        $link = "index.php?page=details&id=" . $id;

        $html_product .= '
            <div class="product-item">
                <a href="' . $link . '">
                    <img class="product-image" src="uploads/' . $img . '" width="100%">
                </a>
                <div class="box-title flex">
                        ' . $hot . '
                        ' . $new . '
                </div>
                <div class="product-content">
                    <a href="' . $link . '" class="name-product">' . $name . '</a>
                    ' . $boxPrice . '
                </div>

                ' . $boxSale . '
            </div>
        ';
    }

    return $html_product;
}

function category_has_products($category_id)
{
    $sql = "SELECT COUNT(*) FROM product WHERE id_category = ?";
    return pdo_query($sql, $category_id);
}


// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

function get_view_product()
{
    $sql = "SELECT * FROM product WHERE hide = 0 ORDER BY view DESC LIMIT 5";
    return pdo_query($sql);
}

function get_products_by_category($categoryId)
{
    $sql = "SELECT * FROM product WHERE hide = 0 AND id_category=?";
    return pdo_query($sql, $categoryId);
}

function product_select_page()
{
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM product");
        $_SESSION['page_count'] = ceil((int) $row_count / 10.0);
    }
    if (isset($_REQUEST['page_no'])) {
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if ($_SESSION['page_no'] < 0) {
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if ($_SESSION['page_no'] >= $_SESSION['page_count']) {
        $_SESSION['page_no'] = 0;
    }

    $offset = $_SESSION['page_no'] * 10;

    $sql = "SELECT * FROM product WHERE hide=0 ORDER BY id LIMIT " . $offset . ", 10";

    return pdo_query($sql);
}