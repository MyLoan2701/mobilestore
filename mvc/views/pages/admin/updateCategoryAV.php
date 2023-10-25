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
                                    <h1>Chi tiết Danh mục</h1>
                                </div>
                                <div class="update-container">
                                    <?php
                                    while ($category = mysqli_fetch_array($data["edit"])) {?>
                                        <div class="update detail">
                                        <div class="show-top">
                                            <img src="public/images/category/<?php echo $category['image'] ?>" alt="avatar" class="show-category">
                                            <div class="show-top-title">
                                                <span><?php echo $category['category_name'] ?></span>
                                            </div>
                                        </div>
                                        <div class="show-bottom">
                                            <div class="detail-title">Chi tiết Danh mục</div>
                                            <div class="detail-info" style="display: block;">
                                                <div>Mô tả: </div>
                                                <div class="description-content">
                                                    <?php echo $category['description'] ?>
                                                </div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Ngày tạo: <?php echo $category['create_at'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Lần cập nhật cuối: <?php echo $category['update_at'] ?></div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Loại danh mục: Điện thoại</div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Trạng thái: 
                                                <?php
                                                if ($category['status'] == 0) {
                                                    echo "Hoạt động";
                                                }
                                                else  echo "Dừng hoạt động";
                                                ?>
                                                </div>
                                            </div>
                                            <div class="detail-info">
                                                <div>Số lượng sản phẩm thuộc danh mục này: <?php 
                                                if (isset($data['count'])) {
                                                    while ($count = mysqli_fetch_array($data['count'])) {
                                                        echo $count['count_idCatgory'];
                                                    }
                                                }
                                                ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update edit">
                                        <div class="edit-title">Cập nhật</div>
                                        <div class="form-content form-update form-update-user">
                                            <form action="admin/updateCategory/<?php echo $category['id_category'] ?>" class="form-update-user" method="POST">
                                                <div class="form-item">
                                                    <label>Tên danh mục</label>
                                                    <input type="text" name="name" value="<?php echo $category['category_name'] ?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Mô tả</label>
                                                    <div>
                                                        <textarea class="ipt ipt-description" name="description" id="description-c" placeholder="Giới thiệu về danh mục"><?php echo $category['description'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-item">
                                                    <label>Trạng thái</label>
                                                    <select class="ipt" name="status">
                                                        <option value="0" <?php if (isset($category['status']) && $category['status'] == 0) echo "selected=\"selected\"";  ?>>Hoạt động</option>
                                                        <option value="1" <?php if (isset($category['status']) && $category['status'] == 1) echo "selected=\"selected\"";  ?>>Dừng hoạt động</option>
                                                    </select>
                                                </div>
                                                <div class="form-item">
                                                    <label class="required">Loại danh mục</label>
                                                    <div>
                                                        <input type="radio" id="phone" name="type" value="Điện thoại" required checked>
                                                        <label for="phone">Điện thoại</label><br>
                                                    </div>
                                                </div>
                                                <div class="form-item">
                                                    <label for="img-c"><i class="fa-solid fa-upload"></i> Ảnh danh mục</label><br>
                                                    <input type="file" id="img-c" name="img" value="<?php echo $category['image'] ?>">
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