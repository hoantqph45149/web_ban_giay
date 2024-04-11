<?php
function bill_chi_tiet($listbill)
{
    $tong = 0;
    $tien = 0;
    $phi = 0;
    $i = 0;
    echo ' 
        <tr>
            <th>Sản Phẩm</th>
            <th>Đơn Gía</th>
            <th>Thành Tiền</th>
        </tr>';

    foreach ($listbill as $cart) {
        $phi = 15000;
        $cart['total_money'] = $cart['price'] * $cart['num'];
        $tien += $cart['total_money'];
        $tong = $tien + $phi;
        echo '<tr>
                
                <td>' . $cart['name'] . '</td>
                <td>' . number_format($cart['price']) . "" . ' VND</td>
                <td>' . number_format($cart['total_money']) . "" . ' VND</td>
            </tr> ';
        $i += 1;
    }
    echo '
        <tr>
            <td colspan="2" class="shipping-cost">Phí vận chuyển</td>
            <td>' . number_format($phi) . "" . ' VND</td>
        </tr>
        <tr>
            <td colspan="2">Tổng đơn hàng</td>
            <td style="color:chocolate" >' . number_format($tong) . "" . ' VND</td>
        </tr>
             ';
            //  var_dump($tong);
}
function tonghang()
{
    $tong = 0;
    $phi = 0;
    $tamtinh = 0;
    foreach ($_SESSION['cart'] as $mycart) {
        $thanhtien = $mycart[4] * $mycart[3];
        $phi = 15000;
        $tamtinh += $thanhtien;
        $tong = $tamtinh + $phi;
    }
    return $tong;
}
function insert_cart($iduser, $order_id, $product_id, $name, $img, $price, $num, $total_money,$size)
{
    $sql = "insert into cart(iduser,order_id,product_id,name,img,price,num,total_money,size) values ('$iduser','$order_id','$product_id','$name','$img','$price','$num','$total_money','$size')";
    return pdo_execute($sql);
    echo ($sql);
}
function loadall_cart($order_id)
{
    $sql = "select * from cart where order_id=" . $order_id;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($order_id)
{
    $sql = "select * from cart where order_id=" . $order_id;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function delete_cart($order_id)
{
    $sql = "delete from cart where order_id=" . $order_id;
    pdo_execute($sql);
}
function insert_bill($user_id, $fullname,  $email, $address, $phone_number, $pttt, $note, $order_date, $total_money)
{
    $sql = "insert into bill(user_id,fullname,email,address,phone_number,pttt,note,order_date,total_money) values ('$user_id','$fullname',' $email','$address','$phone_number','$pttt','$note','$order_date','$total_money')";
    return pdo_execute_return_lastInsertId($sql);
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đơn hàng đã được xác nhận";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

function pttt($n)
{
    switch ($n) {
        case '1':
            $tt = "Thanh toán bằng VNPAY";
            break;
        case '2':
            $tt = "Kiểm tra thanh toán";
            break;
        case '3':
            $tt = "Paypal";
            break;
        default:
            $tt = "Kiểm tra thanh toán";
            break;
    }
    return $tt;
}
function loadall_bill_admin()
{
    $sql = "select * from bill";
    $listbill_admin = pdo_query($sql);
    return $listbill_admin;
}
function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function delete_bill($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}
function update_bill($id, $iduser, $fullname,$address,$phone_number)
{
    $sql = "update bill set user_id='" . $iduser . "',fullname='" . $fullname . "',address='" . $address . "',phone_number='" . $phone_number . "' where id=" . $id;
    pdo_execute($sql);
}
 function loadall_bill($iduser){
    $sql="select * from bill where 1";
    if($iduser>0) $sql.=" AND user_id='".$iduser."'";
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
    echo $sql;
}

function update_huydon($id,$huydon) 
{
    $sql = "UPDATE bill SET huydon = '{$huydon}' WHERE id = '{$id}'";
    pdo_execute($sql);
}
// function loadall_bill_kyw($kyw="",$iduser=0){
//     $sql="select * from bill where 1";
//     if($iduser>0) $sql.= " AND user_id=".$iduser;
//     if($iduser!="") $sql.= " AND id like '%".$kyw."%'";
//     $sql.= " order by id desc";
//     $listbill=pdo_query($sql);
//     return $listbill;
//  }
function upadte_ttdh($id , $ttdh){
    $sql = "UPDATE bill SET status = '{$ttdh}' WHERE id = '{$id}'";
    pdo_execute($sql);
}