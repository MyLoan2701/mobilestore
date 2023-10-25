<div class="login-admin clearfix">
                <div class="login-content abs-center">
                <?php 
        if (isset($data['messLogin'])) {?>
        <div class="login-required">
            <?php echo $data['messLogin'];?>
        </div>
        <?php } 
        ?>
                    <div class="login-header">
                        <h1>admin login</h1>
                    </div>
                    <div class="login-container clearfix">
                        <form action="./admin/loginAdmin" method="POST" class="form form-login-admin">
                            <div>
                                <input type="email" name="email" class="ipt text-email" placeholder="Email" required value="">
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
                                <input type="password" name="password" class="ipt text-pwd" placeholder="Mật khẩu" required value="">
                                <span class="err-mess">*Mật khẩu phải có tối thiểu 6 ký tự!</span>
                            <span class="err-mess">
                            <?php
                            if (isset($data['errlogin']['password'])) {
                                echo "*".$data['errlogin']['password'];
                            }
                            ?>
                            </span>
                            </div>
                            <input class="ipt btn-p text-submit" type="submit" name="login" value="Đăng nhập">
                        </form>
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