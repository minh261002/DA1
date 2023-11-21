<?php
function get_bill_unconfimred()
{
    $sql = 'SELECT * FROM bill WHERE status = 0';
    return pdo_query($sql);
}

function get_all_bill()
{
    $sql = 'SELECT * FROM bill';
    return pdo_query($sql);
}

function confirm_bill($bill_id)
{
    $sql = "UPDATE bill SET status = 1 WHERE id = ?";
    pdo_execute($sql, $bill_id);
}

function bill_details($id_bill)
{
    $sql = "SELECT * FROM bill_details WHERE id_bill= ?";
    return pdo_query($sql, $id_bill);
}

function bill_search($id_bill)
{
    $sql = "SELECT * FROM bill WHERE id = ?";
    return pdo_query_one($sql, $id_bill);
}

?>