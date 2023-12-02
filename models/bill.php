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

function get_bill_user($id_user, $st)
{
    if ($st !== null) {
        $sql = "SELECT * FROM bill WHERE 1";
        if ($st == 0) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($st == 1) {
            $sql .= " AND id_user = ? AND status = ?";
        } else if ($st == 2) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($st == 3) {
            $sql .= " AND id_user = ? AND status = ?";
        } elseif ($st == 4) {
            $sql .= " AND id_user = ? AND status = ?";
        }
        return pdo_query($sql, $id_user, $st);
    } else {
        $sql = "SELECT * FROM bill WHERE id_user = ?";
        return pdo_query($sql, $id_user);
    }
}

function acp_bill($id_bill)
{
    $sql = "UPDATE bill SET status = 5 WHERE id = ?";
    pdo_execute($sql, $id_bill);
}

?>