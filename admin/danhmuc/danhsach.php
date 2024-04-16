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
                            <div class="product-status-wrap">
                                <h4>Danh sách danh mục</h4>
                                <div class="add-product">
                                    <a href="index.php?act=tmdanhmuc">Thêm mới</a>
                                </div>
                                <table>
                                    <tr>
                                        <th>Mã loại</th>
                                        <th>Tên loại</th>
                                        <th>Cài đặt</th>
                                    </tr>
                                    <?php
                                    foreach ($listdm as $danhmuc) {
                                        extract($danhmuc);
                                        $suadm = 'index.php?act=suadm&id=' . $id;
                                        $xoadm = 'index.php?act=xoadm&id=' . $id;
                                        echo '
                                        <tr>
                                            <td>' . $id . '</td>
                                            <td>' . $name . '</td>
                                            <td>
                                                <a href="' . $suadm . '">
                                                    <button title="Sửa" class="pd-setting-ed"><i class="fas fa-tools"></i></button>
                                                </a>
                                                <a href="' . $xoadm . '">
                                                    <button title="Xóa" class="pd-setting-ed"><i class="fas fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>