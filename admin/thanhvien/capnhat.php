<div class="container-fluid text-white">
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
        <div class="col-sm-10">
            <div class="p-3 border text-white" style="background-color: #212529;">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-white">
                            <h4>Cập nhật tài khoản</h4>
                        </a>
                    </li>
                    <div class="add-product pull-right">
                        <a href="index.php?act=dstv">Danh sách thành viên</a>
                    </div>
                </ul>

                <?php
                if (isset($one_tv)) {
                    extract($one_tv);
                    // var_dump($one_tv);
                }
                ?>
                <div class="tab-content custom-product-edit" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <form action="index.php?act=cntv" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Tên thành viên</label>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname ?>">
                                <?php if (isset($error_messages['fullname'])) echo '<p class="error" style="color: red ;">' . $error_messages['fullname'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Tên tài khoản</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                                <?php if (isset($error_messages['username'])) echo '<p class="error" style="color: red ;">' . $error_messages['username'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                                <?php if (isset($error_messages['email'])) echo '<p class="error" style="color: red ;">' . $error_messages['email'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Mật khẩu</label><br>
                                <input type="password" class="form-control" id="pass" name="pass" value="<?= $password ?>">
                                <?php if (isset($error_messages['password'])) echo '<p class="error" style="color: red ;">' . $error_messages['password'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="sdt" class="form-label">Số điện thoại</label>
                                <input type="number" class="form-control" id="sdt" name="sdt" value="<?= $phone_number ?>">
                                <?php if (isset($error_messages['phone_number'])) echo '<p class="error" style="color: red ;">' . $error_messages['phone_number'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label><br>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $address ?>">
                                <?php if (isset($error_messages['address'])) echo '<p class="error" style="color: red ;">' . $error_messages['address'] . '</p>'; ?>
                            </div>
                            <div class="mb-3 text-center">
                                <input name="gui" style="background-color: #111; border: none;" type="submit" class="btn btn-primary" value="Gửi">
                            </div>
                            <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>