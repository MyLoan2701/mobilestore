
<div class="cart" id="cart">
    <form action="./cart/updateCart" class="main-cart" method="POST">
    <div class="mycart">
        <div class="cart-title">giỏ hàng</div>
        <div class="cart-container">
            <?php 
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $stt = 1;
                $sum = 0;
                while ($cart = mysqli_fetch_array($data['getCart'])) {
                    ?>
                    <div class="cart-item">
                        <div style="width: 50px;"><?php echo $stt ?></div>
                        <img src="public/images/products/phones/<?php echo $cart['img'] ?>" 
                        alt="<?php echo $cart['img'] ?>" class="cart-item-img">
                        <div class="cart-item-info">
                            <div class="cart-item-name">
                            <?php echo $cart['name'] ?>
                            </div>
                            <div class="cart-item-price">
                                <span>
                                <?php echo $this->formatPrice($this->formatSale($cart['price'], $cart['sale'])) ?> ₫
                                </span>
                            </div>
                        </div>

                        <?php if ($cart['stock2'] <= $_SESSION['cart'][$cart['id_product']]) {?>
                        <div class="cart-item-warning">
                            Số lượng sản phẩm còn lại <?php echo $cart['stock2'];?>!
                        </div>
                        <?php if ($cart['stock2'] < $_SESSION['cart'][$cart['id_product']]) {?>
                        <input type="text" name="err" value="false" hidden>
                        <?php }
                        }?>

                        <div class="cart-item-qty">
                            <input type="number" class="ipt ipt-cart-qty t-center" 
                            min="1" max="999" step="1" 
                            value="<?php echo $_SESSION['cart'][$cart['id_product']] ?>" 
                            name="qty[<?php echo $cart['id_product'] ?>]">
                        </div>
                        <p class="cart-item-total t-center">
                        <?php echo $this->formatPrice($this->formatSale($cart['price'], $cart['sale'])*$_SESSION['cart'][$cart['id_product']]) ?> ₫
                        </p>
                        <div class="cart-item-del">
                            <a class="btn-cart-item-del" href="./cart/delItem/<?php echo $cart['id_product'] ?>">X</a>
                        </div>
                    </div>
                <?php
                $stt++;
                $sum += $this->formatSale($cart['price'], $cart['sale'])*$_SESSION['cart'][$cart['id_product']];
                }
                ?>
                <div style="float: right;">
                    <input type="submit" name="updateCart" value="Cập nhật" 
                    class="ipt-submit ipt-update" style="background-color: #ff8b00;">
                </div>
                <div style="float: right;">
                    <input type="submit" name="delCart" value="Xóa toàn bộ" 
                    class="ipt-submit ipt-del" style="background-color: #ff0000;">
                </div>
                <?php
                
            }
            else {?>
                <div class="empty-cart">
                    <img src="public/images/banner/cart/cart-empty.jpg" alt="empty-cart" class="empty-cart-img">
                    <p>Giỏ hàng trống</p>
                </div>
            <?php }
            ?>
            
        </div>
    </div>
    <div class="order-sumary">
        <div class="cart-title">Tóm tắt đơn hàng</div>
        <div class="order-sumary-container">
            <div class="order-info">
                <p class="label">Tiền hàng (tạm tính): </p>
                <p class="value">
                    <?php 
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                        echo $this->formatPrice($sum);}
                        else echo 0;
                    ?>
                     ₫
                </p>
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
                        else echo 0;
                    ?>
                     ₫</p>
        </div>
        <div class="cart-checkout">
            <?php 
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {?>
            <button class="btn-p btn-checkout" type="submit" name="checkout">
                Đặt hàng
            </button>
            <?php }
            else {?>
            <button class="btn-p btn-checkout" disabled type="submit" name="checkout">Đặt hàng</button>
            <?php }
            ?>
            
        </div>
    </div>
    </form>
</div>
