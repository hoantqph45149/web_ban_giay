<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
include '../model/taikhoan.php';

$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
$dstk = loadAllTaiKhoan();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/style_user.css">
</head>

<body>
    <h4>Đánh giá của khách hàng</h4>
    <?php
    foreach ($dsbl as $bl) {
        extract($bl);
    ?>
        <ul>
            <li><a href=""><i class="fa fa-user"></i>
                    <?php
                    foreach ($dstk as $tk) {
                        if ($tk['id'] == $iduser) {
                            $fullname = $tk['fullname'];
                            break;
                        }
                    }
                    if ($fullname != "") {
                        echo $fullname;
                    } else {
                        echo "Unknown User";
                    };
                    ?>
                </a></li>
            <li><a href=""><i class="fa fa-clock-o"></i><?= $ngaybinhluan ?></a></li>
        </ul>
        <p><?= $noidung ?></p>
    <?php }
    ?>
    <p><b>Viết bình luận:</b></p>
    <div class="comments_form">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="idpro" value="<?= $idpro ?>">
            <textarea name="noidung" id="review_comment"></textarea>
            <input type="submit" name="guibinhluan" class="btn pull-left" value="Gửi">
        </form>
    </div>
    </div>
    </div>
    <?php
    //   Echo '<pre>';
    //   Print_r($_SESSION['user']['id']);
    //   Echo '</pre>';
    //   var_dump($_POST['idpro']);
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaybinhluan = date('h:i:sa d/m/y');
        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
    ?>
</body>

</html>