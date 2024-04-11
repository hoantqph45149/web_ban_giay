    <div class="container-fluid">
        <div class="marqee">
            <marquee>
                <h3>Tiết kiệm tới 40%</h3>
                <p>Mua sắm tất cả các khoản giảm giá mới của chúng tôi</p>
            </marquee>
        </div>
    </div>
    <div class="container">
        <div class="banner">
            <img src="images/banner1.png" alt="" class="banner-image">
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>
                    <div class="panel-group category-products" id="accordian">
                        <?php
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = 'index.php?act=danhmuc&iddm=' . $id;
                            echo '
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a href="' . $linkdm . '">' . $name . '</a></h4>
                                            </div>
                                        </div>
                                         ';
                        }
                        ?>
                    </div>
                    <!--/category-products-->

                    <div class="of_price">
                        <h2>Chọn giá</h2>
                        <form action="index.php?act=filter_price" method="post">
                            <?php foreach ($list_of_price as $key => $value) { ?>
                                <input type="radio" name="filter" id="" value="<?= $key ?>"
                                onclick="return this.form.submit()" > <?= $value ?> <br>
                            <?php } ?>
                        </form>

                    </div>
                    <?php //var_dump($list_of_price); ?>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Sản phẩm Mới Ra</h2>
                    <?php
                    foreach ($sptc as $sanpham) {
                        extract($sanpham);
                        $hinh = $img_path . $img;
                        $linksp = 'index.php?act=sanphamct&id=' . $id;
                    ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo-image">
                                        <a href="<?php echo $linksp ?>">
                                            <img src="<?php echo $hinh ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="productinfo">
                                        <p><a class="productinfo-title" href="<?php echo $linksp ?>"><?php echo $title ?></a></p>
                                        <h2><?php echo number_format("$price") . "" ?> VND</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="trending">
        <div class="container">
            <h2>Xu hướng</h2>
            <div class="trending-image">
                <img src="images/sp1.png" alt="">
            </div>
            <div class="trending-title">
                <p>just in</p>
                <h1>AJL HIGH OG 'BLACK AND WHITE'</h1>
                <P>Suit up and show up in this iconic colorway. inspired by MJ's all bussinness attiude, you're ready to make moves</P>

                <button class="video-button"><a href="http://localhost/web%20ban%20giay/index.php?act=danhmuc&iddm=22">Cửa hàng</a></button>
            </div>
        </div>
    </div>
    <div class="video">
        <div class="container">
            <h2>Đừng Bỏ lỡ</h2>
            <div class="video-quangcao">
                <video poster="images/banner.webp" autoplay loop class="video_quangcao-auto">
                    <source src="video/quangcao-nike.mp4">
                </video>
            </div>
            <div class="video-taitol">
                <p>jordan apparel</p>
                <h1>SP24 LOOK BOOK </h1>
                <P>new season, new vibes. Modern takes on classic jordan silhouettes are here for the whole family</P>

                <button class="video-button"><a href="http://localhost/web%20ban%20giay/index.php?act=danhmuc&iddm=17">Cửa hàng</a></button>
            </div>

        </div>
    </div>
    <style>
        .productinfo p {
            margin: 0;
        }

        .video {
            margin-bottom: 70px;
        }

        .video-button {
            background-color: #111;
            border-radius: 30px;
        }

        .video-button a {
            padding: 20px;
            color: #fff;
            text-decoration: none;
        }

        .video-button a:hover {
            color: #ada4a4;
        }
    </style>