<!-- Đăng ký -->
<?php 
if (isset($data['result']) && $data['result'] == "true") {?>
<div class="notify success-signup" id="sign-up-success">
    <div class="notify-icon-success">
        <i class="fas fa-check-circle"></i>
    </div>
    <div class="notify-p1">
        Đặt hàng thành công!
    </div>
    <div class="notify-p2">
        <p>Bạn đã đặt hàng thành công khi sử dụng tài khoản trên UEDIT.</p>
        <p>Chúng tôi sẽ chủ động liên hệ đến bạn sớm nhất có thể.</p>
    </div>
    <div style="margin: 20px 0;">
        <a class="btn-p back" href="./home">Tiếp tục mua sắm</a>
    </div>
</div>
<?php
}
?>

<!-- Đăng nhập -->
<!-- <div class="notify success-signup" id="sign-up-success">
    <div class="notify-icon-success">
        <i class="fas fa-check-circle"></i>
    </div>
    <div class="notify-p1">
        Đăng nhập thành công
    </div>
    <div class="notify-p2">
        <p>Bạn đã đăng nhập thành công tài khoản trên UEDIT.</p>
        <p>Bạn có thể cập nhật và chỉnh sửa thông tin trong phần quản lý thông tin.</p>
    </div>
    <div>
        <button class="btn-p back">Quay lại trang trước</button>
    </div>
</div> -->