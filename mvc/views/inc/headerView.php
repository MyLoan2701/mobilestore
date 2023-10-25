<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:8080/mobilestore/public/css/fontawesome-free-6.2.0-web/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/banner.css">

    <base href="http://localhost:8080/mobilestore/">
    <title>Mobile Store</title>
</head>

<body>
    <div class="wrapper">
        <div class="header clearfix">
            <div class="header-top">
                <div class="info">
                    <ul>
                        <li>
                            <i class="fas fa-phone-volume"></i>
                            Hỗ trợ mua hàng: 1800.2701
                        </li>
                        <li>
                            <i class="fas fa-headphones"></i>
                            CSKH: 1800.2202
                        </li>
                    </ul>
                </div>
                <div class="welcome">
                    Thỏa thích mua sắm, hàng về liền tay!
                    <i class="fas fa-laugh-wink"></i>
                </div>

            </div>
            <div class="header-content">
                <div class="header-left" style="width: 55%;">
                    <div class="header-logo">
                        <p class="logo-store t-upper">
                            <a href="./home" class="home-store">
                                UED<span style="color: #00e3ff; font-size:45px;">IT</span>
                            </a>
                        </p>
                    </div>
                    <div class="header-search">
                        <form action="./search" class="search-form">
                            <input type="text" class="ipt input-search" id="skw" placeholder="Bạn tìm gì..." 
                            name="name" maxlength="100" autocomplete="off" required>
                            <button class="btn-search" type="submit" name="search">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-login">
                        <!-- <a onclick="document.getElementById('loginModal').style.display='block'"> -->
                        <?php
                        if (!isset($_SESSION['login'])) {?>
                        <a href="./login">
                            <i class="fa-solid fa-user"></i>
                            <div>
                                <div>Đăng nhập</div>
                                <div>Đăng ký</div>
                            </div>
                        </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <div class="list-login">
                            <i class="fa-solid fa-user"></i>
                            <div>
                                <div>Xin chào</div>
                                <div><?php echo $_SESSION['login']['lname'] ?></div>
                            </div>
                            <div class="login-dropdown">
                                <div class="login-dropdown-content">
                                    <div class="login-dropdown-item">
                                        <a href="./account">
                                            <h3>Quản lý tài khoản</h3>
                                        </a>
                                    </div>
                                    <div class="login-dropdown-item">
                                        <a onclick="document.getElementById('logoutModal2').style.display='block'">
                                            <h3>Đăng xuất</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <!-- Đăng xuất -->
                        <div id="logoutModal2">
                            <div class="modal-content animationtop">
                                <div class="modal-cancel">
                                    <span onclick="document.getElementById('logoutModal2').style.display='none'">X</span>
                                </div>
                                <div class="modal-title">
                                    Xác nhận bạn muốn đăng xuất?
                                </div>
                                <div class="modal-container clearfix">
                                    <a class="ipt text-submit" style="display: block; text-align: center; margin: 10px 0 0;" href="./logout">Đăng xuất</a>
                                </div>
                            </div>
                            <!--  -->
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="header-notify">
                        <a href="">
                            <i class="fa-solid fa-bell"></i>
                        </a>
                    </div>
                    <div class="header-cart">
                        <a href="./cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div>
                                <div>Giỏ hàng</div>
                                <div>(<?php 
                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    echo count($_SESSION['cart']);
                                } else echo 0;?>) sản phẩm</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <ul class="header-main-menu">
                    <li>
                        <a href="./home" class="btn-nav nav-home-all">
                            <i class="fa-solid fa-house"></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="./phone/show/all/1" class="btn-nav nav-phones">
                            <i class="fa-solid fa-mobile"></i>Điện thoại</a>
                    </li>
                    <li>
                        <a href="./tablet" class="btn-nav nav-tablets">
                            <i class="fa-solid fa-tablet"></i>Tablet</a>
                    </li>
                    <li>
                        <a href="./laptop" class="btn-nav nav-laptops">
                            <i class="fa-solid fa-laptop"></i>Laptop</a>
                    </li>
                    <li class="list-acc">
                        <a href="" class="btn-nav nav-accessories">
                            <i class="fa-solid fa-headphones"></i>Phụ kiện <i class="fa-solid fa-caret-down"></i></a>
                        <div class="header-dropdown-acc">
                            <div class="header-dropdown-content">
                                <div class="item-child">
                                    <strong>Phụ kiện di động</strong>
                                    <a href="">
                                        <h3>Sạc dự phòng</h3>
                                    </a>
                                    <a href="">
                                        <h3>Củ sạc, dây cáp</h3>
                                    </a>
                                    <a href="">
                                        <h3>Phụ kiện tablet</h3>
                                    </a>
                                </div>
                                <div class="item-child">
                                    <strong>Phụ kiện Laptop</strong>
                                    <a href="">
                                        <h3>Chuột, bàn phím</h3>
                                    </a>
                                    <a href="">
                                        <h3>Túi chống sốc</h3>
                                    </a>
                                    <a href="">
                                        <h3>Giá đỡ Laptop</h3>
                                    </a>
                                </div>
                                <div class="item-child">
                                    <strong>Thiết bị âm thanh</strong>
                                    <a href="">
                                        <h3>Tai nghe</h3>
                                    </a>
                                    <a href="">
                                        <h3>Loa</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>        

        <!-- <?php
        // include './mvc/views/pages/client/login-signupView.php';
        ?> -->

        <div class="main clearfix">