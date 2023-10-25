<div class="account-right-detail">
    <?php
    if (isset($data['result'])) {
        if ($data['result'] == "true") {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật thông tin tài khoản thành công." ?>
            </h3>
        <?php
        }
        else {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật thông tin tài khoản thất bại." ?>
            </h3>
        <?php
        }
    }

    if (isset($data['pwd'])) {
        if ($data['pwd'] == "true") {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật mật khẩu thành công." ?>
            </h3>
        <?php
        }
        else {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật mật khẩu thất bại." ?>
            </h3>
        <?php
        }
    }
    ?>
        <h1>Chi tiết tài khoản</h1>
        <form action="./account/updateInfo/<?php echo $_SESSION['login']['id_client']?>" class="form-account-detail" method="post">
            <div class="form-name">
                <div class="form-item left">
                    <label>Họ</label>
                    <input type="text" name="fname" value="<?php echo $_SESSION['login']['fname']?>" class="ipt">
                </div>
                <div class="form-item right">
                    <label>Tên</label>
                    <input type="text" name="lname" value="<?php echo $_SESSION['login']['lname']?>" class="ipt">
                </div>
            </div>
            <div class="form-item">
                <label class="required">Email</label>
                <input type="email" name="email" readonly value="<?php echo $_SESSION['login']['email']?>" class="ipt">
            </div>
            <div class="form-item">
                <label>Số điện thoại</label>
                <input type="tel" name="phone" value="<?php echo $_SESSION['login']['phone']?>" class="ipt">
            </div>
            <div class="save-btn">
                <button class="btn-p btn-save" type="submit" name="info">Lưu</button>
            </div>
        </form>
        <br>
        <h1>Thay đổi mật khẩu</h1>
        <form action="./account/updatePwd/<?php echo $_SESSION['login']['id_client']?>" class="form-account-change-pwd" method="post">
            <div class="form-item">
                <label class="required">Mặt khẩu cũ</label>
                <input type="password" name="oldpwd" value="" class="ipt" required>
                <input type="password" name="pwd" value="<?php echo $_SESSION['login']['password']?>" class="ipt" style="display: none;">
                <span class="err-mess">
                    <?php
                    if (isset($data['err']['old'])) {
                        echo "*".$data['err']['old'];
                    }
                    else
                    if (isset($data['err']['different2'])) {
                        echo "*".$data['err']['different2'];
                    }
                    ?>
                </span>
            </div>
            <div class="form-item">
                <label class="required">Mật khẩu mới</label>
                <input type="password" name="newpwd" value="" class="ipt" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['err']['new'])) {
                        echo "*".$data['err']['new'];
                    }
                    else
                    if (isset($data['err']['same'])) {
                        echo "*".$data['err']['same'];
                    }
                    ?>
                </span>
            </div>
            <div class="form-item">
                <label class="required">Xác minh mật khẩu mới</label>
                <input type="password" name="confirmpwd" value="" class="ipt" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['err']['confirm'])) {
                        echo "*".$data['err']['confirm'];
                    }
                    else
                    if (isset($data['err']['different'])) {
                        echo "*".$data['err']['different'];
                    }
                    ?>
                </span>
            </div>
            <div class="save-btn">
                <button class="btn-p btn-save" type="submit" name="changePwd">Lưu</button>
            </div>
        </form>
    </div>