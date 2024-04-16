<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 1) {
    include "../model/pdo.php";
    include "./header.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/tintuc.php";
    include "../model/lienhe.php";
    include "../model/binhluan.php";
    include "../model/cart.php";
    include "../model/kichthuoc.php";
    include "../model/tongquan.php";

    $dm = null;
    //controller
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {

            case 'home':
                include 'home.php';
                break;
 ///////////////////////////////////////////////////danhmuc//////////////////////////////////////////////
            case 'tmdanhmuc':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $tenloai = $_POST['tenloai'];

                    $error_messages = array();

                    if (empty($tenloai)) {
                        $error_messages['tenloai'] = "Vui lòng nhập tên danh mục.";
                    }
                    if (empty($error_messages)) {
                        insert_danhmuc($tenloai);
                        $thongbao = "Thêm thành công";
                    }
                }
                include "danhmuc/themmoi.php";
                break;
            case 'dsdanhmuc':
                $listdm = loadall_danhmuc();
                include "danhmuc/danhsach.php";
                break;
            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_danhmuc($_GET['id']);
                }
                $listdm = loadall_danhmuc();
                include "danhmuc/danhsach.php";
                break;
            case 'suadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                $listdm = loadall_danhmuc();
                include "danhmuc/capnhap.php";
                break;
            case 'cndm':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $id = $_POST['id'];
                    $tenloai = $_POST['tenloai'];
                    $error_messages = array();

                    if (empty($tenloai)) {
                        $error_messages['tenloai'] = "Vui lòng nhập tên danh mục.";
                    }
                    if (empty($error_messages)) {
                        update_danhmuc($id, $tenloai);
                        $thongbao = 'Cập nhật thành công';
                    }
                }
                $dm = loadone_danhmuc($id);
                include "danhmuc/capnhap.php";
                break;
 //////////////////////////////// kích thước ///////////////////////////////////////////
            case 'dskichthuoc':
                $id_sanpham = 0;
                if(isset($_POST['gui'])){
                    $id_sanpham = $_POST['idsp'];
                     
                } 
                $listkt = loadall_kichthuoc_admin($id_sanpham);             
                $listsp = loadall_sanpham();
                include "kichthuoc/danhsach.php";
                break;
            case 'tmkichthuoc':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $idsp = $_POST['idsp'];
                    $kicthuoc = $_POST['kichthuoc'];
                    $soluong = $_POST['soluong'];

                    $error_messages = array();

                    if (empty($idsp)) {
                        $error_messages['idsp'] = "Vui lòng chọn sản phẩm.";
                    }
                    if (empty($kicthuoc)) {
                        $error_messages['kichthuoc'] = "Vui lòng nhập kích thước.";
                    }
                    if (empty($soluong)) {
                        $error_messages['soluong'] = "Vui lòng nhập số lượng.";
                    }
                    if (empty($error_messages)) {
                        insert_kichthuoc($idsp, $kicthuoc, $soluong);
                        $thongbao = "Thêm thành công";
                    }
                }
                $listsp = loadall_sanpham();
                include "kichthuoc/themmoi.php";
                break;
            case 'xoakt':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_kichrhuoc($_GET['id']);
                }
                $listkt = loadall_kichthuoc_admin(0);
                include "kichthuoc/danhsach.php";
                break;
            case 'suakt':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $kt = loadone_kichthuoc($_GET['id']);
                }
                $listsp = loadall_sanpham();
                include "kichthuoc/capnhat.php";
                break;
            case 'cnkt':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $id = $_POST['id'];
                    $idsp = $_POST['idsp'];
                    $kicthuoc = $_POST['kichthuoc'];
                    $soluong = $_POST['soluong'];

                    $error_messages = array();

                    if (empty($kicthuoc)) {
                        $error_messages['kichthuoc'] = "Vui lòng nhập kích thước.";
                    }
                    if (empty($idsp)) {
                        $error_messages['idsp'] = "Vui lòng chọn sản phẩm.";
                    }
                    if (empty($soluong)) {
                        $error_messages['soluong'] = "Vui lòng nhập kích thước.";
                    }
                    if (empty($error_messages)) {
                        update_kichthuoc($id, $idsp, $kicthuoc, $soluong);
                        $thongbao = 'Cập nhật thành công';
                    }
                }
                $listsp = loadall_sanpham();
                $kt = loadone_kichthuoc($id);
                include "kichthuoc/capnhat.php";
                break;
