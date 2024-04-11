<div class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Liên hệ</h2>
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.802446509081!2d108.16776031433682!3d16.075738143534725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218e6e07b1c3f%3A0x459e4bf5a2af323e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYyDEkMOgIE7hurVuZw!5e0!3m2!1svi!2s!4v1638699298283!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Liên lạc</h2>
                    <form class="contact-form row" action="index.php?act=lienhe" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="firstname" class="form-control" placeholder="Tên" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="lastname" class="form-control" placeholder="Họ">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" name="phonenum" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Chủ đề">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control" placeholder="Tin nhắn bạn ở đây"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="gui" class="btn pull-right" value="Gửi">
                        </div>
                        <div class="form-group col-md-6">
                            <h4>
                            <?php
                        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                        ?>
                            </h4>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông tin liên lạc</h2>
                    <address>
                        <!-- <p>E-Shopper Inc.</p> -->
                        <p>Đường 80 Xuân Phương ngách 80/36 </p>
                        <p>Hà Nội - Việt Nam</p>
                        <p>Mobile: +0976922106</p>
                        <p>Email: shopNike@gamil.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Mạng xã hội</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>