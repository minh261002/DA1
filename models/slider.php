<?php
function create_list_slider($name)
{
    $sql = "INSERT INTO list_sliders (name) VALUES (?)";
    pdo_execute($sql, $name);
}
?>