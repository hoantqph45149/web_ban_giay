<?php 
function load_mausac($id)
{
    $sql = "select * from mausac where id=" . $id;
    $mausac = pdo_query($sql);
    return $mausac;
}

?>