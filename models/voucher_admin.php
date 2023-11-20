<?php
function show_voucher()
{
    $sql = "SELECT * FROM voucher";
    return pdo_query($sql);
}

function get_voucher_id($id_voucher)
{
    $sql = "SELECT * FROM voucher WHERE id = ?";
    return pdo_query_one($sql, $id_voucher);
}

function add_voucher($name_voucher, $value_voucher, $start_voucher, $end_voucher)
{
    $sql = "INSERT INTO voucher(name, value, start, end) VALUES(?, ?, ?, ?)";
    pdo_execute($sql, $name_voucher, $value_voucher, $start_voucher, $end_voucher);
}

function update_voucher($id_voucher, $name_voucher, $value_voucher, $start_voucher, $end_voucher)
{
    $sql = "UPDATE voucher SET name = ?, value = ?, start = ?, end = ? WHERE id = ?";
    pdo_execute($sql, $name_voucher, $value_voucher, $start_voucher, $end_voucher, $id_voucher);
}

function delete_voucher($id_voucher)
{
    $sql = "DELETE FROM voucher WHERE id = ?";
    if (is_array($id_voucher)) {
        foreach ($id_voucher as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_voucher);
    }
}
?>