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
                                    while ($admin = mysqli_fetch_array($data["edit"])) {
                                    ?>
                                    <div class="update detail">
                                        <div class="show-top">
                                            <?php
                                            if(isset($admin['img']) && $admin['img'] != null) {?>
                                            <img src="public/images/admin/<?php echo $admin['img']?>" alt="avatar" class="show-avatar">
                                            <?php
                                            }
                                            else {?>
                                            <img src="public/images/admin/avatar.jpg" alt="avatar" class="show-avatar">
                                            <?php
                                            }
                                            ?>
                                            <div class="show-top-title">
                                                <span>Quản trị viên</span>
                                            </div>
                                        </div>
                                        <div class="show-bottom">
                                            <div class="detail-title">Chi tiết tài khoản</div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-user"></i>
                                                <span>Tên: <?php echo $admin['name']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-circle-user"></i>
                                                <span>Quyền: <?php echo $admin['level']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-calendar"></i>
                                                <span>Ngày sinh: <?php echo $admin['birth']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-calendar"></i>
                                                <span>Ngày tạo: <?php echo $admin['create_at']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-genderless"></i>
                                                <span>Giới tính: <?php echo $admin['sex']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-house"></i>
                                                <span>Quê quán: <?php echo $admin['hometown']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-circle-check"></i>
                                                <span>Trạng thái: 
                                                <?php
                                                if ($admin['status'] == 0) {
                                                    echo "Hoạt động";
                                                }
                                                else  echo "Dừng hoạt động";
                                                ?>
                                                </span>
                                            </div>
                                            <div  class="detail-title">Thông tin liên lạc</div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-mobile-screen"></i>
                                                <span>SĐT: <?php echo $admin['phone']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-regular fa-envelope"></i>
                                                <span>Email: <?php echo $admin['email']?></span>
                                            </div>
                                            <div class="detail-info">
                                                <i class="fa-solid fa-location-dot"></i>
                                                <span>Địa chỉ: <?php echo $admin['address']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update edit">
                                        <div class="edit-title">Cập nhật</div>
                                        <div class="form-content form-update form-update-user">
                                            <form action="admin/updateAdmin/<?php echo $admin['id_admin'] ?>" method="POST" class="form-update-user">
                                                <div class="form-item">
                                                    <label>Họ và Tên</label>
                                                    <input type="text" name="name" value="<?php echo $admin['name']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Email</label>
                                                    <input type="email" name="email" readonly value="<?php echo $admin['email']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Mặt khẩu</label>
                                                    <input type="password" name="password" value="<?php echo $admin['password']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Số điện thoại</label>
                                                    <input type="tel" name="phone" value="<?php echo $admin['phone']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" name="address" value="<?php echo $admin['address']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Ngày sinh</label>
                                                    <input type="date" name="birth" value="<?php echo $admin['birth']?>" class="ipt">
                                                </div>
                                                <div class="form-item">
                                                    <label>Quê quán</label>
                                                    <input type="text" name="hometown" value="<?php echo $admin['hometown']?>" class="ipt">
                                                </div>
                                                <div class="form-item form-general">
                                                    <div class="form-left">
                                                        <label>Giới tính</label>
                                                        <div>
                                                            <input type="radio" id="female" name="sex" value="Nữ" required>
                                                            <label for="female">Nữ</label><br>
                                                            <input type="radio" id="male" name="sex" value="Nam" required>
                                                            <label for="male">Nam</label><br>
                                                        </div>
                                                        <br>
                                                        <label class="required">Cấp quyền</label>
                                                        <div>
                                                            <input type="radio" id="master" name="level" value="Master" required>
                                                            <label for="master">Master</label><br>
                                                            <input type="radio" id="admin" name="level" value="Admin" required>
                                                            <label for="admin">Admin</label><br>
                                                            <input type="radio" id="employee" name="level" value="Employee" required>
                                                            <label for="employee">Employee</label><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-right">
                                                        <label for="avatar"><i class="fa-solid fa-upload"></i></label><br>
                                                        <input type="file" id="avatar" name="img">
                                                    </div>
                                                </div>
                                                <div class="form-item">
                                                    <label>Trạng thái</label>
                                                    <select class="ipt" name="status">
                                                        <option value="0" <?php if (isset($admin['status']) && $admin['status'] == 0) echo "selected=\"selected\"";  ?>>Hoạt động</option>
                                                        <option value="1" <?php if (isset($admin['status']) && $admin['status'] == 1) echo "selected=\"selected\"";  ?>>Dừng hoạt động</option>
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