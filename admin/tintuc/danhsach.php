<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2" style="padding: 0;">
            <nav id="sidebar" class="bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fas fa-home"></i> Trang chủ</a>
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
                <h4>Bài viết</h4>
                <div class="add-product">
                    <a href="index.php?act=tintuc">Thêm bài viết</a>
                </div>
                <table>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Mô tả</th>
                        <th>Chi tiết</th>
                        <th>Cài đặt</th>
                    </tr>
                    <?php
                    // Echo '<pre>';
                    // Print_r($listnews);
                    // Echo '</pre>';
                    foreach ($listnews as $tintuc) {
                        extract($tintuc);
                        $suabv = 'index.php?act=suatt&id=' . $id;
                        $xoabv = 'index.php?act=xoatt&id=' . $id;
                        $hinhpath = '../upload/' . $img;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='80'>";
                        } else {
                            $hinh = 'KO CÓ HÌNH';
                        }
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $day = date('d/m/Y');

                        echo '
                        <tr>
                            <td>' . $hinh . '</td>
                            <td>' . $name . '</td>
                            <td>' . $day . '</td>
                            <td>' . $mota . '</td>
                            <td>' . $chitiet . '</td>
                            <td>
                                <a href="' . $suabv . '">
                                    <button title="Sửa" class="pd-setting-ed"><i class="fas fa-tools"></i></button>
                                </a>
                                <a href="' . $xoabv . '">
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

