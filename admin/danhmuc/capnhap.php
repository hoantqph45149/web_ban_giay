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
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                            <div class="review-tab-pro-inner" style="background-color: #212529; height: 100%;">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-white">
                                            <h4>Cập nhật danh mục</h4>
                                        </a>
                                    </li>
                                    <div class="add-product pull-right mt-2">
                                        <a href="index.php?act=dsdanhmuc">Danh sách Danh mục</a>
                                    </div>
                                </ul>
                                <div class="pull-right" style="color: green ;">
                                    <h5> <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?></h5>
                                </div>
                                <?php if (is_array($dm)) : extract($dm); ?>
                                    <div class="tab-content custom-product-edit" id="myTabContent">
                                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                            <form action="index.php?act=cndm" method="post" style="padding-left: 50px;">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="review-content-section">
                                                            <div class="mb-3">
                                                                <label for="maloai" class="form-label" style="color: white;">Mã loại</label>
                                                                <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tenloai" class="form-label" style="color: white;">Tên loại</label>
                                                                <input type="text" class="form-control" id="tenloai" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                                                                <?php if (isset($error_messages['tenloai'])) echo '<p class="error" style="color: red ;">' . $error_messages['tenloai'] . '</p>'; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="gui" style="background-color: #111; border: none;" type="submit" class="btn btn-primary" value="Cập nhật">
                                                    </div>
                                                </div><br>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>