///////////////////////////////////////////////////////////sản phẩm/////////////////////////////////////////////////////
            case 'dstsp':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $mausac = $_POST['mausac'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $soluong = $_POST['soluong'];
                    $updated_at = date('d/m/Y');
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);

                    $error_messages = array();

                    if (empty($iddm)) {
                        $error_messages['iddm'] = "Vui lòng chọn danh mục.";
                    }

                    if (empty($tensp)) {
                        $error_messages['tensp'] = "Tên sản phẩm không được để trống.";
                    }
                    
                    if (empty($mausac)) {
                        $error_messages['mausac'] = "Màu sắc phẩm không được để trống.";
                    }


                    if (empty($giasp)) {
                        $error_messages['giasp'] = "Gía sản phẩm không được để trống.";
                    }

                    if (empty($mota)) {
                        $error_messages['mota'] = "Mô tả không được để trống.";
                    }

                    if (empty($soluong)) {
                        $error_messages['soluong'] = "Số lượng không được để trống.";
                    }

                    if (empty($hinh)) {
                        $error_messages['hinh'] = "Vui lòng chọn hình ảnh.";
                    }

                    if (empty($error_messages)) {

                        insert_sanpham($tensp, $giasp, $hinh, $mausac, $mota, $soluong, $iddm, $updated_at);
                        $thongbao = 'Thêm thành công';
                    }
                }
                $listdm = loadall_danhmuc();
                include "sanpham/themmoi.php";
                break;
            case 'dssp':
                $listsp = loadall_sanpham();
                include "sanpham/danhsach.php";
                break;
            case 'xoasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_sanpham($_GET['id']);
                }
                $listsp = loadall_sanpham();
                include "sanpham/danhsach.php";
                break;
            case 'suasp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $sp = loadone_sanpham($_GET['id']);
                }
                $listdm = loadall_danhmuc();
                include "sanpham/capnhat.php";
                break;
            case 'cnsp':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $id = $_POST['id'];
                    $category_id = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $mausac = $_POST['mausac'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $soluong = $_POST['soluong'];
                    $imguploaded = $_POST['img-uploaded'];
                    $hinh = $_FILES['hinh'];
                    $target_dir = "../upload/";
                    if ($hinh['size'] > 0) {
                        $imgPath = $target_dir . basename($_FILES['hinh']['name']);
                        move_uploaded_file($hinh['tmp_name'], $imgPath);
                    } else if ($imguploaded) {
                        $imgPath = $imguploaded;
                    } else {
                        $imgPath = '';
                    }

                    $error_messages = array();

                    if (empty($category_id)) {
                        $error_messages['iddm'] = "Vui lòng chọn danh mục.";
                    }

                    if (empty($tensp)) {
                        $error_messages['tensp'] = "Tên sản phẩm không được để trống.";
                    }
                    
                    if (empty($mausac)) {
                        $error_messages['mausac'] = "Màu sắc phẩm không được để trống.";
                    }

                    if (empty($giasp)) {
                        $error_messages['giasp'] = "Gía sản phẩm không được để trống.";
                    }

                    if (empty($mota)) {
                        $error_messages['mota'] = "Mô tả không được để trống.";
                    }

                    if (empty($soluong)) {
                        $error_messages['soluong'] = "Số lượng không được để trống.";
                    }


                    if (empty($error_messages)) {

                        update_sanpham($id, $category_id, $tensp, $giasp, $mota, $soluong, $imgPath, $mausac);
                        $thongbao = 'Cập nhật thành công';
                    }
                }
                $listdm = loadall_danhmuc();
                $sp = loadone_sanpham($id);
                include "sanpham/capnhat.php";
                break;

