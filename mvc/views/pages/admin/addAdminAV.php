<div class="right-admin add-admin add-user">
                        <div class="right-content add-content">
                            <div class="top-content">
                                <h1>tài khoản mới</h1>
                            </div>
                            <div class="form-content form-add form-add-user">
                                <form action="admin/addAdmin" method="POST" class="form-add-user">
                                    <div class="form-item">
                                        <label>Họ và Tên</label>
                                        <input type="text" name="name" value="" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label class="required">Email</label>
                                        <input type="email" name="email" required placeholder="admin@gmail.com" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label class="required">Mặt khẩu</label>
                                        <input type="password" required name="password" value="" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone" value="" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" value="" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label>Ngày sinh</label>
                                        <input type="date" name="birth" value="" class="ipt">
                                    </div>
                                    <div class="form-item">
                                        <label>Quê quán</label>
                                        <input type="text" name="hometown" value="" class="ipt">
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