<div class="right-admin user-admin">
                        <div class="right-content user-content">
                            <?php
                            if (isset($data['role'])) {?>
                                <h3 class="alert alert-warning">
                                    <?php echo $data['role'] ?>
                                </h3>
                            <?php
                            }
                            ?>
                            <div class="top-content">
                                <div class="create-new">
                                    <button class="btn-p btn-add-new" type="submit" onclick="add_category()">Thêm mới</button>
                                </div>
                                <div class="search">
                                    <form action="./search/searchCategoryA" class="search-form">
                                        <input type="text" class="ipt input-search" id="skw" placeholder="Tìm kiếm..." 
                                        name="key" maxlength="100" autocomplete="off" required>
                                        <button class="btn-search" type="submit" name="search">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if (isset($data["key"])) {?>
                                <div class="search-top clearfix">
                                    <h2>Kết quả tìm kiếm "<?php echo $data['key'];?>"</h2>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="table-content category-list">
                                <table class="table-mng table-category">
                                    <tr class="info-table-title">
                                        <th>
                                            <input class="jss7" tabindex="-1" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select All Rows checkbox" value="">
                                        </th>
                                        <th>Mã danh mục</th>
                                        <th>Ảnh</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>

                                    <?php
                                    while ($category = mysqli_fetch_array($data["category"])) {?>
                                        <tr class="info-table-item">
                                        <td>
                                            <input class="jss7" tabindex="0" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                        </td>
                                        <td id="id_category"><?php echo $category['id_category']; ?></td>
                                        <td>
                                            <div class="img-table-category">
                                                <img src="public/images/category/<?php echo $category['image']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="name"><?php echo $category['category_name']; ?></td>
                                        <td>
                                            <?php
                                            if ($category['status'] == 0) {
                                                echo "Hoat động";
                                            }
                                            else  echo "Dừng hoạt động";
                                            ?>
                                        </td>
                                        <td><a href="admin/showUpdateCategory/<?php echo $category['id_category']; ?>"><button class="btn-p btn-detail" type="submit">Chi Tiết</button></a></td>
                                        <td class="btn-del"><a onclick="document.getElementById('delModal').style.display='block'"><i class="fa-solid fa-trash"></i></a></td>
                                        <!-- Xóa danh mục -->
                                    <div id="delModal">
                                        <div class="modal-content animationtop">
                                            <div class="modal-cancel">
                                                <span onclick="document.getElementById('delModal').style.display='none'">X</span>
                                            </div>
                                            <div class="modal-title">
                                                Xác nhận bạn muốn xóa danh mục đã chọn?
                                            </div>
                                            <div class="modal-container clearfix">
                                                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="./admin/deleteCategory/<?php echo $category['id_category']; ?>">Xóa danh mục</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    </tr>
                                    
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>