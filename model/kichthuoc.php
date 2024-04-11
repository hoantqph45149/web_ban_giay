<?php 
   function loadall_kichthuoc(){
    $sql="select * from kichthuoc "; //order by id desc
    $listkt=pdo_query($sql);
    return $listkt;
}