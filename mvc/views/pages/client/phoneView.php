

<div class="main-phone" id="phones">
    <div class="product-top clearfix">
        <div class="product-link">
            <a href="./home">Trang chủ</a>/
            <a href="./phone/show/all/1">Điện thoại</a>/
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
            <h2>Điện thoại <?php
            if (isset($data['name'])) {
                echo $data['name'];
            } 
            if (isset($data['pbcn'])) {
                $c = mysqli_fetch_array($data['pbcn']);
                echo $c[0];
            }?></h2>
        </div>
        <div class="phone-content">
            <div class="filter-list">
                <div class="filter-sort">
                    <label>Sắp Xếp</label>
                    <hr>
                    <div class="filter-sub">
                        <ul>
                            <li>
                                <a href="./phone/show/all/1">Mặc định</a>
                            </li>
                            <li>
                                <a href="./phone/show/asc/1">Giá thấp đến cao</a>
                            </li>
                            <li>
                                <a href="./phone/show/desc/1">Giá cao đến thấp</a>
                            </li>
                            <li>
                                <a href="./phone/show/hot/1">Sản phẩm bán chạy</a>
                            </li>
                            <li>
                                <a href="./phone/show/sale/1">Sản phẩm giảm giá</a>
                            </li>
                            <li>
                                <a href="./phone/show/new/1">Sản phẩm mới cập nhật</a>
                            </li>
                        </ul>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="phone-list">
                <div class="phone-list-pl">
                    <?php 
                    if (isset($data['phone'])) {
                        while($phone = mysqli_fetch_array($data['phone'])) {?>
                        <div class="product-item">
                            <a href="./productDetail/show/<?php echo $phone['id_product'] ?>" class="link-product">
                            <div class="item-label">
                                <?php if (isset($data['the'])) {?>
                                    <span class="lb-<?php echo $data['the']  ?>"><?php echo $data['the']  ?></span>
                                    <?php
                                } ?>
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
                }

                if (isset($data['pbc'])) {
                    while($phone = mysqli_fetch_array($data['pbc'])) {?>
                        <div class="product-item">
                            <a href="./productDetail/show/<?php echo $phone['id_product'] ?>" class="link-product">
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
                }
                    ?>
                    
                </div>
                <div class="t-center">
                    <div class="pagination">
                        <?php 
                        if (isset($data['paging']) && isset($data['currentPage'])) {
                            if ($data['currentPage'] > 3)
                        {?>
                            <a href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/1"?>">&laquo;</a>
                        <?php }
                        if ($data['currentPage'] > 1)
                        {
                            $prev = $data['currentPage'] - 1;?>
                            <a href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/".$prev;?>">&lt;</a>
                        <?php }
                        for ($i = 1; $i <= $data['paging']; $i++) { 
                            if ($i != $data['currentPage']) {?>
                                <a href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/".$i;?>"><?php echo $i;?></a>
                            <?php }
                            else{?>
                                <a class="active" href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/".$i;?>"><?php echo $i;?></a>
                            <?php }
                        }
                        if ($data['currentPage'] < $data['paging'])
                        {
                            $next = $data['currentPage'] + 1;?>
                            <a href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/".$next;?>">&gt;</a>
                        <?php }
                        if ($data['currentPage'] < $data['paging'] - 3)
                        {?>
                            <a href="./phone/show/<?php echo explode("/", filter_var(trim($_GET["url"], "/")))[2]."/".$data['paging']?>">&raquo;</a>
                        <?php }
                        }
                        ?>
                    </div> 
                </div>
            </div>                      
        </div>
        
    </div>
</div>

