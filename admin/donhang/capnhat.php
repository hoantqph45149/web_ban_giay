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
                            <a class="nav-link" href="index.php?act=donhang"><i class="fas fa-shopping-bag"></i> Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Tin Tức</a>
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
        <div class="col-sm-10">
            <div class="p-3 border text-white" style="background-color: #212529;">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-white">
                            <h4>Cập nhật đơn hàng</h4>
                        </a>
                    </li>
                    <div class="add-product pull-right">
                        <a href="index.php?act=donhang">Danh sách dơn hàng</a>
                    </div>
                </ul>
                <?php
                if (is_array($bill)) {
                    extract($bill);
                }
                ?>
                <div class="tab-content custom-product-edit" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <form action="index.php?act=cnbill" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="tensp" class="form-label">ID đơn hàng</label>
                                <input type="text" class="form-control" name="id" value="<?= $id ?>">
                            </div>
                            <div class="mb-3" style="width: 100%;">
                                <label for="mota" class="form-label">ID khách hàng</label>
                                <input type="text" class="form-control" name="iduser" value="<?= $user_id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hinh" class="form-label">Người nhận</label><br>
                                <input type="text" class="form-control" name="kh" value="<?= $fullname ?>">
                                <?php if (isset($error_messages['fullname'])) echo '<p class="error" style="color: red ;">' . $error_messages['fullname'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="hinh" class="form-label">Số điện thoại</label><br>
                                <input type="text" class="form-control" name="sdt" value="<?= $phone_number ?>">
                                <?php if (isset($error_messages['phone_number'])) echo '<p class="error">' . $error_messages['phone_number'] . '</p>'; ?>
                            </div>
                            <div class="mb-3" style="width: 100%;">
                                <label for="mota" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi" value="<?= $address ?>">
                                <?php if (isset($error_messages['address'])) echo '<p class="error">' . $error_messages['address'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <input name="update" style="background-color: #111; border: none;" type="submit" class="btn btn-primary" value="Lưu">
                            </div>
                            <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>