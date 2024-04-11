<?php
function insert_sanpham($tensp,$giasp,$hinh,$mota,$soluong,$iddm,$date){
    $sql="insert into sanpham(title,price,img,mota,soluong,category_id,updated_at ) values('$tensp','$giasp','$hinh','$mota','$soluong','$iddm','$date')";
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
 function loadall_sanpham_home(){
     $sql="select * from sanpham where 1 order by id desc limit 0,6 ";
     $listsp=pdo_query($sql);
     return $listsp;
 }

function loadall_sanpham(){
    $sql="select * from sanpham "; //order by id desc
    $listsp=pdo_query($sql);
    return $listsp;
}
function loadall1_sanpham($kyw,$iddm=0){
    $sql="select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and title like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and category_id ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsp=pdo_query($sql);
    return $listsp;
}
function loadone_sanpham($id){
    $sql="select * from sanpham where id=".$id;
    $sp=pdo_query_one($sql);
    return $sp; 
}
function update_sanpham($id,$category_id, $tensp, $giasp, $moTa, $soluong, $imgPath)
{
    $sql = "UPDATE sanpham SET category_id = '{$category_id}', title = '{$tensp}', price = '{$giasp}', img = '{$imgPath}', mota = '{$moTa}', soluong = '{$soluong}' WHERE id = '{$id}'";
    pdo_execute($sql);
}
//tên sản phẩm theo danh mục
function load_ten_spdm($iddm){
    if ($iddm>0) {
        $sql="select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    } 
}
function list_of_price(){
   $list = [
          1 => " < 10 triệu",
          2 => " 10 -> 20 triệu",
          3 => " 20 -> 30 triệu",
          4 => " > 30 triệu",

   ];
   return $list;

}
function filterofprice($min,$max){

    $sql = "SELECT * from sanpham where ";
     if($min == null ){
        $sql.= "price < $max";
     }elseif($max == null ){
        $sql.= "price > $min";
     }else{
        $sql.= "price >= $min AND price <= $max";
     }
     $filtersp=pdo_query($sql);
     return $filtersp;
}
// function load_sanpham_cungloai($id,$iddm){
//     $sql="select * from sanpham where iddm=".$iddm." AND id<>".$id;
//     $listsp=pdo_query($sql);
//     return $listsp;
// }
// function loadall_sanpham_top10(){
//     $sql="select * from sanpham where 1 order by view desc limit 0,10";
//     $listsp=pdo_query($sql);
//     return $listsp;
// }
?>