/////////////////////////////////////////////////////////// khách hàng///////////////////////////////////////////////////
            case 'dskh':
                $listTaiKhoan_user = loadAllTaiKhoan_user();
                include "khachhang/dskhachhang.php";
                break;
            case 'xoatk':
                if (isset($_GET['id']) && $_GET['id']) {
                    deleteTaiKhoan($_GET['id']);
                }
                $listTaiKhoan = loadAllTaiKhoan_user();
                include "khachhang/dskhachhang.php";
                break;

 ////////////////////////////////////////////////////////////  thành viên ///////////////////////////////////////////////
            case 'dstv':
                $listTaiKhoan_tv = loadAllTaiKhoan_tv();
                include "thanhvien/danhsach.php";
                break;
            case 'xoatv':
                if (isset($_GET['id']) && $_GET['id']) {
                    deleteTaiKhoan($_GET['id']);
                }
                $listTaiKhoan_tv = loadAllTaiKhoan_tv();
                include "thanhvien/danhsach.php";
                break;
            case 'suatv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $one_tv = loadone_tv($_GET['id']);
                }
                include "thanhvien/capnhat.php";
                break;
            case 'dsttv':
                if (isset($_POST['gui'])) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['pass'];
                    $phone_number = $_POST['sdt'];
                    $fullname = $_POST['fullname'];
                    $address = $_POST['address'];
                    $role_id = $_POST['role_id'];

                    $error_messages = array();

                    if (empty($email)) {
                        $error_messages['email'] = "Email không được để trống.";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error_messages['email'] = "Email không hợp lệ.";
                    }


                    if (empty($username)) {
                        $error_messages['username'] = "Tên tài khoản không được để trống.";
                    }


                    if (empty($password)) {
                        $error_messages['password'] = "Mật khẩu không được để trống.";
                    }

                    if (empty($phone_number)) {
                        $error_messages['phone_number'] = "Số điện thoại không được để trống.";
                    }


                    if (empty($fullname)) {
                        $error_messages['fullname'] = "Họ và tên không được để trống.";
                    }


                    if (empty($address)) {
                        $error_messages['address'] = "Địa chỉ không được để trống.";
                    }

                    if (empty($error_messages)) {
                        insertTaiKhoan_tv($username, $fullname, $phone_number, $email, $address, $password, $role_id);
                        $thongbao = "Đã thêm thành viên thành công !";
                    }
                }

                include "thanhvien/themmoi.php";
                break;
            case 'cntv':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $id = $_POST['id'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['pass'];
                    $phone_number = $_POST['sdt'];
                    $fullname = $_POST['fullname'];
                    $address = $_POST['address'];

                    $error_messages = array();

                    if (empty($email)) {
                        $error_messages['email'] = "Email không được để trống.";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error_messages['email'] = "Email không hợp lệ.";
                    }


                    if (empty($username)) {
                        $error_messages['username'] = "Tên tài khoản không được để trống.";
                    }


                    if (empty($password)) {
                        $error_messages['password'] = "Mật khẩu không được để trống.";
                    }

                    if (empty($phone_number)) {
                        $error_messages['phone_number'] = "Số điện thoại không được để trống.";
                    }


                    if (empty($fullname)) {
                        $error_messages['fullname'] = "Họ và tên không được để trống.";
                    }


                    if (empty($address)) {
                        $error_messages['address'] = "Địa chỉ không được để trống.";
                    }

                    if (empty($error_messages)) {
                        update_tv($id, $username, $fullname, $phone_number, $email, $address, $password);
                        $thongbao = "cập nhật thành công !";
                    }
                }
                include "thanhvien/capnhat.php";
                break;
///////////////////////////////////////////////////////////// tin tức ///////////////////////////////////////////////////////
            case 'tintuc':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $name = $_POST['tenbv'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $day = date('h:i:sa d/m/Y');
                    $img = $_FILES['hinh']['name'];
                    $mota = $_POST['tongquat'];
                    $chitiet = $_POST['chitiet'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file);

                    $error_messages = array();

                    if (empty($name)) {
                        $error_messages['name'] = "Không được bỏ trống phần tên tin tức";
                    }

                    if (empty($img)) {
                        $error_messages['hinh'] = "Vui lòng chọn file ảnh";
                    }

                    if (empty($mota)) {
                        $error_messages['mota'] = "Không được bỏ trống phần mô tả";
                    }

                    if (empty($chitiet)) {
                        $error_messages['chitiet'] = "Không được bỏ trống phần chi tiết";
                    }

                    if (empty($error_messages)) {
                        insert_tintuc($name, $img, $mota, $chitiet, $day);
                        $thongbao = "Thêm thành công";
                    }
                }
                include 'tintuc/themmoi.php';
                break;
            case 'dstintuc':
                $listnews = loadall_tintuc();
                include 'tintuc/danhsach.php';
                break;
            case 'xoatt':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_tintuc($_GET['id']);
                }
                $listnews = loadall_tintuc();
                include 'tintuc/danhsach.php';
                break;
            case 'suatt':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $bv = loadone_tintuc($_GET['id']);
                }
                $listnews = loadall_tintuc();
                include 'tintuc/capnhat.php';
                break;
            case 'cntt':
                if (isset($_POST['gui']) && ($_POST['gui'])) {
                    $id = $_POST['id'];
                    $name = $_POST['tenbv'];
                    $img = $_FILES['hinh'];
                    $mota = $_POST['tongquat'];
                    $chitiet = $_POST['chitiet'];
                    $imguploaded = $_POST['img-uploaded'];
                    $target_dir = "../upload/";
                    if ($img['size'] > 0) {
                        $imgPath = $target_dir . basename($_FILES['hinh']['name']);
                        move_uploaded_file($img['tmp_name'], $imgPath);
                    } else if ($imguploaded) {
                        $imgPath = $imguploaded;
                    } else {
                        $imgPath = '';
                    }
                    $error_messages = array();

                    if (empty($name)) {
                        $error_messages['name'] = "Không được bỏ trống phần tên tin tức";
                    }

                    if (empty($img)) {
                        $error_messages['hinh'] = "Vui lòng chọn file ảnh";
                    }

                    if (empty($mota)) {
                        $error_messages['mota'] = "Không được bỏ trống phần mô tả";
                    }

                    if (empty($chitiet)) {
                        $error_messages['chitiet'] = "Không được bỏ trống phần chi tiết";
                    }

                    if (empty($error_messages)) {
                        update_tintuc($id, $name, $imgPath, $mota, $chitiet);
                        $thongbao = "Cập nhật thành công";
                    }
                }
                $bv = loadone_tintuc($id);
                include 'tintuc/capnhat.php';
                break;
