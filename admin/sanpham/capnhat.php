<div class="container-fluid ">
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
        <div class="col-sm-10">
            <div class="p-3 border text-white" style="background-color: #212529;">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>
                            <h4>Cập nhật sản phẩm</h4>
                        </a>
                    </li>
                    <div class="add-product pull-right">
                        <a href="index.php?act=dssp">Danh sách sản phẩm</a>
                    </div>
                </ul>
                <div class="pull-right" style="color: green ;">
                    <h5> <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?></h5>
                </div>
                <?php if (isset($sp)) extract($sp);
                // var_dump($sp);
                ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <form action="index.php?act=cnsp" method="post" enctype="multipart/form-data" class="mt-3">
                            <div class="mb-3">
                                <label for="iddm" class="form-label">Mã loại Giày</label>
                                <select name="iddm" id="iddm" class="form-select">
                                    <option value="0" selected>Tất cả</option>
                                    <?php foreach ($listdm as $dm) : ?>
                                        <option value="<?= $dm['id'] ?>" <?= ($category_id == $dm['id']) ? 'selected' : '' ?>><?= $dm['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($error_messages['iddm'])) echo '<p class="error" style="color: red ;">' . $error_messages['iddm'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="id" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tensp" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="tensp" name="tensp" value="<?= $title ?>">
                                <?php if (isset($error_messages['tensp'])) echo '<p class="error" style="color: red ;">' . $error_messages['tensp'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="giasp" class="form-label">Giá bán</label>
                                <input type="text" class="form-control" id="giasp" name="giasp" value="<?= $price ?>">
                                <?php if (isset($error_messages['giasp'])) echo '<p class="error" style="color: red ;">' . $error_messages['giasp'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="hinh" class="form-label">Hình ảnh</label>
                                <input type="file" id="hinh" name="hinh" style="color: white;"><br>
                                <img src="../upload/<?= $img ?>" alt="" style="height: 30vh; margin-top: 50px;">
                                <input type="hidden" name="img-uploaded" value="<?= $img ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mausac" class="form-label">Màu sắc</label>
                                <input type="text" class="form-control" id="mausac" name="mausac" value="<?= $mausac ?>">
                                <?php if (isset($error_messages['mausac'])) echo '<p class="error" style="color: red ;">' . $error_messages['mausac'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="mota" name="mota" rows="5"><?= $mota ?></textarea>
                                <?php if (isset($error_messages['mota'])) echo '<p class="error" style="color: red ;">' . $error_messages['mota'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="soluong" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="soluong" name="soluong" value="<?= $soluong ?>">
                                <?php if (isset($error_messages['soluong'])) echo '<p class="error" style="color: red ;">' . $error_messages['soluong'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <input name="gui" style="background-color: #111; border: none;" type="submit" class="btn btn-primary" value="Cập nhật">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>