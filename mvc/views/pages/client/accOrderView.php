<div class="account-right-order" >
        <h1>Quản lý đơn hàng</h1>
        <table class="table-mng-order">
            <tr class="order-info-table-title">
                <th>Mã đơn hàng</th>
                <th>Trạng thái</th>
                <th>Người nhận</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt đơn</th>
                <th>Xem chi tiết</th>
                <!-- <th>Xóa</th> -->
            </tr>
            <?php while ($o = mysqli_fetch_array($data["order"])) {?>
            <tr class="order-info-table-item">
                <td><?php echo $o['id_order'] ?></td>
                <td>
                    <?php
                    switch ($o['status']) {
                        case '1':
                            ?>
                            <div class="order-info-table-status status waiting" style="background-color: rgb(178, 221, 255);">
                            <?php echo "Pending";?>
                        </div>
                        <?php
                        break;
                        case '2':
                            ?>
                            <div class="order-info-table-status status confirmed" style="background-color: rgb(255 165 0);">
                            <?php echo "Confirmed";?>
                        </div>
                        <?php
                        break;
                        case '3':
                            ?>
                            <div class="order-info-table-status status shipping" style="background-color: rgb(255 255 107);">
                            <?php echo "Shipping";?>
                        </div>
                        <?php
                        break;
                        case '4':
                            ?>
                            <div class="order-info-table-status status delivered" style="background-color: rgb(178 255 207);">
                            <?php echo "Delivered";?>
                        </div>
                        <?php
                        break;
                        case '5':
                            ?>
                            <div class="order-info-table-status status cancelled" style="background-color: rgb(255 178 178);">
                            <?php echo "Cancelled";?>
                        </div>
                        <?php
                        break;
                        case '6':
                            ?>
                            <div class="order-info-table-status status re-verify" style="background-color: #ced4da;">
                            <?php echo "Re-verify";?>
                        </div>
                        <?php
                        break;
                        default:
                        echo "Undefined";
                        break;
                    }
                    ?>
                </td>
                <td><?php echo $o['rname']?></td>
                <td class="order-info-table-total"><?php echo $this->formatPrice($o['total']) ?>đ</td>
                <td><?php echo $o['create_at']?></td>
                <td><a href="./account/orderDetail/<?php echo $o['id_order'];?>"><button class="btn-p btn-order-detail" type="submit">Chi Tiết</button></a></td>
                <!-- <td class="order-info-table-del"><a href=""><i class="fa-solid fa-trash"></i></a></td> -->
            </tr>
            <?php }?>
        </table>
    </div>