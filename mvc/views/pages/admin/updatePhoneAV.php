<div class="right-admin update-admin update-user">
                            <div class="right-content update-content">
                            <?php
                            if (isset($data['role'])) {?>
                                <h3 class="alert alert-warning">
                                    <?php echo $data['role'] ?>
                                </h3>
                            <?php
                            }
                            ?>
                                <div class="top-content">
                                    <h1>Chi tiết sản phẩm</h1>
                                </div>
                                <div class="update-container">
                                <?php
                                    while ($product = mysqli_fetch_array($data["edit"])) {
                                        $sale = $product['sale'];
                                        $i = $product['info'];
                                        $d = $product['description'];
                                        ?>
                                    <div class="update detail">
                                        <div class="show-top">
                                            <img src="public/images/products/phones/<?php echo $product['img'] ?>" alt="avatar" class="show-product">
                                            <div class="show-top-title">
                                                <span><?php echo $product['name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="show-bottom">
                                            <div class="detail-title">Chi tiết Danh mục</div>
                                            <div class="detail-info">
                                                <div>Mã: <?php echo $product['id_product'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Danh mục: <?php echo $product['namecate'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Trạng thái: 
                                                <?php
                                                if ($product['activity'] == 0) {
                                                    echo "Hoạt động";
                                                }
                                                else  echo "Dừng hoạt động";
                                                ?>
                                                </div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Giảm giá: <?php echo $product['sale'] ?>%</div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Kho: <?php echo $product['stock'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Đã bán: <?php if ($product['sold'] == '') {
                                                    echo 0;
                                                } else echo $product['sold'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Ngày phát hành: <?php echo $product['release_at'] ?></div>
                                            </div>
                                            <div class="detail-info" style="display: block;">
                                                <div>Mô tả: </div>
                                                <div class="description-content">
                                                    <?php echo $product['description'] ?>
                                                </div>
                                            </div>
                                            <div class="detail-info" style="display: block;">
                                                <div>Thông số: </div>
                                                <div class="description-content">
                                                    <?php echo $product['info'] ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="update edit">
                                        <div class="edit-title">Cập nhật</div>
                                        <div class="form-content form-update form-update-user">
                                            <form action="admin/updateProduct/<?php echo $product['id_product'] ?>" class="form-update-user" method="POST">
                                                <div class="form-item">
                                                    <label for="img-p"><i class="fa-solid fa-upload"></i></label><br>
                                                    <input type="file" id="img-p" name="img" value="<?php echo $product['img'] ?>">
                                                </div>
                                                <div class="form-general">
                                                    <div class="form-left">
                                                        <div class="form-item">
                                                            <label>Tên sản phẩm</label>
                                                            <input type="text" name="name" value="<?php echo $product['name'] ?>" class="ipt">
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Giá sản phẩm</label>
                                                            <input type="number" name="price" value="<?php echo $product['price'] ?>" class="ipt">
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Kho</label>
                                                            <input type="number" name="stock" value="<?php echo $product['stock'] ?>" class="ipt">
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Danh mục</label>
                                                            <select class="ipt" name="id_c" id="category">
                                                                <?php while ($product = mysqli_fetch_array($data["category"])) {?>
                                                                    <option value="<?php echo $product['id_category'] ?>">
                                                                    <?php echo $product['category_name'] ?></option>
                                                                    <?php
                                                                    }?>
                                                            </select>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Trạng thái</label>
                                                            <select class="ipt" name="activity">
                                                                <option value="0" <?php if (isset($product['activity']) && $product['activity'] == 0) echo "selected=\"selected\"";  ?>>Hoạt động</option>
                                                                <option value="1" <?php if (isset($product['activity']) && $product['activity'] == 1) echo "selected=\"selected\"";  ?>>Dừng hoạt động</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Ngày phát hành</label>
                                                            <input type="date" name="release" class="ipt" value="<?php echo $product['release_at'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-right">
                                                        <div class="form-item">
                                                            <label>Giảm giá</label>
                                                            <input type="number" name="sale" value="<?php echo $sale ?>" class="ipt">
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Mô tả</label>
                                                            <div>
                                                                <textarea class="ipt ipt-description" name="description" id="description-p" placeholder="Giới thiệu về sản phẩm"><?php echo $d ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Thông số</label>
                                                            <div>
                                                                <textarea class="ipt ipt-description" name="info" id="info-p" placeholder="Thông số sản phẩm"><?php echo $i ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="save-btn">
                                                    <button class="btn-p btn-save" type="submit" name="submit">Lưu</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if (isset($data["result"])) {
                                    if ($data["result"] == "true") {?>
                                        <h3 class="alert alert-success">
                                            <?php echo "Cập nhật thành công" ?>
                                        </h3>
                                        <?php
                                    }
                                    else {?>
                                        <h3 class="alert alert-fail">
                                            <?php echo "Cập nhật thất bại" ?>
                                        </h3>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                            </div>
                        </div>