<!-- Đăng ký -->
<div class="login-file">
    <div class="login-client">
            <div class="login-content">
                <div class="login-header">
                    <h1>Đăng ký</h1>
                </div>
                <div class="login-container clearfix">
                    <form action="./signup/insertClient" class="form form-signup" method="POST">
                        <div>
                            <input type="text" class="ipt text-lname" placeholder="Tên" required value="" name="lname">
                            <span class="err-mess">*</span>
                            <span class="err-mess">
                                <?php
                                if (isset($data['errsignup']['name'])) {
                                    echo $data['errsignup']['name'];
                                }
                                ?>
                            </span>
                        </div>
                        <div>
                            <input type="email" class="ipt text-email" placeholder="Email" required value="" name="email">
                            <span class="err-mess">*Trường Email là bắt buộc!</span>
                            <span class="err-mess">
                                <?php
                                if (isset($data['errsignup']['email'])) {
                                    echo "*".$data['errsignup']['email'];
                                }
                                ?>
                            </span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Mật khẩu" required value="" name="password">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                            <span class="err-mess">
                                <?php
                                if (isset($data['errsignup']['password'])) {
                                    echo "*".$data['errsignup']['password'];
                                }
                                ?>
                            </span>
                        </div>
                        <div>
                            <input type="password" class="ipt text-pwd" placeholder="Nhập lại mật khẩu" required value="" name="repassword">
                            <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                            <span class="err-mess">
                                <?php
                                if (isset($data['errsignup']['repassword'])) {
                                    echo "*".$data['errsignup']['repassword'];
                                }
                                if (isset($data['errsignup']['rpassword'])) {
                                    echo "*".$data['errsignup']['rpassword'];
                                }
                                ?>
                            </span>
                        </div>
                        <input class="ipt text-submit" type="submit" value="Đăng Ký" name="signup">
                    </form>
                    <div class="link-login">
                        Tài khoản đã sẵn sàng?
                        <a href="./login">Đăng nhập ngay!</a>
                    </div>

                    <div class="mess-err">
                        <?php
                        if (isset($data["pwdloginfail"])) {
                            if ($data["pwdloginfail"] == "false") {?>
                                <h3 class="alert alert-fail">
                                    <?php echo "Mật khẩu không trùng khớp!!" ?>
                                </h3>
                                <?php
                            }
                        }

                        if (isset($data["emailfail"])) {
                            if ($data["emailfail"] == "true") {?>
                                <h3 class="alert alert-fail">
                                    <?php echo "Email đã tồn tại!" ?>
                                </h3>
                                <?php
                            }
                        }

                        if (isset($data["rssignup"])) {
                            if ($data["rssignup"] == "true") {?>
                                <h3 class="alert alert-success">
                                    <?php echo "Đăng ký thành công." ?>
                                </h3>
                                <?php
                            }
                            else {?>
                            <h3 class="alert alert-fail">
                                <?php echo "Đăng ký thất bại." ?>
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