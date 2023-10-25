

<div class="main-product" id="product">
<?php while ($pd = mysqli_fetch_array($data["detail"])) {?>
    <div class="product-top clearfix">
        <div class="product-link">
            <a href="./home">Trang chủ</a>/
            <a href="./phone/show/all/1">Điện thoại</a>/
            <a href="./phone/showProductByCategory/<?php echo $pd['id_category']?>"><?php echo $pd['namecate'] ?></a>/
        </div>
    </div>
    <div class="product-deatail-container clearfix">
        <div class="product-name t-upper">
            <h1 class="pd-name"><?php echo $pd['name']?></h1>
        </div>
        <hr>
        <div class="product-detail clearfix">
            <div class="pd-left clearfix">
                <div class="pd-img">
                    <img src="public/images/products/phones/<?php echo $pd['img']?>" alt="<?php echo $pd['name']?>">
                </div>
                <div class="pd-description">
                    <div class="pd-title">Mô tả sản phẩm</div>
                    <?php
                    if ($pd['description'] == '') {?>
                    <p class="p-param">Đây là một mô tả sản phẩm. Đây là một nơi tuyệt vời để "bán" sản phẩm của bạn và thu hút sự chú ý của người mua. Mô tả sản phẩm của bạn một cách rõ ràng và ngắn gọn. Sử dụng các từ khóa duy nhất. Viết mô tả của riêng bạn thay vì sử dụng bản sao của nhà sản xuất.</p>
                        <?php
                    }
                    else {?>
                    <p class="p-param"><?php echo $pd['description'] ?></p>
                    <?php }
                     ?>
                    
                </div>
                <div class="pd-policy">
                    <div class="pd-policy-item">
                        <img src="public/images/banner/icon/genuine-product.png" alt="genuine-product" class="icon-gp">
                        <p>Hàng chính hãng - bảo hành 12 tháng</p>
                    </div>
                    <div class="pd-policy-item">
                        <img src="public/images/banner/icon/freeship.png" alt="freeship" class="icon-ship">
                        <p>Giao hàng toàn quốc</p>
                    </div>
                </div>
            </div>
            <div class="pd-right clearfix">
                <p class="pd-price">
                    <strong><?php echo $this->formatPrice($this->formatSale($pd['price'], $pd['sale'])) ?> ₫</strong>
                    <?php
                    if($pd['sale'] > 0) {?>
                    <span><?php echo $this->formatPrice($pd['price']) ?></span>
                    <?php
                    }?>
                </p>
                <form action="./cart/addCart/<?php echo $pd['id_product'] ?>" class="form-pd-qty" method="POST">
                    <div class="pd-quantity">
                        <label for="qty">Số lượng</label>
                        <br>
                        <input type="number" name="qty[<?php echo $pd['id_product'] ?>]" id="qty" value="1" 
                        class="ipt ipt-qty" min = "1" max = "999">
                    </div>
                    <div class="pd-submit">
                        <input type="submit" name="addCart" class="ipt ipt-addCart" id="addCart" value="Thêm vào giỏ hàng">
                    </div>
                    <div class="pd-buynow t-upper">
                        <button class="btn-p btn-buy-now" type="submit" name="buynow">Mua Ngay</button>
                    </div>
                    <?php
                    if ($pd['stock2'] <= 5) {?>
                    <div class="pd-stock5">
                        Số lượng sản phẩm còn lại là <?php echo $pd['stock2']?>
                    </div>
                    <?php } ?>
                </form>
                <div class="pd-info">
                    <div class="pd-title">Thông tin sản phẩm</div>
                    <?php
                    if ($pd['info'] == '') {?>
                    <p class="p-param">Đây là một chi tiết sản phẩm. Tôi là nơi tuyệt vời để bổ sung thêm thông tin về sản phẩm của bạn như định cỡ, chất liệu, hướng dẫn chăm sóc và làm sạch. Đây cũng là không gian tuyệt vời để viết điều gì làm cho sản phẩm này trở nên đặc biệt và làm thế nào để khách hàng của bạn có thể hưởng lợi từ mặt hàng này.</p>
                        <?php
                    }
                    else {?>
                    <p class="p-param"><?php echo $pd['info'] ?></p>
                    <?php }
                     ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

