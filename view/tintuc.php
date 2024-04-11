<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-post-area">
                    <h2 class="title text-center">Tin tức của SHOPNIKE</h2>
                    <?php
                    foreach ($tintuc as $baiviet) {
                        extract($baiviet);
                        $hinh = $img_path . $img;
                        $linkbv = "index.php?act=docthem&id=" . $id;
                    ?>
                        <div class="single-blog-post">
                            <h3><?php echo $name ?></h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-calendar"></i><?php echo $day ?></li>
                                </ul>
                                <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </span>
                            </div>
                            <a href="">
                                <img src="<?php echo $hinh ?>" alt="">
                            </a>
                            <p><?php echo $mota ?>...</p>
                            <a class="btn" href="<?php echo $linkbv ?>">Đọc thêm</a>
                        </div>
                    <?php } ?>
                    <div class="pagination-area">
                        <ul class="pagination">
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>