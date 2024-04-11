<section id="form">
    <div class="container">
        <div class="login-form">
            <h2>Đăng nhập</h2>
            <form action="index.php?act=dangnhap" method="post">
                <input type="text" name="username" placeholder="Tên đăng nhập">
                <?php if (isset($error_messages['username'])) echo '<p class="error" style="color: red ;">' . $error_messages['username'] . '</p>'; ?>
                <input type="password" name="pass" placeholder="Mật khẩu">
                <?php if (isset($error_messages['password'])) echo '<p class="error" style="color: red ;">' . $error_messages['password'] . '</p>'; ?>
                <span>
                    <a href="index.php?act=quenmk">Quên mật khẩu</a>
                </span>
                <input type="submit" name="dangnhap" class="btn btn-default" value="Đăng nhập">
            </form>
            <h5 style="color: red;">
                <?php 
                if(isset($thongbao) && ($thongbao!= ""))
                echo $thongbao;
                ?>
            </h5>
        </div>
    </div>
</section>
