<?php
function get_bill_unconfimred()
{
    $sql = "SELECT bill.*, bill_details.*, user.username AS user_username
    FROM bill
    LEFT JOIN bill_details ON bill.id = bill_details.id_bill
    LEFT JOIN user ON bill.id_user = user.id
    WHERE bill.status = 0";

    return pdo_query($sql);
}

function confirm_bill($bill_id)
{
    $sql = "UPDATE bill SET status = 1 WHERE id = ?";
    pdo_execute($sql, $bill_id);
}

?>