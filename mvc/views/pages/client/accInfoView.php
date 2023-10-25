<div class="account-right-info">
        <div class="account-welcome col-2">
            <h1>Xin chào <?php echo $_SESSION['login']['fname']." ".$_SESSION['login']['lname']?>!</h1>
            <p>Từ Trang Quản lý tài khoản, bạn có thể xem nhanh về hoạt động tài khoản gần đây và cập nhật thông tin tài khoản của mình. Chọn một liên kết bên dưới để xem hoặc chỉnh sửa thông tin.</p>
        </div>
        <div class="account-info col-2">
            <h3>Chi tiết tài khoản</h3>
            <p><?php echo $_SESSION['login']['fname']." ".$_SESSION['login']['lname']?></p>
            <a href="#"><?php echo $_SESSION['login']['email']?></a>
            <div class="account-btn">
                <a href="./account/detail" class="btn-p btn-account-info">Cập nhật thông tin tài khoản</a>
                <a href="./account/detail" class="btn-p btn-account-change-pwd">Thay đổi mật khẩu</a>
            </div>
        </div>
        <div class="account-info">
            <h3>Quản lý đơn hàng</h3>
            <p>Đơn hàng gần nhất: 
                <span></span>
            </p>
            <div class="account-btn">
                <a href="./account/order" class="btn-p btn-mng-order">Quản lý đơn hàng</a>
            </div>
        </div>
        <div class="account-info">
            <h3>Địa chỉ thanh toán mặc định</h3>
            <p>Bạn chưa cập nhật địa chỉ mặc định</p>
            <div class="account-btn">
                <a href="./account/address" class="btn-p btn-address">Cập nhật địa chỉ</a>
            </div>
        </div>
        <div class="account-info col-2">
            <h3>Đăng xuất</h3>
            <p>Đăng xuất khỏi tài khoản của bạn</p>
            <div class="account-btn">
                <a class="btn-p btn-logout" href="./logout">Đăng xuất</a>
            </div>
        </div>
    </div>