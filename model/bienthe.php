<?php 
function load_bienthe($sp_id)
{
    $sql = "select * from bienthe where masp=" . $sp_id;
    $bienthe = pdo_query($sql);
    return $bienthe;
}
function load_mausac_bienthe($ms_id)
{
    $sql = "select * from bienthe where mams=" . $ms_id;
    $msbt = pdo_query_one($sql);
    return $msbt;
}

?>