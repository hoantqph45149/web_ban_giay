<?php
function insert_tintuc($name,$img,$mota,$chitiet,$day){
    $sql="insert into tintuc (name,img,mota,chitiet,day) values('$name','$img','$mota','$chitiet','$day')";
    pdo_execute($sql);
}
function loadall_tintuc(){
    $sql="select * from tintuc "; //order by id desc
    $listnews=pdo_query($sql);
    return $listnews;
}
function delete_tintuc($id){
    $sql="delete from tintuc where id=".$id;
    pdo_execute($sql);
}
function loadone_tintuc($id){
    $sql="select * from tintuc where id=".$id;
    $bv=pdo_query_one($sql);
    return $bv; 
}
function update_tintuc($id,$name,$imgPath,$mota,$chitiet){

    $sql = "UPDATE tintuc SET name='{$name}', img='{$imgPath}', mota='{$mota}', chitiet='{$chitiet}' where id=".$id;

    pdo_execute($sql);
}
?>