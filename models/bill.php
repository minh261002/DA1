<?php
function get_bill_unconfimred()
{
    $sql = 'SELECT * FROM bill WHERE status = 0';
    return pdo_query($sql);
}

function get_all_bill()
{
    $sql = 'SELECT * FROM bill WHERE 1';
    if (isset($_GET['bill']) && $_GET['bill'] == 0) {
        $sql .= ' AND status = 0';
    }
    if (isset($_GET['bill']) && $_GET['bill'] == 1) {
        $sql .= ' AND status = 1';
    }
    if (isset($_GET['bill']) && $_GET['bill'] == 2) {
        $sql .= ' AND status = 2';
    }
    if (isset($_GET['bill']) && $_GET['bill'] == 3) {
        $sql .= ' AND status = 3';
    }
    if (isset($_GET['bill']) && $_GET['bill'] == 4) {
        $sql .= ' AND status = 4';
    }
    if (isset($_GET['bill']) && $_GET['bill'] == 5) {
        $sql .= ' AND status = 5';
    }
    $sql .= ' ORDER BY id DESC';
    return pdo_query($sql);
}

function get_bill_by_id($id_bill)
{
    $sql = "SELECT bill.*, bill_details.* 
    FROM bill 
    INNER JOIN bill_details ON bill.id = bill_details.id_bill 
    WHERE bill.id = ?";
    return pdo_query($sql, $id_bill);
}

function confirm_bill($bill_id)
{
    $sql = "UPDATE bill SET status = 1 WHERE id = ?";
    pdo_execute($sql, $bill_id);
}

function bill_detail_search($id_bill)
{
    $sql = "SELECT * FROM bill_details WHERE id_bill= ?";
    return pdo_query($sql, $id_bill);
}

function bill_search($id_bill)
{
    $sql = "SELECT * FROM bill WHERE id = ?";
    return pdo_query_one($sql, $id_bill);
}

function get_bill_user($id_user, $order)
{
    if ($order !== null) {
        $sql = "SELECT * FROM bill WHERE 1";
        if ($order == 0) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($order == 1) {
            $sql .= " AND id_user = ? AND status = ?";
        } else if ($order == 2) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($order == 3) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($order == 4) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($order == 5) {
            $sql .= " AND id_user = ? AND status = ?";
        }
        $sql .= " ORDER BY id DESC";
        return pdo_query($sql, $id_user, $order);
    } else {
        $sql = "SELECT * FROM bill WHERE id_user = ? ORDER BY id DESC";
        return pdo_query($sql, $id_user);
    }
}

function pay_bill($id_bill)
{
    $sql = "UPDATE bill set payment = 4 WHERE payment = 1 AND id = ? ";
    pdo_execute($sql, $id_bill);
}

function acp_bill($id_bill)
{
    $sql = "UPDATE bill SET status = 5 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

function set_bill_1($id_bill)
{
    $sql = "UPDATE bill SET status = 1 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

function set_bill_2($id_bill)
{
    $sql = "UPDATE bill SET status = 2 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

function set_bill_3($id_bill)
{
    $sql = "UPDATE bill SET status = 3 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

function set_bill_4($id_bill)
{
    $sql = "UPDATE bill SET status = 4 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

?>