<div class="container-fluidFF">
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
                            <a class="nav-link" href="#"><i class="fas fa-id-card-alt"></i> Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-10 text-white">
            <div class="container-fluid" style="background-color: #212529;">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-3">
                                <div class="bg-secondary">
                                    <h4 class="text-uppercase"><b>Đơn hàng</b></h4>
                                    <?php
                                    foreach ($donhang as $soluongdh) {
                                        extract($soluongdh);
                                    ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <label style="font-size: 20px;"><?php echo $SoLuongdh ?></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="bg-secondary">
                                    <h4 class="text-uppercase"><b>Loại hàng</b></h4>
                                    <?php
                                    foreach ($loaihang as $soluonglh) {
                                        extract($soluonglh);
                                    ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <label style="font-size: 20px;"><?= $SoLuonglh ?></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="bg-secondary">
                                    <h4 class="text-uppercase"><b>Sản phẩm</b></h4>
                                    <?php
                                    foreach ($sanpham as $soluongsp) {
                                        extract($soluongsp);
                                    ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <label style="font-size: 20px;"><?= $SoLuongsp ?></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="bg-secondary">
                                    <h4 class="text-uppercase"><b>Khách hàng</b></h4>
                                    <?php
                                    foreach ($khachhang as $soluongkh) {
                                        extract($soluongkh);
                                    ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <label style="font-size: 20px;"><?= $SoLuongkh ?></label>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-sales-area mg-tb-30" style="background-color: #212529;">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-sales-chart">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="caption pro-sl-hd">
                                                <span class="caption-subject text-uppercase"><b>Thống kê loại sản phẩm</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    #customers {
                                        font-family: Arial, Helvetica, sans-serif;
                                        border-collapse: collapse;
                                        width: 100%;
                                        color: white;
                                    }

                                    #customers td,
                                    #customers th {
                                        border: 1px solid #ddd;
                                        padding: 8px;
                                    }

                                    #customers th {
                                        padding-top: 12px;
                                        padding-bottom: 12px;
                                        text-align: left;
                                        background-color: #212529;
                                        color: white;
                                    }
                                </style>
                                <table id="customers">
                                    <tr>
                                        <th>STT</th>
                                        <th>Loại hàng</th>
                                        <th>Số lượng</th>
                                        <th>Gía cao</th>
                                        <th>Gía thấp</th>
                                        <th>Trung bình</th>
                                    </tr>
                                    <?php
                                    foreach ($listhongke as $thongke) {
                                        extract($thongke);
                                        echo '
                                            <tr>
                                                <td>' . $loaihang . '</td>
                                                <td>' . $tenloaihang . '</td>
                                                <td>' . $countsp . '</td>
                                                <td>' . $maxprice . '</td>
                                                <td>' . $minprice . '</td>
                                                <td>' . $avgprice . '</td>
                                            </tr>
                                        ';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-sales-area mg-tb-30" style="background-color: #212529;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" style="width: 60%">
                            <div class="product-sales-chart">
                                <div class="portlet-title">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="caption pro-sl-hd">
                                                <span class="caption-subject text-uppercase"><b>Phần trăm loại sản phẩm</b></span>
                                            </div>
                                        </div>
                                        <div style="padding-left: 17%;">
                                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                            <div id="myChart" style="width:100%; max-width:400px; height:200px; margin-top: 9%">
                                            </div>
                                            <script>
                                                google.charts.load('current', {
                                                    'packages': ['corechart']
                                                });
                                                google.charts.setOnLoadCallback(drawChart);

                                                function drawChart() {
                                                    var data = google.visualization.arrayToDataTable([
                                                        ['Danh Mục', 'Số lượng sản phẩm'],
                                                        <?php
                                                        $tongdm = count($listhongke);
                                                        $i = 1;
                                                        foreach ($listhongke as $thongke) {
                                                            extract($thongke);
                                                            if ($i == $tongdm) {
                                                                $dauphay = "";
                                                            } else {
                                                                $dauphay = ",";
                                                            }
                                                            echo '["' . $thongke['tenloaihang'] . '",' . $thongke['countsp'] . ']' . $dauphay;
                                                            $i += 1;
                                                        }
                                                        ?>
                                                    ]);

                                                    var options = {
                                                        title: '',
                                                        is3D: true
                                                    };

                                                    var chart = new google.visualization.PieChart(document.getElementById('myChart'));
                                                    chart.draw(data, options);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>