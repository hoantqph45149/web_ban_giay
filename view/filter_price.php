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

<section>
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
                    <div class="of_price">
                        <h2>Mua theo giá</h2>
                        <form action="index.php?act=filter_price" method="post">
                            <?php foreach ($list_of_price as $key => $value) { ?>
                                <input type="radio" name="filter" id="" value="<?= $key ?>" onclick="return this.form.submit()"> <?= $value ?> <br>
                            <?php } ?>
                        </form>

                    </div>


                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <?php
                    foreach ($dssp as $sanphamdm) {
                        extract($sanphamdm);

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
</section>