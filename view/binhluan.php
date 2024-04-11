<?php

session_start();
include "../model/pdo.php";
include "../model/binhluan.php";

$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
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
    //   Echo '<pre>';
    //  Print_r($dsbl);
    //   Echo '</pre>';
    foreach ($dsbl as $bl) {
        extract($bl);
        echo   '<ul>
                            <li><a href=""><i class="fa fa-user"></i>' . $iduser . '</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>' . $ngaybinhluan . '</a></li>
                        </ul>
                        <p>' . $noidung . '</p>';
    }
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
    //   Print_r($_SESSION['user']['username']);
    //   Echo '</pre>';
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['username'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngaybinhluan = date('h:i:sa d/m/y');
        insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
    ?>
</body>

</html>