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
                            <h4>Thêm sản phẩm</h4>
                        </a>
                    </li>
                    <div class="add-product pull-right">
                        <a href="index.php?act=dssp">Danh sách sản phẩm</a>
                    </div>
                </ul>
                <div class="tab-content custom-product-edit" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <form action="index.php?act=dstsp" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="iddm" class="form-label">Chọn danh mục</label>
                                <select name="iddm" id="iddm" class="form-select pro-edt-select form-control-primary">
                                    <option value="">Chọn danh mục</option>
                                    <?php foreach ($listdm as $danhmuc) : ?>
                                        <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($error_messages['iddm'])) echo '<p class="error" style="color: red ;">' . $error_messages['iddm'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="tensp" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Tên sản phẩm">
                                <?php if (isset($error_messages['tensp'])) echo '<p class="error" style="color: red ;">' . $error_messages['tensp'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="giasp" class="form-label">Gía bán</label>
                                <input type="text" class="form-control" id="giasp" name="giasp" placeholder="Gía bán">
                                <?php if (isset($error_messages['giasp'])) echo '<p class="error" style="color: red ;">' . $error_messages['giasp'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="hinh" class="form-label">Hình ảnh</label><br>
                                <input type="file" id="hinh" name="hinh" style="color: white;">
                                <?php if (isset($error_messages['hinh'])) echo '<p class="error" style="color: red ;">' . $error_messages['hinh'] . '</p>'; ?>
                            </div>
                            <div class="mb-3" style="width: 100%;">
                                <label for="mota" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="mota" name="mota" placeholder="Mô tả"></textarea>
                                <?php if (isset($error_messages['mota'])) echo '<p class="error" style="color: red ;">' . $error_messages['mota'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="soluong" class="form-label">Số lượng</label>
                                <input type="text" class="form-control" id="soluong" name="soluong" placeholder="Số lượng sản phẩm">
                                <?php if (isset($error_messages['soluong'])) echo '<p class="error" style="color: red ;">' . $error_messages['soluong'] . '</p>'; ?>
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