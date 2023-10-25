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
                                    <button class="btn-p btn-add-new" type="submit" onclick="add_admin()">Thêm mới</button>
                                </div>
                                <div class="search">
                                    <form action="./search/searchAdminA" class="search-form">
                                        <input type="text" class="ipt input-search" id="skw" placeholder="Tìm kiếm..." name="key" maxlength="100" autocomplete="off">
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
                            <div class="table-content user-list">
                                <table class="table-mng table-user">
                                    <tr class="info-table-title">
                                        <th>
                                            <input class="jss7" tabindex="-1" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select All Rows checkbox" value="">
                                        </th>
                                        <th>Mã tài khoản</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Cấp độ</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>

                                    <?php while($admin = mysqli_fetch_array($data['list'])) {?>
                                        <tr class="info-table-item">
                                        <td>
                                            <input class="jss7" tabindex="0" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                        </td>
                                        <td><?php echo $admin['id_admin']?></td>
                                        <td class="name"><?php echo $admin['name']?></td>
                                        <td><?php echo $admin['email']?></td>
                                        <td>
                                        <?php
                                            if ($admin['status'] == 0) {
                                                echo "Hoat động";
                                            }
                                            else  echo "Dừng hoạt động";
                                            ?>
                                        </td>
                                        <td class="level">
                                        <?php
                                            echo $admin['level'];
                                            ?>
                                        </td>
                                        <td><a href="admin/showUpdateAdmin/<?php echo $admin['id_admin']; ?>"><button class="btn-p btn-detail" type="submit">Chi Tiết</button></a></td>
                                        <td class="btn-del"><a onclick="document.getElementById('delModal4').style.display='block'"><i class="fa-solid fa-trash"></i></a></td>
                                        <!-- Xóa admin -->
                                    <div id="delModal4">
                                        <div class="modal-content animationtop">
                                            <div class="modal-cancel">
                                                <span onclick="document.getElementById('delModal4').style.display='none'">X</span>
                                            </div>
                                            <div class="modal-title">
                                                Xác nhận bạn muốn xóa tài khoản đã chọn?
                                            </div>
                                            <div class="modal-container clearfix">
                                                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="admin/deleteAdmin/<?php echo $admin['id_admin']; ?>">Xóa tài khoản</a>
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