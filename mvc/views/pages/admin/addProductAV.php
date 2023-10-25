<div class="right-admin add-admin add-product">
                        <div class="right-content add-content">
                            <div class="top-content">
                                <h1>Sản phẩm mới</h1>
                            </div>
                            <div class="form-content form-add form-add-user">
                                <form action="admin/addProduct" class="form-add-user" method="POST">
                                    <div class="form-item">
                                        <label for="img-p"><i class="fa-solid fa-upload"></i></label><br>
                                        <input type="file" id="img-p" name="img">
                                    </div>
                                    <div class="form-general">
                                        <div class="form-left">
                                            <div class="form-item">
                                                <label>Tên sản phẩm</label>
                                                <input type="text" name="name" value="" class="ipt">
                                            </div>
                                            <div class="form-item">
                                                <label>Giá sản phẩm</label>
                                                <input type="number" name="price" value="0" class="ipt">
                                            </div>
                                            <div class="form-item">
                                                <label>Kho</label>
                                                <input type="number" name="stock" value="100" class="ipt">
                                            </div>
                                            <div class="form-item">
                                                <label>Danh mục</label>
                                                <select class="ipt" name="id_c" id="category">
                                                    <?php while ($product = mysqli_fetch_array($data["category"])) {?>
                                                        <option value="<?php echo $product['id_category'] ?>"
                                                        >
                                                        <?php echo $product['category_name'] ?></option>
                                                        <?php
                                                    }?>
                                                </select>
                                            </div>
                                            <div class="form-item">
                                                <label>Trạng thái</label>
                                                <select class="ipt" name="activity">
                                                    <option value="true">Hoạt động</option>
                                                    <option value="false">Dừng hoạt động</option>
                                                </select>
                                            </div>
                                            <div class="form-item">
                                                <label>Ngày phát hành</label>
                                                <input type="date" name="release" class="ipt">
                                            </div>
                                        </div>
                                        <div class="form-right">
                                            <div class="form-item">
                                                <label>Giảm giá</label>
                                                <input type="number" name="sale" value="0" class="ipt">
                                            </div>
                                            <div class="form-item">
                                                <label>Mô tả</label>
                                                <div>
                                                    <textarea class="ipt ipt-description" name="description" id="description-p" placeholder="Giới thiệu về sản phẩm"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-item">
                                                <label>Thông số</label>
                                                <div>
                                                    <textarea class="ipt ipt-description" name="info" id="info-p" placeholder="Thông số sản phẩm"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="save-btn">
                                        <button class="btn-p btn-save" type="submit" name="submit">Lưu</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($data["result"])) {
                                    if ($data["result"] == "true") {?>
                                        <h3 class="alert alert-success">
                                            <?php echo "Thêm thành công" ?>
                                        </h3>
                                        <?php
                                    }
                                    else {?>
                                        <h3 class="alert alert-fail">
                                            <?php echo "Thêm thất bại" ?>
                                        </h3>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>