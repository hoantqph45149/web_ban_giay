<section id="form">
    <div class="container">
        <div class="forget">
            <h2>Quên mật khẩu</h2>
            <form action="index.php?act=quenmk" method="post">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="submit" class="btn btn-default" name="gui" value="Gửi">
            </form>
            <h4>
                <?php
                if (isset($thongbao)) {
                    echo $thongbao;
                }
                ?>
            </h4>
        </div>
    </div>
</section>