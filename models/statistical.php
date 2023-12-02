<?php
function arrange_product_buy()
{
    $sql = "
        SELECT products.id, products.name, COUNT(bill_details.id) AS total_quantity
        FROM products
        JOIN bill_details ON products.id = bill_details.id_product
        GROUP BY products.id
        ORDER BY total_quantity DESC;
    ";
    return pdo_query($sql);
}

function view_product_admin()
{
    $sql = "SELECT p.*, c.name AS category_name 
            FROM product p
            LEFT JOIN category c ON p.id_category = c.id
            ORDER BY p.view DESC
            LIMIT 10";
    return pdo_query($sql);
}

?>