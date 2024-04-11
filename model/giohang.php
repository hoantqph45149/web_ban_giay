<?php
function insert_cart($idpro,$img,$name,$price,$number,$thanhtien,$idorder){
    $sql="insert into cart(product_id,img,name,price,num,total_money,order_id) 
    values ('$idpro','$img','$name','$price','$number','$thanhtien','$idorder')";
    return pdo_execute($sql);
}
?>