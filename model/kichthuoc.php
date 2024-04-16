<?php
function loadall_kichthuoc($id_sp)
{
    $sql = "select * from kichthuoc where id_sanpham =" . $id_sp;
    $listkt = pdo_query($sql);
    return $listkt;
}
function loadall_kichthuoc_admin($id_sp)
{
    $sql = "SELECT * FROM kichthuoc WHERE 1";
    if($id_sp != 0){
        $sql .= " AND id_sanpham = " . $id_sp;
    }
    $list_kt = pdo_query($sql);
    return $list_kt;
}

function insert_kichthuoc($id_sp, $kichthuoc, $soluong)
{
    $sql = "insert into kichthuoc(tenkc,soluong,id_sanpham) values('$kichthuoc' , '$soluong' , '$id_sp')";
    pdo_execute($sql);
}
function delete_kichrhuoc($id){
    $sql="delete from kichthuoc where id=".$id;
    pdo_execute($sql);
}
function loadone_kichthuoc($id)
{
    $sql = "select * from kichthuoc where id=" . $id;
    $kt = pdo_query_one($sql);
    return $kt;
}
function update_kichthuoc($id,$id_sp,$kichthuoc,$soluong){
    $sql="update kichthuoc set tenkc='".$kichthuoc."' , soluong='".$soluong."', id_sanpham='".$id_sp."' where id=".$id;
    pdo_execute($sql);
}