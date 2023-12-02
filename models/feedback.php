<?php

function user_inser_feddback($id_user, $id_product, $rating, $content)
{
    $sql = "INSERT INTO feedback(id_user, id_product, star, content, created_at) VALUES (?, ?, ?, ?, NOW())";
    pdo_execute($sql, $id_user, $id_product, $rating, $content);
}

function feedback_confirm($id_bill_details)
{
    $sql = "UPDATE bill_details SET feedback = 1 WHERE id = ?";
    pdo_execute($sql, $id_bill_details);
}

function show_feedback_by_id_product($id_product)
{
    $sql = "SELECT * FROM feedback WHERE id_product = ?";
    return pdo_query($sql, $id_product);
}

function show_user_feedback($id_user)
{
    $sql = "SELECT * FROM user WHERE id = ?";
    return pdo_query($sql, $id_user);
}

?>