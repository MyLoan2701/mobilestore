<div class="account-right-address"  >
<?php
    if (isset($data['result'])) {
        if ($data['result'] == "true") {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật địa chỉ thành công." ?>
            </h3>
        <?php
        }
        else {?>
            <h3 class="alert alert-success">
                <?php echo "Cập nhật địa chỉ thất bại." ?>
            </h3>
        <?php
        }
    }
    
?>
        <h1>địa chỉ</h1>
        <form action="./account/updateAddress/<?php echo $_SESSION['login']['id_client']?>" 
        class="form-account-address" method="post">
            <div class="form-item">
                <label>Địa chỉ mặc định giao hàng:</label>
                <input type="text" name="address" value="<?php echo $_SESSION['login']['address']?>" class="ipt">
            </div>
            <div class="save-btn">
                <button class="btn-p btn-save" type="submit" name="submitA">Lưu</button>
            </div>
        </form>
    </div>