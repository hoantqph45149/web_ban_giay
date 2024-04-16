<style>
    body {
        padding-top: 20px;
        font-family: Arial, sans-serif;
    }

    .order-details {
        border: 1px solid #fff;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #212529;
        color: #fff;
    }

    .order-details h2 {
        margin-bottom: 20px;
        color: white;
    }

    .order-total {
        margin-top: 20px;
        padding: 10px;
        background-color: #111;
        color: #fff;
    }

    .table {
        text-align: center;
        color: #fff;
    }
    .table tr td {
        border: 1px solid #fff;
        align-content: center;
    }
    .table tr th {
        border: 1px solid #fff;
        align-content: center;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2" style="padding: 0;">
            <nav id="sidebar" class="bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=home"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=tongquan"><i class="fas fa-list"></i> Tổng quan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-vector-square"></i> Danh mục</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dsdanhmuc">Danh sách danh mục</a></li>
                                <li><a href="index.php?act=tmdanhmuc">Thêm danh mục</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-ruler"></i> Kích thước</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dskichthuoc">Danh sách kích thước</a></li>
                                <li><a href="index.php?act=tmkichthuoc">Thêm kích thước</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-product-hunt"></i> Sản phẩm</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dssp">Danh sách sản phẩm</a></li>
                                <li><a href="index.php?act=dstsp">Thêm sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dskh"><i class="fas fa-user"></i> khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="productsDropdown"><i class="fas fa-user"></i> Thành viên</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dstv">Danh sách Thành viên</a></li>
                                <li><a href="index.php?act=dsttv">Thêm thành viên</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=binhluan"><i class="fas fa-comments"></i> Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-shopping-bag"></i> Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=donhang"><i class="fas fa-newspaper"></i> Tin Tức</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dstintuc">Danh sách tin tức</a></li>
                                <li><a href="index.php?act=tintuc">Thêm tin tức</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=lienhe"><i class="fas fa-id-card-alt"></i> Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <?php
        if (is_array($list_cart) && (isset($list_bill))) {
            extract($list_bill);

            // var_dump($list_bill);
            $ttdh = get_ttdh($status);
            $pttt = pttt($pttt);
        ?>
            <div class="col-sm-10">
                <div class="order-details">
                    <h2>Chi tiết đơn hàng MDH<?php echo $id; ?></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Người đặt hàng:</strong> <?php echo $fullname; ?></p>
                            <p><strong>Số điện thoại:</strong> <?php echo $phone_number; ?></p>
                            <p><strong>Địa chỉ:</strong> <?php echo $address; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Ngày đặt hàng: </strong> <?php echo $order_date; ?></p>
                            <p><strong>Tổng cộng: </strong><?php echo number_format("$total_money"); ?> VNĐ</p>
                            <p><strong>Trạng thái: </strong> <?php echo $ttdh; ?></p>
                        </div>
                    </div>
                    <hr>
                    <h3>Danh sách sản phẩm</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Kích cỡ</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_cart as $cart) {
                                extract($cart); ?>
                                <tr>
                                    <td><img style="width:100px; heght:100px; " src="../upload/<?php echo $cart['img']; ?>"></td>
                                    <td><?php echo $cart['name']; ?></td>
                                    <td><?php echo $cart['num']; ?></td>
                                    <td><?php echo $cart['size']; ?></td>
                                    <td><?php echo number_format($cart['price']);?> VNĐ</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="add-product pull-right">
                    <a href="index.php?act=donhang">Danh sách đơn hàng</a>
                </div>
            </div>
            < <?php }
                ?>