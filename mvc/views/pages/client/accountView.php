

<div class="main-account" id="account-client">
    <div class="account-left">
        <label>Thông tin tài khoản</label>
        <ul class="acc-l">
            <?php
            if (isset($data["page2"]) && $data["page2"] == "accInfoView") {?>
                <li class="active"><a href="./account">Quản lý tài khoản</a></li>
            <?php
            }
            else {?>
                <li><a href="./account">Quản lý tài khoản</a></li>
            <?php
            }
            ?>
            
            <?php
            if (isset($data["page2"]) && $data["page2"] == "accDetailView") {?>
                <li class="active"><a href="./account/detail">Chi tiết tài khoản</a></li>
            <?php
            }
            else {?>
                <li><a href="./account/detail">Chi tiết tài khoản</a></li>
            <?php
            }
            ?>
            
            <?php
            if (isset($data["page2"]) && $data["page2"] == "accAddressView") {?>
                <li class="active"><a href="./account/address">Địa chỉ</a></li>
            <?php
            }
            else {?>
                <li><a href="./account/address">Địa chỉ</a></li>
            <?php
            }
            ?>

            <?php
            if (isset($data["page2"]) && $data["page2"] == "accOrderView") {?>
                <li class="active"><a href="./account/order">Quản lý đơn hàng</a></li>
            <?php
            }
            else {?>
                <li><a href="./account/order">Quản lý đơn hàng</a></li>
            <?php
            }
            ?>
            
            <li><a onclick="document.getElementById('logoutModal').style.display='block'">Đăng xuất</a></li>
        </ul>
    </div>
    
    <?php
    require_once "./mvc/views/pages/client/".$data["page2"].".php";
    ?>

    <!-- Đăng xuất -->
    <div id="logoutModal">
        <div class="modal-content animationtop">
            <div class="modal-cancel">
                <span onclick="document.getElementById('logoutModal').style.display='none'">X</span>
            </div>
            <div class="modal-title">
                Xác nhận bạn muốn đăng xuất?
            </div>
            <div class="modal-container clearfix">
                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="./logout">Đăng xuất</a>
            </div>
        </div>
    </div>
    <!--  -->
</div>

