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
                                    <h1>Chi tiết Tài khoản</h1>
                                </div>
                                <div class="update-container">
                                    <?php
                                    while ($client = mysqli_fetch_array($data["edit"])) {
                                    ?>
                                    <div class="update detail">
                                        <div class="show-top">
                                        <?php
                                            if(isset($client['img']) && $client['img'] != null) {?>
                                            <img src="public/images/admin/<?php echo $client['img']?>" alt="avatar" class="show-avatar">
                                            <?php
                                            }
                                            else {?>
                                            <img src="public/images/admin/avatar.jpg" alt="avatar" class="show-avatar">
                                            <?php
                                            }
                                            ?>
                                            <div class="show-top-title">
                                                <span>Khách hàng</span>
                                            </div>
                                        </div>
                                        <div class="show-bottom">
                                            <div class="detail-title">Chi tiết tài khoản</div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-user"></i>
                                                <span>Họ Tên: <?php echo $client['fname']." ".$client['lname']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-calendar"></i>
                                                <span>Ngày tạo: <?php echo $client['create_at']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-calendar"></i>
                                                <span>Lần cập nhật cuối: <?php echo $client['update_at']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-genderless"></i>
                                                <span>Giới tính: <?php echo $client['sex']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-circle-check"></i>
                                                <span>Trạng thái: 
                                                <?php
                                                if ($client['status'] == 0) {
                                                    echo "Hoạt động";
                                                }
                                                else  echo "Dừng hoạt động";
                                                ?>
                                                </span>
                                            </div>
                                            <div  class="detail-title">Thông tin liên lạc</div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-mobile-screen"></i>
                                                <span>SĐT: <?php echo $client['phone']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-envelope"></i>
                                                <span>Email: <?php echo $client['email']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span>Địa chỉ: <?php echo $client['address']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update edit">
                                        <div class="edit-title">Cập nhật</div>
                                        <div class="form-content form-update form-update-user">
                                            <form action="admin/updateClient/<?php echo $client['id_client'] ?>" method="POST" class="form-update-user">
                                                <div class="form-item">
                                                    <label>Trạng thái</label>
                                                    <select class="ipt" name="status">
                                                        <option value="0" <?php if (isset($client['status']) && $client['status'] == 0) echo "selected=\"selected\"";  ?>>Hoạt động</option>
                                                        <option value="1" <?php if (isset($client['status']) && $client['status'] == 1) echo "selected=\"selected\"";  ?>>Dừng hoạt động</option>
                                                    </select>
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