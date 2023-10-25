<div class="main-search">
                <div class="search-top clearfix">
                    <h2>Kết quả tìm kiếm "<?php 
                    if (isset($data['key'])) {
                        echo $data['key'];
                    }
                    ?>"</h2>
                </div>
                <div class="search-container clearfix">
                    <div class="search-content">
                        <div class="result-list">
                            <div class="result-list-pl">
                                <?php
                                if (isset($data['rs'])) {
                                    while($rs = mysqli_fetch_array($data['rs'])){?>
                                    <div class="product-item">
                                    <a href="./productDetail/show/<?php echo $rs['id_product'] ?>" class="link-product">
                                        <div class="item-img">
                                            <img src="public/images/products/phones/<?php echo $rs['img']?>"
                                            alt="<?php echo $rs['name']?>" class="product-img" width="207" height="207">
                                        </div>
                                        <h3 class="product-name"><?php echo $rs['name']?></h3>
                                        <strong class="price">
                                            <?php echo $this->formatPrice($this->formatSale($rs['price'], $rs['sale'])); ?>
                                            <small class="sale">-<?php echo $rs['sale'] ?>%</small>
                                        </strong>
                                        <?php
                                        if ($rs['sale'] > 0) {?>
                                            <div class="price-old"><?php echo $this->formatPrice($rs['price']) ?></div>
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
                        </div>
                    </div>
                </div>
            </div>