<?php
session_start();
include './model/pdo.php';
include 'view/header.php';
include './model/danhmuc.php';
include './model/sanpham.php';
include './model/global.php';
include './model/kichthuoc.php';
include './model/cart.php';
include './model/taikhoan.php';
include './model/tintuc.php';
include './model/lienhe.php';
include './model/mausac.php';


if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$dsdm = loadall_danhmuc();
$sptc = loadall_sanpham_home();
$spnew = loadall_sanpham();
$list_kt =  loadall_kichthuoc_admin(0);
$tintuc = loadall_tintuc();
$list_of_price = list_of_price();
if (isset($_GET['act']) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            if (isset($_POST['dangky'])) {
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $phone_number = $_POST['sdt'];
                $fullname = $_POST['fullname'];
                $address = $_POST['address'];

                $error_messages = array();

                if (empty($email)) {
                    $error_messages['email'] = "Email không được để trống.";
                }


                if (empty($username)) {
                    $error_messages['username'] = "Tên tài khoản không được để trống.";
                }


                if (empty($password)) {
                    $error_messages['password'] = "Mật khẩu không được để trống.";
                }

                if (empty($phone_number)) {
                    $error_messages['phone_number'] = "Số điện thoại không được để trống.";
                } elseif (strlen($phone_number) != 10) {
                    $error_messages['phone_number'] = "Số điện thoại không hợp lệ.";
                }

                if (empty($fullname)) {
                    $error_messages['fullname'] = "Họ và tên không được để trống.";
                }


                if (empty($address)) {
                    $error_messages['address'] = "Địa chỉ không được để trống.";
                }


                if (empty($error_messages)) {
                    insertTaiKhoan($username, $fullname, $phone_number, $email, $address, $password);
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập!";
                }
            }

            include "view/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['pass'];

                $error_messages = array();

                if (empty($username)) {
                    $error_messages['username'] = "Tên tài khoản không được để trống.";
                }

                if (empty($password)) {
                    $error_messages['password'] = "Mật khẩu không được để trống.";
                }

                if (empty($error_messages)) {
                    $db = getUser($username, $password);
                    if (is_array($db)) {
                        $_SESSION['user'] = $db;
                        echo '<script>window.location="index.php "</script>';
                        exit;
                    } else {
                        $thongbao = "Tài khoản hoặc mật khẩu không đúng. Vui lòng đăng nhập lại.";
                    }
                }
            }
            include "view/dangnhap.php";
            break;
        case 'dangxuat':
            session_unset();
            echo '<script>window.location="index.php";</script>';
            exit;
            break;
        case 'quenmk':
            if (isset($_POST['gui']) && $_POST['gui']) {
                $email = $_POST['email'];
                $info = checkEmail($email);
                if (is_array($info)) {
                    $thongbao = "Mật khẩu của bạn là: {$info['password']}";
                } else {
                    $thongbao = "Email không chính xác";
                }
            }
            include "view/quenmatkhau.php";
            break;

        case 'danhmuc':
            if (isset($_POST['timkiem']) && ($_POST['timkiem'] != "")) {
                $kyw = $_POST['timkiem'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall1_sanpham($kyw, $iddm);
            $tendm = load_ten_spdm($iddm);
            include 'view/danhmuc.php';
            break;
        case 'sanphamct':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $onesp = loadone_sanpham($id);
                $dskt = loadall_kichthuoc($id);
                extract($onesp);
                include 'view/sanphamchitiet.php';
            } else {
                include 'view/sanphamchitiet.php';
            }
            break;

        case 'addcart':
            $tamtinh = 0;
            $tong = 0;
            $phi = 0;
            if (!isset($_SESSION['user'])) {
                echo '<script>window.location="index.php?act=dangnhap"</script>';
                exit;
            }
            if (isset($_POST['addcart']) && !empty($_POST['addcart'])) {
                foreach ($list_kt as $size) {
                    if ($size['id'] == $_POST['size']) {
                        $name_size = $size['tenkc'];
                        break;
                    }
                }
                $id = $_POST['id'];
                $title = $_POST['tensp'];
                $hinh = $_POST['img'];
                $mausac = $_POST['mausac'];
                $price = $_POST['giasp'];
                $size = $_POST['size'];
                $num = $_POST['soluong'];
                $thanhtien = $num * $price;

                $fg = 0;
                foreach ($_SESSION['cart'] as $key => $cart) {
                    if ($cart[0] == $id && $cart[5] == $name_size) {
                        $fg = 1;
                        $_SESSION['cart'][$key][4]++;
                        $_SESSION['cart'][$key][6] = $_SESSION['cart'][$key][4] * $price;
                        break;
                    }
                }
                if ($fg == 0) {
                    $giohang = [$id, $title, $hinh, $price, $num, $name_size, $thanhtien, $mausac];
                    array_push($_SESSION['cart'], $giohang);
                }
            }
            include 'view/giohang.php';
            break;

        case 'xoacart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['cart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['cart'] = [];
            }
            echo '<script>window.location="index.php?act=addcart"</script>';
            break;
        case 'muangay':
            $tamtinh = 0;
            $tong = 0;
            $phi = 0;
            include "view/thanhtoan.php";
            break;
        case 'bill':
            if (isset($_POST['dathang']) && ($_POST['dathang'])) {
                if (isset($_SESSION['user'])) $user_id = $_SESSION['user']['id'];
                else $id = 0;
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $note = $_POST['ghichu'];
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $order_date = date('d/m/Y');
                $total_money = tonghang();
                $pttt = $_POST['pttt'];

                $error_messages = array();

                if (empty($fullname)) {
                    $error_messages['fullname'] = "Không được để trống trường tên người nhận.";
                }

                if (empty($email)) {
                    $error_messages['email'] = "Không được để trống trường email.";
                }

                if (empty($address)) {
                    $error_messages['address'] = "Không được để trống trường địa chỉ nhận hàng.";
                }

                if (empty($phone_number)) {
                    $error_messages['phone_number'] = "Số điện thoại không được để trống.";
                } elseif (strlen($phone_number) != 10) {
                    $error_messages['phone_number'] = "Số điện thoại không hợp lệ.";
                }

                if (empty($pttt)) {
                    $error_messages['pttt'] = "hãy chọn một phương thức thanh toán.";
                }

                if (empty($error_messages)) {
                    $order_id = insert_bill($user_id, $fullname, $email, $address, $phone_number, $pttt, $note, $order_date, $total_money);
                    foreach ($_SESSION['cart'] as $mycart) {
                        insert_cart($_SESSION['user']['id'], $order_id, $mycart[0], $mycart[1], $mycart[2], $mycart[3], $mycart[4], $mycart[6], $mycart[5]);
                    }
                    $_SESSION['cart'] = [];
                }
            }
            if (empty($error_messages)) {
                $bill = loadone_bill($order_id);
                $billct = loadall_cart($order_id);
                if ($pttt == 1) {
                    echo '<form id="vnpay_form" action="view/process_payment.php" method="post">';
                    echo '<input type="hidden" name="vnp_TxnRef" value="' . $order_id . '">';
                    echo '<input type="hidden" name="vnp_Amount" value="' . $total_money . '">';
                    echo '<input type="hidden" name="redirect" >';

                    echo '<input style="display: none;" type="submit" name = "redirect" >';
                    echo '</form>';

                    echo '<script>';
                    echo 'document.getElementById("vnpay_form").submit();';
                    echo '</script>';
                }

                include 'view/hoadon.php';
            } else {
                include 'view/thanhtoan.php';
            }
            break;

        case 'donhang_online':
            if (isset($_GET['id'])) {
                $order_id = $_GET['id'];
                $bill = loadone_bill($order_id);
                $billct = loadall_cart($order_id);
            }
            include 'view/hoadon.php';
            break;

        case 'lichsumuahang':
            $listbill = loadall_bill($_SESSION['user']['id']);
            include 'view/lichsumuahang.php';
            break;
        case 'donhang':
            if (isset($_GET['id'])) {
                $onebill = loadone_bill($_GET['id']);
            }
            include 'view/donhang.php';
            break;

        case 'huydon':
            if (isset($_GET['id']) && isset($_GET['huydon'])) {
                $id_bill = $_GET['id'];
                $huydon = $_GET['huydon'];
                update_huydon($id_bill, $huydon);
            }
            echo '<script>window.location="index.php?act=lichsumuahang"</script>';
            break;
            // tin tức //    
        case 'tintuc':
            include 'view/tintuc.php';
            break;
        case 'docthem':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $onebv = loadone_tintuc($id);
                extract($onebv);
                include 'view/docthem.php';
            } else {
                include 'view/docthem.php';
            }
            break;
            // liên hệ //
        case 'lienhe':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $lastname = $_POST['lastname'];
                $firstname = $_POST['firstname'];
                $email = $_POST['email'];
                $phonenum = $_POST['phonenum'];
                $subject = $_POST['subject'];
                $note = $_POST['message'];
                insert_lienhe($lastname, $firstname, $email, $phonenum, $subject, $note);
                $thongbao = 'Bạn đã gửi thành công';
                include 'view/lienhe.php';
            } else {
                include 'view/lienhe.php';
            }
            break;

            ///////// tìm kiếm theo yêu cầu ////////
        case 'filter_price':
            $filter = $_POST['filter'];
            switch ($filter) {

                case 1:
                    $min = null;
                    $max = 1000000;
                    break;
                case 2:
                    $min = 1000000;
                    $max = 2000000;
                    break;
                case 3:
                    $min = 2000000;
                    $max = 4000000;
                    break;
                case 4:
                    $min = 4000000;
                    $max = null;
            }
            $dssp = filterofprice($min, $max);
            include 'view/filter_price.php';
            break;
        case 'filter_size':
            $size = $_POST['size'];
            $dssp = filterofsize($size);
            include 'view/filter_size.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
} else {
    include 'view/home.php';
}
include 'view/footer.php';
