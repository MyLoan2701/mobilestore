<!-- Đăng nhập -->
<div class="login-file">
    <div class="login-client">
        <?php 
        if (isset($data['messLogin'])) {?>
        <div class="login-required">
            <?php echo $data['messLogin'];?>
        </div>
        <?php } ?>
            <div class="login-content">
                <div class="login-header">
                    <h1>Đăng nhập</h1>
                </div>
                <div class="login-container clearfix">
                    <form action="./login/checkLogin" class="form form-login" method="POST">
                        <div>
                            <input type="email" class="ipt text-email" placeholder="Email" required value="" name="email">
                            <span class="err-mess">*Trường Email là bắt buộc!</span>
                            <span class="err-mess">
                            <?php
                            if (isset($data['errlogin']['email'])) {
                                echo "*".$data['errlogin']['email'];
                            }
                            ?>
                            </span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Mật khẩu" required value="" name="password">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                            <span class="err-mess">
                            <?php
                            if (isset($data['errlogin']['password'])) {
                                echo "*".$data['errlogin']['password'];
                            }
                            ?>
                            </span>
                        </div>
                        <input class="ipt text-submit" type="submit" value="Đăng nhập" name="login">
                    </form>
                    <div class="link-singup">
                        Chưa có tài khoản?
                        <a href="./signup">Đăng ký ngay!</a>
                    </div>

                    <div class="mess-err">
                        <?php

                        if (isset($data["loginFail"])) {
                            if ($data["loginFail"] == false) {?>
                                <h3 class="alert alert-fail">
                                    <?php echo "Email hoặc mặt khẩu không đúng." ?>
                                </h3>
                                <?php
                            }
                        }

                        if (isset($data["loginemailfail"])) {
                            if ($data["loginemailfail"] != "true") {?>
                                <h3 class="alert alert-fail">
                                    <?php echo "Email đã tồn tại" ?>
                                </h3>
                                <?php
                            }
                        }

                        if (isset($data["loginpwdfail"])) {
                            if ($data["loginpwdfail"] != "true") {?>
                                <h3 class="alert alert-fail">
                                    <?php echo "Mật khẩu không đúng" ?>
                                </h3>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</div>