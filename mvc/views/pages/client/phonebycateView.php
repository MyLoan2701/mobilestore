

<div class="main-phone" id="phones">
    <div class="product-top clearfix">
        <div class="product-link">
            <a href="./home">Trang chủ</a>/
            <a href="./phone">Điện thoại</a>/
            <!-- <a href=""></a>/ -->
        </div>
    </div>
    <div class="phone-container clearfix">
        <div class="phone-categoty">
            <?php 
            while($category = mysqli_fetch_array($data['lcategory'])) {?>
            <div class="category-item">
                <a href="./phone/showProductByCategory/<?php echo $category['id_category'] ?>" class="link-category">
                    <div class="item-category-img">
                        <img src="public/images/category/<?php echo $category['image'] ?>" alt="<?php echo $category['category_name'] ?>" class="category-img">
                    </div>
                </a>
            </div>
            <?php
            }
            ?>    
            
        </div>
        <hr>
        <div class="phone-title">
            <h2>Điện thoại <?php $c = mysqli_fetch_array($data['pbcn']); echo $c[0]?></h2>
        </div>
        
        <div class="phone-content">
            <div class="filter-list">
                <div class="filter-sort">
                    <label>Sắp Xếp</label>
                    <hr>
                    <div class="filter-sub">
                        <ul>
                            <li>
                                <a href="">Mặc định</a>
                            </li>
                            <li>
                                <a href="">Giá thấp đến cao</a>
                            </li>
                            <li>
                                <a href="">Giá cao đến thấp</a>
                            </li>
                            <li>
                                <a href="">Sản phẩm bán chạy</a>
                            </li>
                            <li>
                                <a href="">Sản phẩm giảm giá</a>
                            </li>
                            <li>
                                <a href="">Sản phẩm mới cập nhật</a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="phone-list">
                <div class="phone-list-pl">
                    <?php 
                    while($phone = mysqli_fetch_array($data['pbc'])) {?>
                    <div class="product-item">
                        <a href="./productDetail/show/<?php echo $phone['id_product'] ?>" class="link-product">
                            <div class="item-label">
                                <span class="lb-hot">hot</span>
                            </div>
                            <div class="item-img">
                                <img src="public/images/products/phones/<?php echo $phone['img']?>" alt="<?php echo $phone['name']?>" width="207" height="207" class="product-img">
                            </div>
                            <h3 class="product-name"><?php echo $phone['name']?></h3>
                            <strong class="price">
                                <?php echo $this->formatPrice($this->formatSale($phone['price'], $phone['sale'])); ?>
                                <small class="sale">-<?php echo $phone['sale'] ?>%</small>
                            </strong>
                            <?php 
                                    if($phone['sale'] > 0) {?>
                                    <div class="price-old"><?php echo $this->formatPrice($phone['price']) ?></div>
                                        <?php
                                    }
                                    ?>
                        </a>
                    </div>
                        <?php
                    }
                    ?>
                    
                </div>
                <div class="t-center">
                    <div class="pagination">
                        <a href="">&laquo;</a>
                        <a href="" class="active">1</a>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a href="#">&raquo;</a>
                    </div> 
                </div>
            </div>                      
        </div>
        
    </div>
</div>

