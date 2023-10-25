<div class="right-admin update-admin update-user">
                            <div class="right-content update-content">
                                <div class="top-content">
                                    <h1>Chi tiết đơn hàng</h1>
                                </div>
                                <div class="update-container-order">
                                    <?php
                                    while ($o = mysqli_fetch_array($data["order"])) {?>
                                    <div class="update-top">
                                        <div class="update client">
                                            <div class="show-top">
                                                <img src="public/images/admin/avatar.jpg" alt="avatar" class="show-avatar">
                                                <div class="show-top-title">
                                                    <span>Khách hàng</span>
                                                </div>
                                            </div>
                                            <div class="show-bottom">
                                                <div class="detail-info">
                                                    <div class="item-key">Mã khách hàng: </div>
                                                    <div class="item-value"><?php echo $o['id_client'];?></div>
                                                </div>
                                                <div class="detail-info">
                                                    <!-- <div style="flex: 1 1;">Họ: </div>
                                                    
                                                    <div style="flex: 1 1;">Tên: </div> -->
                                                    <div class="item-key">Tên Khách hàng: </div>
                                                    <div class="item-value"><?php echo $o['fname']." ".$o['lname'];?></div>
                                                </div>
                                                <div class="detail-info">
                                                    <div class="item-key">Tên người nhận: </div>
                                                    <div class="item-value" style="color: #551a8b;"><?php echo $o['rname'];?></div>
                                                </div>
                                                <div class="detail-info">
                                                    <div class="item-key">SĐT: </div>
                                                    <div class="item-value"  style="color: #551a8b;"><?php echo $o['phone'];?></div>
                                                </div>
                                                <div class="detail-info">
                                                    <div class="item-key">Địa chỉ: </div>
                                                    <div class="item-value"  style="color: #551a8b;"><?php echo $o['address'];?></div>
                                                </div>
                                                <div class="detail-info" style="display: block;">
                                                    <div class="item-key">Ghi chú: </div>
                                                    <div class="description-content">
                                                        <?php 
                                                        if ($o['other'] == null) {
                                                            echo "(Ghi chú khách hàng)";
                                                        }
                                                        else echo $o['other'];?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="update order">
                                            <div class="edit-title">Đơn hàng</div>
                                            <div class="order-container">
                                                <div class="order-item">
                                                    <div class="item-key">Mã:</div>
                                                    <div class="item-value"><?php echo $o['id_order'];?></div>
                                                </div>
                                                <div class="order-item">
                                                    <div class="item-key">Ngày tạo:</div>
                                                    <div class="item-value"><?php echo $o['create_at'];?></div>
                                                </div>
                                                <div class="order-item">
                                                    <div class="item-key">Giao hàng:</div>
                                                    <div class="item-value">Free</div>
                                                </div>
                                                <div class="order-item">
                                                    <div class="item-key">Thanh toán:</div>
                                                    <div class="item-value" style="color: #551a8b;">
                                                        <?php 
                                                        if ($o['id_payment'] == 1) {echo "Trực tiếp";}
                                                        else if ($o['id_payment'] == 2) {echo "Chuyển khoản";}
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="order-item">
                                                    <div class="item-key">Trạng thái đơn:</div>
                                                    <?php
                                                    if ($o['status'] == 1) {?>
                                                        <div class="item-value" style="color: rgb(59, 90, 176);">Chờ xác nhận</div>
                                                    <?php }
                                                    if ($o['status'] == 2) {?>
                                                        <div class="item-value" style="color: orange;">Đã xác nhận</div>
                                                    <?php }
                                                    if ($o['status'] == 3) {?>
                                                        <div class="item-value" style="color: #e8e800;">Vận chuyển</div>
                                                    <?php }
                                                    if ($o['status'] == 4) {?>
                                                        <div class="item-value" style="color: greenyellow;">Đã giao</div>
                                                    <?php }
                                                    if ($o['status'] == 5) {?>
                                                        <div class="item-value" style="color: red;">Đã hủy</div>
                                                    <?php }
                                                    if ($o['status'] == 6) {?>
                                                        <div class="item-value" style="color: rgb(177 62 0);">Xác minh lại</div>
                                                    <?php }
                                                    ?>
                                                    <!-- <div class="item-value">
                                                        <select class="transactionUpdateSelect" 
                                                        style="background-color: rgb(235, 241, 254); 
                                                        color: rgb(59, 90, 176);">
                                                            <option value="Pending" style="background-color: 
                                                            rgb(235, 241, 254); color: rgb(59, 90, 176);">
                                                            Chờ xác nhận</option>
                                                            <option value="Approved" 
                                                            style="background-color: rgb(229, 250, 242); 
                                                            color: rgb(59, 176, 119);">Đã xác nhận</option>
                                                            <option value="Declined" 
                                                            style="background-color: rgb(255, 240, 241); 
                                                            color: rgb(176, 59, 78);">Đã hủy</option>
                                                            <option value="Cancelled" 
                                                            style="background-color: rgb(254, 235, 235);
                                                            color: rgb(176, 59, 59);">Đã giao</option>
                                                            <option value="PendingCancel" 
                                                            style="background-color: rgb(254, 243, 235); 
                                                            color: rgb(176, 100, 59);">Chờ hủy</option>
                                                            </select>
                                                    </div> -->
                                                </div>
                                                <div class="order-item">
                                                    <div class="item-key">Tổng tiền:</div>
                                                    <div class="item-value"  style="color: #80bdff;"><?php echo $this->formatPrice($o['total']) ?>đ</div>
                                                </div>
                                                <div class="order-item" style="display: block;">
                                                    <div class="item-key">Ghi chú nhân viên:</div>
                                                    <div class="description-content">
                                                        <?php 
                                                        if ($o['note_a'] == null) {
                                                            echo "(Ghi chú của nhân viên về đơn hàng này)";
                                                        }
                                                        else echo $o['note_a'];?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="update-bottom">
                                        <div class="update od">
                                            <div class="table-content order-list">
                                                <table class="table-mng table-order">
                                                    <tr class="info-table-title">
                                                        <th>
                                                            <input class="jss7" tabindex="-1" type="checkbox" 
                                                            data-indeterminate="false" aria-label="Select All Rows checkbox" value="">
                                                        </th>
                                                        <th>Mã chi tiết đơn</th>
                                                        <th>Ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Hàng còn</th>
                                                    </tr>
                                                    <?php while ($od = mysqli_fetch_array($data["detail"])) {?>
                                                    <tr class="info-table-item">
                                                        <td>
                                                            <input class="jss7" tabindex="0" type="checkbox" 
                                                            data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                                        </td>
                                                        <td><?php echo $od['id_od'] ?></td>
                                                        <td>
                                                            <div class="img-table-product">
                                                                <img src="./public/images/products/phones/<?php echo $od['img'] ?>" alt="">
                                                            </div>
                                                        </td>
                                                        <td class="name"><?php echo $od['name'] ?></td>
                                                        <td><?php echo $this->formatPrice($od['price']) ?>đ</td>
                                                        <td><?php echo $od['qty']?></td>
                                                        <td><?php echo $this->formatPrice($od['total_o']) ?>đ</td>
                                                        <td style="font-weight: bold;"><?php echo $od['stock'] ?></td>
                                                        <!-- <td><div class="order-info-table-status">Pending</div></td> -->
                                                        <!-- <td class="btn-del"><a href=""><i class="fa-solid fa-trash"></i></a></td> -->
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                <div class="info-table-form">
                                                    <form action="./admin/updateOD/<?php echo $o['id_order'];?>" class="form-info-od" method="post">
                                                        <div class="form-item">
                                                            <label>Ghi chú nhân viên về đơn hàng</label>
                                                            <div>
                                                                <textarea class="ipt ipt-description" name="note_admin" id="note_a" placeholder="Ghi chú của nhân viên về đơn hàng"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-item">
                                                            <label>Trạng thái đơn hàng</label>
                                                            <select class="ipt" name="status">
                                                                <?php
                                                                if ($o['status'] == 1) {?>
                                                                <option value="1">Chờ xác nhận</option>
                                                                <option value="2">Đã xác nhận</option>
                                                                <option value="5">Đã hủy</option>
                                                                <option value="6">Cần xác minh lại</option>
                                                                <?php }
                                                                if ($o['status'] == 2) {?>
                                                                <option value="2">Đã xác nhận</option>
                                                                <option value="3">Vận chuyển</option>
                                                                <!-- <option value="5">Đã hủy</option> -->
                                                                <option value="6">Cần xác minh lại</option>
                                                                <?php }
                                                                 if ($o['status'] == 3) {?>
                                                                <option value="3">Vận chuyển</option>
                                                                <option value="4">Đã giao</option>
                                                                <option value="6">Cần xác minh lại</option>
                                                                <?php }
                                                                 if ($o['status'] == 4) {?>
                                                                <option value="4">Đơn hàng đã hoàn thành!</option>
                                                                <?php }
                                                                 if ($o['status'] == 5) {?>
                                                                <option value="5">Đơn hàng đã hủy</option>
                                                                <!-- <option value="6">Cần xác minh lại</option> -->
                                                                <?php }
                                                                 if ($o['status'] == 6) {?>
                                                                <option value="6">Cần xác minh lại</option>
                                                                <option value="2">Đã xác nhận</option>
                                                                <option value="5">Đã hủy</option>
                                                                <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="save-btn">
                                                            <button class="btn-p btn-save" type="submit" name="submit">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>