<div class="container-fluid text-white">
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
                            <h4>Thêm bài viết</h4>
                        </a>
                    </li>
                        <div class="add-product">
                            <a href="index.php?act=dstintuc">Danh sách tin tức</a>
                        </div>
                </ul>
                <div class="pull-right" style="color: green ;">
                    <h5> <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?></h5>
                </div>
                <?php
                if (is_array($bv)) {
                    extract($bv);
                }
                //   Echo '<pre>';
                // 		  Print_r($bv);
                // 		  Echo '</pre>';
                ?>
                <div class="tab-content custom-product-edit" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <form action="index.php?act=cntt" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="tensp" class="form-label">Tên bài viết</label>
                                <input type="hidden" name="id" id="" value="<?= $id ?>">
                                <input type="text" class="form-control" name="tenbv" value="<?= $name ?>">
                                <?php if (isset($error_messages['name'])) echo '<p class="error" style="color: red ;">' . $error_messages['name'] . '</p>'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="hinh" class="form-label">Hình ảnh</label><br>
                                <input style=" color: white;" type="file" name="hinh">
                                <img src="../upload/<?= $img ?>" alt="" style="height: 30vh; margin-top: 50px;">
                                <input type="hidden" name="img-uploaded" value="<?= $img ?>">
                            </div>
                            <div class="mb-3" style="width: 100%;">
                                <label for="mota" class="form-label">Mô tả</label>
                                <textarea class="form-control" name="tongquat"><?= $mota ?></textarea>
                                <?php if (isset($error_messages['mota'])) echo '<p class="error" style="color: red ;">' . $error_messages['mota'] . '</p>'; ?>
                            </div>
                            <div class="mb-3" style="width: 100%;">
                                <label for="mota" class="form-label">Chi tiết</label>
                                <textarea class="form-control" name="chitiet"><?= $chitiet ?></textarea>
                                <?php if (isset($error_messages['chitiet'])) echo '<p class="error" style="color: red ;">' . $error_messages['chitiet'] . '</p>'; ?>
                            </div>
                            <div class="mb-3 text-center">
                                <input name="gui" style="background-color: #111; border: none;" type="submit" class="btn btn-primary" value="Gửi">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>