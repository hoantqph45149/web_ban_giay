<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="signup-form">
                    <h2>Đăng ký tài khoản</h2>
                    <form action="index.php?act=dangky" method="post">
                        <input type="text" name="username" placeholder="Tên tài khoản" />
                        <?php if (isset($error_messages['username'])) echo '<p class="error" style="color: red ;">' . $error_messages['username'] . '</p>'; ?>
                        <input type="text" name="fullname" placeholder="Họ và tên" />
                        <?php if (isset($error_messages['fullname'])) echo '<p class="error" style="color: red ;">' . $error_messages['fullname'] . '</p>'; ?>
                        <input type="password" name="pass" placeholder="Mật khẩu" />
                        <?php if (isset($error_messages['password'])) echo '<p class="error" style="color: red ;">' . $error_messages['password'] . '</p>'; ?>
                        <input type="email" name="email" placeholder="Email" />
                        <?php if (isset($error_messages['email'])) echo '<p class="error" style="color: red ;">' . $error_messages['email'] . '</p>'; ?>
                        <input type="number" name="sdt" placeholder="Số điện thoại" />
                        <?php if (isset($error_messages['phone_number'])) echo '<p class="error" style="color: red ;">' . $error_messages['phone_number'] . '</p>'; ?>
                        <input type="text" name="address" placeholder="Địa chỉ" />
                        <?php if (isset($error_messages['address'])) echo '<p class="error" style="color: red ;">' . $error_messages['address'] . '</p>'; ?>
                        <input type="submit" class="btn btn-default" name="dangky" value="Đăng ký">
                    </form>
                </div>
                <h5 style="color: green;">
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                    ?>
                </h5 >
            </div>
        </div>
    </div>
</section>
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>