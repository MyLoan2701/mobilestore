                        <div class="right-account account-user">
                            <div class="right-content account-content">
                                <?php 
                                if (isset($data['err'])) {
                                    foreach ($data['err'] as $key => $value) {?>
                                        <h3 class="alert alert-warning">
                                            <?php echo $value." " ?>Vui lòng nhập lại.
                                        </h3>
                                    <?php }
                                }
                                ?>

                                <?php
                                if (isset($data['result']) && $data['result'] == true) {?>
                                    <h3 class="alert alert-success">
                                        <?php echo "Cập nhật tài khoản thành công." ?>
                                    </h3>
                                        <?php
                                    }
                                else if (isset($data['result']) && $data['result'] == false) {?>
                                    <h3 class="alert alert-fail">
                                        <?php echo "Cập nhật tài khoản thất bại. Vui lòng thử lại." ?>
                                    </h3>
                                    <?php
                                    }
                                ?>

<?php
                                if (isset($data['pwd']) && $data['pwd'] == true) {?>
                                    <h3 class="alert alert-success">
                                        <?php echo "Thay đổi mật khẩu thành công." ?>
                                    </h3>
                                        <?php
                                    }
                                else if (isset($data['pwd']) && $data['pwd'] == false) {?>
                                    <h3 class="alert alert-fail">
                                        <?php echo "Thay đổi mật khẩu thất bại. Vui lòng thử lại." ?>
                                    </h3>
                                    <?php
                                    }
                                ?>

                                <?php 
                                if (isset($data['acc'])) {
                                    while ($a = mysqli_fetch_array($data['acc'])) { ?>
                                    
                                <div class="right-title">
                                    <h3>Thông tin tài khoản</h3>
                                </div>
                                <div class="account-info">
                                    <div class="info-left">
                                        <img src="public/images/admin/avatar.jpg" alt="avatar" class="avatar-user">
                                        <div class="update-acc-link">
                                            <a onclick="document.getElementById('updateAccModal').style.display='block'" >Bạn muốn cập nhập tài khoản?</a>
                                        </div>
                                        <div class="update-acc-link">
                                            <a onclick="document.getElementById('updatePassModal').style.display='block'" >Bạn muốn đổi mật khẩu?</a>
                                        </div>
                                    </div>
                                    <div class="info-right">
                                        <div class="show-top-title">
                                            <?php echo $a['name'] ?>
                                        </div>
                                        <div class="show-bot-info">
                                            <div class="item-info">
                                                <div class="item-key">Mã nhân viên:</div>
                                                <div class="item-value"><?php echo $a['id_admin'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Email đăng nhập:</div>
                                                <div class="item-value" style="color: #4514ed;"><?php echo $a['email'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Số điện thoại:</div>
                                                <div class="item-value"><?php echo $a['phone'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Địa chỉ:</div>
                                                <div class="item-value"><?php echo $a['address'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Ngày sinh:</div>
                                                <div class="item-value"><?php echo $a['birth'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Giới tính:</div>
                                                <div class="item-value"><?php echo $a['sex'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Quê quán:</div>
                                                <div class="item-value"><?php echo $a['hometown'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Trạng thái:</div>
                                                <?php
                                                if ($a['status'] == 0) {?>
                                                <div class="item-value" style="color: #31b83d;">Hoạt động</div>
                                                <?php }
                                                else if ($a['status'] == 1) {?>
                                                <div class="item-value" style="color: crimson;">Dừng hoạt động</div>
                                                <?php }
                                                 ?>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Quyền sử dụng:</div>
                                                <div class="item-value" style="color: #7349de;"><?php echo $a['level'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Ngày tạo tài khoản:</div>
                                                <div class="item-value"><?php echo $a['create_at'] ?></div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-key">Lần cuối cập nhật:</div>
                                                <div class="item-value"><?php echo $a['update_at'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- update Acc-->
                                <div id="updateAccModal">
                                    <div class="modal-content animationtop">
                                        <div class="modal-header">
                                            <span onclick="document.getElementById('updateAccModal').style.display='none'">X</span>
                                            <h1>Cập nhật tài khoản</h1>
                                        </div>
                                        <div class="modal-container clearfix">
                                            <form action="./admin/updateAccAdmin/<?php echo $_SESSION['loginAdmin']['id_admin'];?>" method="post" class="form-update-acc-admin">
                                                <div class="form-item">
                                                    <label class="required">Họ và Tên</label>
                                                    <input type="text" name="name" value="<?php echo $a['name'] ?>" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label>Email</label>
                                                    <input type="email" name="email" readonly value="<?php echo $a['email'] ?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Số điện thoại</label>
                                                    <input type="tel" name="phone" value="<?php echo $a['phone'] ?>" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Địa chỉ</label>
                                                    <input type="text" name="address" value="<?php echo $a['address'] ?>" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Ngày sinh</label>
                                                    <input type="date" name="birth" value="<?php echo $a['birth'] ?>" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Quê quán</label>
                                                    <input type="text" name="hometown" value="<?php echo $a['hometown'] ?>" class="ipt" required>
                                                </div>
                                                <div class="form-item form-general">
                                                    <div class="form-left">
                                                        <label class="required">Giới tính</label>
                                                        <div>
                                                            <input type="radio" id="female" name="sex" value="Nữ" required>
                                                            <label for="female">Nữ</label><br>
                                                            <input type="radio" id="male" name="sex" value="Nam" required>
                                                            <label for="male">Nam</label><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-right">
                                                        <label for="avatar"><i class="fa-solid fa-upload"></i></label><br>
                                                        <input type="file" id="avatar" name="img">
                                                    </div>
                                                </div>
                                                
                                                <div class="save-btn">
                                                    <button class="btn-p btn-save" type="submit" name="submit">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->

                                <!-- update Password-->
                                <div id="updatePassModal">
                                    <div class="modal-content animationtop">
                                        <div class="modal-header">
                                            <span onclick="document.getElementById('updatePassModal').style.display='none'">X</span>
                                            <h1>Thay đổi mật khẩu</h1>
                                        </div>
                                        <div class="modal-container clearfix">
                                            <form action="./admin/updatePassAdmin/<?php echo $_SESSION['loginAdmin']['id_admin'];?>" method="post" class="form-update-pwd-admin">
                                                <div class="form-item">
                                                    <label class="required">Nhập mật khẩu cũ</label>
                                                    <input type="password" name="oldpwd" value="" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Nhập mật khẩu mới</label>
                                                    <input type="password" name="newpwd" value="" class="ipt" required>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Nhập lại mật khẩu mới</label>
                                                    <input type="password" name="confirmpwd" value="" class="ipt" required>
                                                    <input type="password" name="pwd" value="<?php echo $_SESSION['loginAdmin']['password']?>" class="ipt" style="display: none;">
                                                </div>
                                                
                                                <div class="save-btn">
                                                    <button class="btn-p btn-save" type="submit" name="changePwd">Lưu</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->

                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>