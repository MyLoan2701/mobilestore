<div class="right-admin product-admin">
                        <div class="right-content product-content">
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
                                    <button class="btn-p btn-add-new" type="submit" onclick="add_phone()">Thêm mới</button>
                                </div>
                                <div class="search">
                                    <form action="./search/searchProductA" class="search-form">
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
                            <div class="table-content product-list">
                                <table class="table-mng table-product">
                                    <tr class="info-table-title">
                                        <th>
                                            <input class="jss7" tabindex="-1" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select All Rows checkbox" value="">
                                        </th>
                                        <th>Mã sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hãng</th>
                                        <th>Giá</th>
                                        <th>Kho</th>
                                        <th>Đã bán</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>
                                    <?php
                                    while ($product = mysqli_fetch_array($data["list"])) {?>
                                        <tr class="info-table-item">
                                        <td>
                                            <input class="jss7" tabindex="0" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                        </td>
                                        <td><?php echo $product['id_product']; ?></td>
                                        <td>
                                            <div class="img-table-product">
                                                <img src="public/images/products/phones/<?php echo $product['img']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="name"><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['namecate']; ?></td>
                                        <td><?php echo $this->formatPrice($this->formatSale($product['price'], $product['sale'])); ?></td>
                                        <td style="font-weight: bold;"><?php echo $product['stock']; ?></td>
                                        <td style="color: #80bdff;"><?php if ($product['sold'] == '') {
                                            echo 0;
                                        } else echo $product['sold']; ?></td>
                                        <td>
                                            <?php
                                            if ($product['activity'] == 0) {
                                                echo "Hoat động";
                                            }
                                            else  echo "Dừng hoạt động";
                                            ?>
                                        </td>
                                        <td><a href="admin/showUpdatePhone/<?php echo $product['id_product']; ?>"><button class="btn-p btn-detail" type="submit">Chi Tiết</button></a></td>
                                        <td class="btn-del"><a onclick="document.getElementById('delModal2').style.display='block'"><i class="fa-solid fa-trash"></i></a></td>
                                        <!-- Xóa điện thoại -->
                                    <div id="delModal2">
                                        <div class="modal-content animationtop">
                                            <div class="modal-cancel">
                                                <span onclick="document.getElementById('delModal2').style.display='none'">X</span>
                                            </div>
                                            <div class="modal-title">
                                                Xác nhận bạn muốn xóa sản phẩm đã chọn?
                                            </div>
                                            <div class="modal-container clearfix">
                                                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="admin/deleteProduct/<?php echo $product['id_product']; ?>">Xóa sản phẩm</a>
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