//////////////////////////////////////////////////////// liên hệ /////////////////////////////////////////////
            case 'lienhe':
                $dslh = loadall_lienhe();
                include 'lienhe/danhsach.php';
                break;
            case 'xoalh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_lienhe($_GET['id']);
                }
                $dslh = loadall_lienhe();
                include 'lienhe/danhsach.php';
                break;
/////////////////////////////////////////////////////////// bình luận ///////////////////////////////////////////////
            case 'binhluan':
                $id_sanpham = 0;
                if(isset($_POST['gui'])){
                    $id_sanpham = $_POST['idsp'];
                     
                } 
                $listsp = loadall_sanpham();
                $listbinhluan = loadall_binhluan($id_sanpham);
                include "binhluan/danhsach.php";
                break;
            case 'xoabl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan = loadall_binhluan('', 0);
                include "binhluan/danhsach.php";
                break;
///////////////////////////////////////////////////////////// đơn hàng /////////////////////////////////////////
            case 'donhang':
                $listbill = loadall_bill_admin();
                include "donhang/danhsach.php";
                break;
            case 'xoabill':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_cart($_GET['id']);
                    delete_bill($_GET['id']);
                }
                $listbill = loadall_bill(0);
                include "donhang/danhsach.php";
                break;
            case 'suabill':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $bill = loadone_bill($_GET['id']);
                }
                $listbill = loadall_bill(0);
                include "donhang/capnhat.php";
                break;
            case 'huydon':
                if (isset($_GET['id']) && isset($_GET['huydon'])) {
                    $id_bill = $_GET['id'];
                    $huydon = $_GET['huydon'];
                    update_huydon($id_bill, $huydon);
                }
                echo '<script>window.location="index.php?act=donhang"</script>';
                break;
            case 'cnbill':
                if (isset($_POST['update']) && ($_POST['update'])) {
                    $id = $_POST['id'];
                    $iduser = $_POST['iduser'];
                    $fullname = $_POST['kh'];
                    $address = $_POST['diachi'];
                    $phone_number = $_POST['sdt'];

                    $error_messages = array();

                    if (empty($fullname)) {
                        $error_messages['fullname'] = "Không được bỏ trống phần người nhận";
                    }
                    if (empty($phone_number)) {
                        $error_messages['phone_number'] = "Không được bỏ trống số điện thoại người nhận";
                    }
                    if (empty($address)) {
                        $error_messages['address'] = "Không được bỏ trống địa chỉ người nhận";
                    }


                    if (empty($error_messages)) {
                        update_bill($id, $iduser, $fullname, $address, $phone_number);
                        $thongbao = 'Cập nhật thành công';
                    }
                }
                $bill = loadone_bill($id);
                include "donhang/capnhat.php";
                break;
            case 'xemctdh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $list_cart = loadall_cart($_GET['id']);
                    $list_bill = loadone_bill($_GET['id']);
                }
                include "donhang/chitietdonhang.php";
                break;

            case 'ttdonhang':
                if (isset($_GET['id']) && isset($_GET['ttdh'])) {
                    upadte_ttdh($_GET['id'], $_GET['ttdh']);
                }
                $listbill = loadall_bill_admin();
                include 'donhang/danhsach.php';
                break;
 //////////////////////////////////////////////////////////  tổng quan //////////////////////////////////////////////
            case 'tongquan':
                $donhang = soluongdonhang();
                $loaihang = soluongloaihang();
                $sanpham = soluongsanpham();
                $khachhang = soluongkhachhang();
                $listhongke = loadall_thongke();
                include 'tongquan/tongquan.php';
                break;

            default:
                include "./home.php";
                break;
        }
    } else {
        include "./home.php";
    }
    include "./footer.php";
} else {

    header(header: "location: http://localhost/web ban giay/");
}
