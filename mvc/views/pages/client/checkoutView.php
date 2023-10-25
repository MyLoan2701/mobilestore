

<div class="main-checkout" id="checkout">
    <div class="checkout-ship-info">
    <?php 
        if (isset($data['errcheckout']['cart'])) {?>
        <div class="login-required">
            <?php echo $data['errcheckout']['cart'];?>
        </div>
    <?php } ?>
        <form action="./checkout/order" class="form-checkout-info" id="form-checkout" method="POST">
            <h2>thông tin đặt hàng</h2>
            <div class="checkout-info">
                <label for="ck-email" class="required">Email</label>
                <input class="ipt ipt-ck" type="email" name="ck-email" id="ck-email" placeholder="uedit@gmail.com" value="<?php echo $_SESSION['login']['email'] ?>" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['errcheckout']['email'])) {
                        echo "*".$data['errcheckout']['email'];
                    }
                    ?>
                </span>
            </div>
            <div class="checkout-info ck-name">
                <div class="first-name">
                    <label for="ck-fname">Họ</label>
                    <input class="ipt ipt-ck" type="text" name="ck-fname" id="ck-fname" value="<?php echo $_SESSION['login']['fname'] ?>">
                </div>
                <div class="last-name">
                    <label for="ck-lname">Tên</label>
                    <input class="ipt ipt-ck" type="text" name="ck-lname" id="ck-lname" value="<?php echo $_SESSION['login']['lname'] ?>">
                </div>
            </div>
            <div class="checkout-info">
                <label for="ck-rname" class="required">Tên người nhận</label>
                <input class="ipt ipt-ck" type="text" name="ck-rname" id="ck-rname" placeholder="" value="<?php echo $_SESSION['login']['fname']." ".$_SESSION['login']['lname'] ?>" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['errcheckout']['rname'])) {
                        echo "*".$data['errcheckout']['rname'];
                    }
                    ?>
                </span>
            </div>
            <div class="checkout-info">
                <label for="ck-phone" class="required">Số điện thoại</label>
                <input class="ipt ipt-ck" type="tel" name="ck-phone" id="ck-phone" placeholder="" value="<?php echo $_SESSION['login']['phone'] ?>" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['errcheckout']['rname'])) {
                        echo "*".$data['errcheckout']['rname'];
                    }
                    ?>
                </span>
            </div>
            <div class="checkout-info">
                <label for="ck-address" class="required">Địa chỉ</label>
                <input class="ipt ipt-ck" type="text" name="ck-address" id="ck-address" placeholder="" value="<?php echo $_SESSION['login']['address'] ?>" required>
                <span class="err-mess">
                    <?php
                    if (isset($data['errcheckout']['rname'])) {
                        echo "*".$data['errcheckout']['rname'];
                    }
                    ?>
                </span>
            </div>
            <h2 class="required">Phương thức giao hàng</h2>
            <div class="checkout-delivery">
                <input type="radio" checked class="ipt-ck-delivery">
                <div class="ship-method">
                    <div>Miễn phí vận chuyển</div>
                    <div>7 - 10 ngày</div>
                </div>
            </div>
            <h2 class="required">Phương thức thanh toán</h2>
            <div class="checkout-payment">
                <div>
                    <input type="radio" id="offline" name="pay" value="Tiền mặt">
                    <label for="offline">Tiền mặt</label>
                </div>
                <div>
                    <input type="radio" id="online" name="pay" value="Chuyển khoản">
                    <label for="online">Chuyển khoản</label>
                </div>
                <span class="err-mess">
                    <?php
                    if (isset($data['errcheckout']['rname'])) {
                        echo "*".$data['errcheckout']['rname'];
                    }
                    ?>
                </span>
            </div>
            
            <h2>Khác</h2>
            <div class="checkout-other">
                <textarea class="ipt ipt-ck-note" name="ck-note" id="ck-note" placeholder="Ghi chú của bạn"></textarea>
            </div>
        </form>
    </div>
    <div class="checkout-order-sumary">
        <h2>Thông tin đơn hàng</h2>
        <div class="ck-item-cart">
            <div class="order-info">
                <p>Số mặt hàng trong giỏ (<?php echo count($_SESSION['cart'])?>)</p>
                <div style="display: flex;">
                <div class="show-btn" onclick="showCart()">
                    <i class="fa-solid fa-angles-down"></i>
                </div>
                <div class="hide-btn" onclick="hideCart()">
                    <i class="fa-solid fa-angles-up"></i>
                </div>
                </div>
            </div>
            <div id="ck-order">
            <?php 
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
            {
                $sum = 0;
                while ($cart = mysqli_fetch_array($data['getCart']))
                {?>
                <div class="ck-order-item">
                    <img src="public/images/products/phones/<?php echo $cart['img'] ?>" 
                    alt="<?php echo $cart['img'] ?>" class="ck-order-item-img">
                    <div class="item-info">
                        <p><?php echo $cart['name'] ?></p>
                        <p>Số lượng: <span><?php echo $_SESSION['cart'][$cart['id_product']] ?></span></p>
                    </div>
                    <p class="item-price"><?php echo $this->formatPrice($this->formatSale($cart['price'], $cart['sale'])) ?> ₫</p>
                </div>
                <?php
                $sum += $this->formatSale($cart['price'], $cart['sale'])*$_SESSION['cart'][$cart['id_product']];
                }
            }
            ?>
            </div>
        </div>
        <div class="ck-order-info-container">
            <div class="order-info">
                <p class="label">Tiền hàng (tạm tính): </p>
                <p class="value"><?php 
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    echo $this->formatPrice($sum);}
                else echo 0;?> ₫</p>
            </div>
            <div class="order-info">
                <p class="label">Phí vận chuyển: </p>
                <p class="value">FREE</p>
            </div>
            <div class="order-info">
                <p class="label">Thuế: </p>
                <p class="value">0 ₫</p>
            </div>
        </div>
        <div class="order-total">
            <p class="label">Tổng tiền: </p>
            <p class="value"><?php 
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    echo $this->formatPrice($sum);}
                else echo 0;?> ₫</p>
        </div>
        <div class="checkout-order t-center">
            <input class="btn-p btn-order" type="submit" form="form-checkout" value="Hoàn tất đặt hàng" name="order">
        </div>
    </div>
</div>

