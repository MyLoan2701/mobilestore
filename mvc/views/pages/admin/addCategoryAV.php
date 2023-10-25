<div class="right-admin add-admin add-category">
                        <div class="right-content add-content">
                            <div class="top-content">
                                <h1>Danh mục mới</h1>
                            </div>
                            <div class="form-content form-add form-add-user">
                                <form action="admin/addCategory" method="POST" class="form-add-user">
                                    <div class="form-item">
                                        <label for="img-c"><i class="fa-solid fa-upload"></i></label><br>
                                        <input type="file" id="img-c" name="img">
                                    </div>
                                    <div class="form-item">
                                        <label class="required">Tên danh mục</label>
                                        <input type="text" name="name" value="" class="ipt" required>
                                    </div>
                                    <div class="form-item">
                                        <label>Mô tả</label>
                                        <div>
                                            <textarea class="ipt ipt-description" name="description" id="description-c" placeholder="Giới thiệu về danh mục"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-item">
                                        <label>Trạng thái</label>
                                        <select class="ipt" name="status">
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Dừng hoạt động</option>
                                        </select>
                                    </div>
                                    <div class="form-item">
                                        <label class="required">Loại danh mục</label>
                                        <div>
                                            <input type="radio" id="phone" name="type" value="Điện thoại" required checked>
                                            <label for="phone">Điện thoại</label><br>
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