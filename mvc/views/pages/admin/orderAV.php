<div class="right-admin order-admin">
                        <div class="right-content order-content">
                            <div class="top-content">
                                <div class="create-new">
                                    <button class="btn-p btn-add-new" type="submit" disabled>Thêm mới</button>
                                </div>
                                <div class="search">
                                    <form action="./search/searchOrderA" class="search-form">
                                        <input type="text" class="ipt input-search" id="skw" placeholder="Tìm kiếm..." name="key" maxlength="100" autocomplete="off">
                                        <button class="btn-search" name="search" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="status">
                                <a href="./admin/showOrder/waiting" class="<?php if (isset($data['status']) && $data['status'] == 'waiting') {echo "active";} else echo "";?>  waiting">Chờ xác nhận </a>
                                <a href="./admin/showOrder/confirmed" class="<?php if (isset($data['status']) && $data['status'] == 'confirmed') {echo "active";} else echo "";?> confirmed">Đã xác nhận </a>
                                <a href="./admin/showOrder/shipping" class="<?php if (isset($data['status']) && $data['status'] == 'shipping') {echo "active";} else echo "";?> shipping">Vận chuyển </a>
                                <a href="./admin/showOrder/delivered" class="<?php if (isset($data['status']) && $data['status'] == 'delivered') {echo "active";} else echo "";?> delivered">Đã giao </a>
                                <a href="./admin/showOrder/cancelled" class="<?php if (isset($data['status']) && $data['status'] == 'cancelled') {echo "active";} else echo "";?> cancelled">Đã hủy </a>
                                <a href="./admin/showOrder/re-verify" class="<?php if (isset($data['status']) && $data['status'] == 're-verify') {echo "active";} else echo "";?> re-verify">Cần xác minh lại</a>
                                <a href="./admin/showOrder/all" class="<?php if (isset($data['status']) && $data['status'] == 'all') {echo "active";} else echo "";?> all">Tất cả</a>
                            </div>

                            <?php
                            if (isset($data["key"])) {?>
                                <div class="search-top clearfix">
                                    <h2>Kết quả tìm kiếm "<?php echo $data['key'];?>"</h2>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="table-content order-list">
                                <table class="table-mng table-order">
                                    <tr class="info-table-title">
                                        <th>
                                            <input class="jss7" tabindex="-1" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select All Rows checkbox" value="">
                                        </th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt</th>
                                        <td>Trạng thái</td>
                                        <th>Chi tiết</th>
                                    </tr>
                                    <?php
                                    if (isset($data['order'])) {
                                        while($o = mysqli_fetch_array($data['order'])) {?>
                                        <tr class="info-table-item">
                                            <td>
                                                <input class="jss7" tabindex="0" type="checkbox" 
                                                data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                            </td>
                                            <td><?php echo $o['id_order']?></td>
                                        <td class="name"><?php echo $o['fname']."-".$o['lname']?></td>
                                        <td><?php echo $o['address']?></td>
                                        <td><?php echo $o['total']?></td>
                                        <td><?php echo $o['create_at']?></td>
                                        <td><div class="order-info-table-status">
                                            <?php
                                            switch ($o['status']) {
                                                case '1':
                                                    ?>
                                                    <div class="info-table-status status waiting" style="background-color: rgb(178, 221, 255);">
                                                        <?php echo "Pending";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                case '2':
                                                    ?>
                                                    <div class="info-table-status status confirmed" style="background-color: rgb(255 165 0);">
                                                        <?php echo "Confirmed";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                case '3':
                                                    ?>
                                                    <div class="info-table-status status shipping" style="background-color: rgb(255 255 107);">
                                                        <?php echo "Shipping";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                case '4':
                                                    ?>
                                                    <div class="info-table-status status delivered" style="background-color: rgb(178 255 207);">
                                                        <?php echo "Delivered";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                case '5':
                                                    ?>
                                                    <div class="info-table-status status cancelled" style="background-color: rgb(255 178 178);">
                                                        <?php echo "Cancelled";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                case '6':
                                                    ?>
                                                    <div class="info-table-status status re-verify" style="background-color: rgb(178, 221, 255);">
                                                        <?php echo "Re-verify";?>
                                                    </div>
                                                    <?php
                                                    break;
                                                default:
                                                    echo "Undefined";
                                                    break;
                                            }
                                            ?>
                                        </div></td>
                                        <td><a href="admin/showUpdateOD/<?php echo $o['id_order']?>"><button class="btn-p btn-detail" type="submit">Chi Tiết</button></a></td>
                                        <!-- <td class="btn-del"><a href=""><i class="fa-solid fa-trash"></i></a></td> -->
                                    </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>