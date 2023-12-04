<?php


function view_product_admin()
{
    $sql = "SELECT product.*, category.name AS category_name 
            FROM product
            LEFT JOIN category ON product.id_category = category.id
            ORDER BY product.view DESC
            LIMIT 10";
    return pdo_query($sql);
}

function buy_product_admin()
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

function arrange($selectedMonth)
{
    $sql = "
    SELECT DATE_FORMAT(bill.created_at, '%Y-%m') AS month,
    SUM((bill_details.price * bill_details.quantity) - (bill.voucher)) AS total_revenue
    FROM bill
    INNER JOIN bill_details ON bill.id = bill_details.id_bill
    WHERE bill.status = 5
    AND DATE_FORMAT(bill.created_at, '%m') = ?
    GROUP BY DATE_FORMAT(bill.created_at, '%Y-%m');
    ";

    return pdo_query($sql, $selectedMonth);
}

function arrange_not_success($selectedMonth)
{
    $sql = "
    SELECT DATE_FORMAT(bill.created_at, '%Y-%m') AS month,
    SUM((bill_details.price * bill_details.quantity) - (bill.voucher)) AS total_revenue
    FROM bill
    INNER JOIN bill_details ON bill.id = bill_details.id_bill
    WHERE bill.status != 5 AND bill.status != 4
    AND DATE_FORMAT(bill.created_at, '%m') = ?
    GROUP BY DATE_FORMAT(bill.created_at, '%Y-%m');
    ";

    return pdo_query($sql, $selectedMonth);
}

function arrange_cancel($selectedMonth)
{
    $sql = "
    SELECT DATE_FORMAT(bill.created_at, '%Y-%m') AS month,
    SUM((bill_details.price * bill_details.quantity) - (bill.voucher)) AS total_revenue
    FROM bill
    INNER JOIN bill_details ON bill.id = bill_details.id_bill
    WHERE bill.status = 4
    AND DATE_FORMAT(bill.created_at, '%m') = ?
    GROUP BY DATE_FORMAT(bill.created_at, '%Y-%m');
    ";

    return pdo_query($sql, $selectedMonth);
}
?>