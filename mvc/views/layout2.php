
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/fontawesome-free-6.2.0-web/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/styleAdmin.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

        <base href="http://localhost:8080/mobilestore/admin">
        <title>Admin App</title>

        
    </head>

    <body>
        <div class="wrapper">
            <div class="header-admin clearfix">
                <div class="header-content">
                    <div class="header-left">
                        <div class="header-logo">
                            <p class="logo-store t-upper">
                                <a href="./admin" class="home-store">
                                    UED<span style="color: #00e3ff; font-size:45px;">IT</span>
                                </a>
                            </p>
                        </div>
                        <div class="header-search">
                            <form action="" class="search-form">
                                <input type="text" class="ipt input-search" id="skw" placeholder="Bạn tìm gì..." name="key" maxlength="100" autocomplete="off">
                                <button class="btn-search" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-notify">
                            <a href="">
                                <i class="fa-solid fa-bell"></i>
                            </a>
                        </div>
                        <div class="header-account">
                            <a href="./admin/showMgAccount/<?php echo $_SESSION['loginAdmin']['id_admin'] ?>" class="account-admin">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </div>
                        <div class="header-logout">
                            <a onclick="document.getElementById('logoutModal3').style.display='block'">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <div class="logout-admin">
                                    Đăng xuất
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đăng xuất -->
    <div id="logoutModal3">
        <div class="modal-content animationtop">
            <div class="modal-cancel">
                <span onclick="document.getElementById('logoutModal3').style.display='none'">X</span>
            </div>
            <div class="modal-title">
                Xác nhận bạn muốn đăng xuất?
            </div>
            <div class="modal-container clearfix">
                <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="./logout/show2">Đăng xuất</a>
            </div>
        </div>
    </div>
    <!--  -->

            <div class="main-admin clearfix">
                <div class="main-content">
                    <div class="sidebar clearfix">
                        <div class="sidebar-wrapper">
                            <ul class="sidebar-list">
                                <li>
                                    <a href="admin" class="active">
                                        <i class="fa-solid fa-house"></i>
                                        Trang chủ
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/showMgCategory">
                                        <i class="fa-solid fa-folder"></i>
                                        Quản lý danh mục
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/showMgProduct">
                                        <i class="fa-solid fa-mobile"></i>
                                        Quản lý sản phẩm
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/showMgOrder/waiting">
                                        <i class="fa-solid fa-file-lines"></i>
                                        Quản lý đơn hàng
                                    </a>
                                </li>
                                <li id="mg-user">
                                    <a onclick="userItem()">
                                        <i class="fa-solid fa-user"></i>
                                        Quản lý tài khoản
                                    </a>
                                    <div id="user-item">
                                        <a href="admin/showMgClient">Khách hàng</a>
                                        <a href="admin/showMgAdmin">Admin</a>
                                    </div>
                                </li>
                                <li>
                                    <a href="admin/showMgStatistical"><i class="fa-solid fa-chart-pie"></i>
                                        Thống kê
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-right">
                        <?php require_once "./mvc/views/pages/admin/".$data["page"].".php"; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="footer-admin clearfix">
                <div class="footer-copyright">© 2022 by My Loan</div>
            </div> -->
        </div>
        <script src="<?php echo "http://localhost:8080/mobilestore"?>/public/js/MyScriptAdmin.js"></script>
    </body>
</html>