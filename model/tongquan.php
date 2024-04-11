<?php
    function soluongdonhang(){
        $sql = "select count(*) as SoLuongdh from `bill`";
        $donhang=pdo_query($sql);
        return $donhang;
    }
     function soluongloaihang(){
         $sql = "select count(*) as SoLuonglh from `danhmuc`";
         $loaihang=pdo_query($sql);
         return $loaihang;
     }
     function soluongsanpham(){
         $sql = "select count(*) as SoLuongsp from `sanpham`";
         $sanpham=pdo_query($sql);
         return $sanpham;
     }
     function soluongkhachhang(){
         $sql = "select count(*) as SoLuongkh from `taikhoan`";
         $khachhang=pdo_query($sql);
         return $khachhang;
     }
     function loadall_thongke(){
         $sql="select danhmuc.id as loaihang, danhmuc.name as tenloaihang, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
         $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.category_id";
         $sql.= " group by danhmuc.id order by danhmuc.id desc";
         $listhongke=pdo_query($sql);
         return $listhongke;
      }
    //   function bieudo_donhang(){
    //     $sql = "SELECT status, COUNT(status) AS size_status FROM orders GROUP BY status";
    //     $trangthaidh=pdo_query($sql);
    //     return $trangthaidh;
    //  }
    //  function ttdh($n){
    //     switch ($n) {
    //         case '0':
    //             $tt="Đơn hàng mới";
    //             break;
    //        case '1':
    //             $tt="Chưa xử lý";
    //             break;
    //         case '2':
    //             $tt="Đang giao hàng";
    //             break;
    //         case '3':
    //              $tt="Đã giao hàng";
    //               break;
            
    //         default:
    //            $tt="Đơn hàng mới";
    //             break;
    //     }
    //     return $tt;
    // }
?>