<div class="right-client user-client">
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
                                    <button class="btn-p btn-add-new" type="submit" disabled>Thêm mới</button>
                                </div>
                                <div class="search">
                                    <form action="./search/searchClientA" class="search-form">
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
                                        <th>Họ</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                        <th>Xóa</th>
                                    </tr>

                                    <?php while($client = mysqli_fetch_array($data['list'])) {?>
                                        <tr class="info-table-item">
                                        <td>
                                            <input class="jss7" tabindex="0" type="checkbox" 
                                            data-indeterminate="false" aria-label="Select Row checkbox" value="">
                                        </td>
                                        <td><?php echo $client['id_client']?></td>
                                        <td><?php echo $client['fname']?></td>
                                        <td><?php echo $client['lname']?></td>
                                        <td><?php echo $client['email']?></td>
                                        <td>
                                        <?php
                                            if ($client['status'] == 0) {
                                                echo "Hoat động";
                                            }
                                            else  echo "Dừng hoạt động";
                                            ?>
                                        </td>
                                        <td><a href="admin/showUpdateClient/<?php echo $client['id_client']; ?>"><button class="btn-p btn-detail" type="submit">Chi Tiết</button></a></td>
                                        <td class="btn-del"><a onclick="document.getElementById('delModal3').style.display='block'"><i class="fa-solid fa-trash"></i></a></td>
                                        <!-- Xóa khách hàng -->
                                    <div id="delModal3">
                                        <div class="modal-content animationtop">
                                            <div class="modal-cancel">
                                                <span onclick="document.getElementById('delModal3').style.display='none'">X</span>
                                            </div>
                                            <div class="modal-title">
                                                Xác nhận bạn muốn xóa tài khoản đã chọn?
                                            </div>
                                            <div class="modal-container clearfix">
                                                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="admin/deleteClient/<?php echo $client['id_client']; ?>">Xóa tài khoản</a>
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