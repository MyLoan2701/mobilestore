
<div class="main-home" id="home">
                <div class="banner-home clearfix" id="bannerHome">
                    <div class="banner-slide">
                        <div class="slide-home">
                            <img src="public/images\banner\banner-home\banner-slide1.jpg" alt="banner-slide">
                            <div class="banner-info bs1-left bs1">
                                <p class="info-title bs1-t1" style="margin-block-end: 0;">mua sắm thỏa thích thoải mái lựa chọn</p>
                                <p class="info-p bs1-p">Giá sốc nhất, hàng mới nhất!</p>
                                <button class="btn-p btn-in-img">Mua ngay!</button>
                            </div>
                        </div>
                        <div class="slide-home">
                            <img src="public/images\banner\banner-home\banner-slide2.jpg" alt="banner-slide">
                            <div class="banner-info bs2-right bs2">
                                <p class="info-title bs2-t1">điện thoại - máy tính bảng</p>
                                <p class="info-title bs2-t2">phụ kiện chính hãng</p>
                                <p class="info-title bs2-t3">hỗ trợ trả góp</p>
                            </div>
                        </div>
                        <div class="slide-home">
                            <img src="public/images\banner\banner-home\banner-slide3.jpg" alt="banner-slide">
                            <div class="banner-info bs3-left">
                                <p class="info-title bs3-t1">cuộc sống thông minh tầm nhìn vô hạn</p>
                            </div>
                            <div class="banner-info banner-info-right bs3-right">
                                <p class="info-title bs3-t2">mua sắm online nhận khuyến mãi khủng</p>
                            </div>
                        </div>
                    </div>
                    <div class="banner-small">
                        <div class="smallbanner-item">
                            <img src="public/images/banner/banner-home/banner-small1.jpg" alt="banner-small">
                            <div class="smallbanner-info sb-i1">
                                <p class="sb-info sbi11">black friday</p>
                                <p class="sb-info sbi12">app sale</p>
                                <p class="sb-info sbi13">mã voucher: blackfr</p>
                            </div>
                        </div>
                        <div class="smallbanner-item">
                            <img src="public/images/banner/banner-home/banner-small2.jpg" alt="banner-small">
                            <div class="smallbanner-info sb-i2">
                                <p class="sb-info sbi21">mua sắm online</p>
                                <p class="sb-info sbi22">nhận ngay quà tặng</p>
                                <p class="sb-info sbi23">lễ lớn - sale lớn - ưu đãi lớn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content clearfix" id="homeContent">
                    <div class="home-container clearfix">
                        <div class="home-container-title">
                            <h2>
                                <a href="./phone/show/hot/1" class="link-product-hot">điện thoại nổi bật</a>
                            </h2>
                        </div>
                        <div class="product-container">
                            <?php
                            while ($hot = mysqli_fetch_array($data["hot"])) {?>
                            <div class="product-item">
                                <a href="./productDetail/show/<?php echo $hot['id_product'] ?>" class="link-product">
                                    <div class="item-label">
                                        <span class="lb-hot">hot</span>
                                    </div>
                                    <div class="item-img">
                                        <img src="public/images/products/phones/<?php echo $hot['img'] ?>" alt="<?php echo $hot['name'] ?>" width="207" height="207" class="product-img">
                                    </div>
                                    <h3 class="product-name"><?php echo $hot['name'] ?></h3>
                                    <strong class="price">
                                        <?php echo $this->formatPrice($this->formatSale($hot['price'], $hot['sale'])) ?>
                                        <small class="sale">-<?php echo $hot['sale'] ?>%</small>
                                    </strong>
                                    <?php 
                                    if($hot['sale'] > 0) {?>
                                    <div class="price-old"><?php echo $this->formatPrice($hot['price']) ?></div>
                                        <?php
                                    }
                                    ?>
                                </a>
                            </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="home-preferential clearfix">
                        <div class="preferential-item">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="21 41.657 157.001 114.861" viewBox="21 41.657 157.001 114.861" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-2apvrfvqep6m">
                                <defs>
                                    <style>
                                        #comp-km3aq0p4 svg [data-color="1"] #comp-km3aq0p4 svg [data-color="2"] {
                                            " "
                                        }
                                    </style>
                                </defs>
                                <title id="svgcid-2apvrfvqep6m"></title>
                                <g>
                                    <path d="M175.39 129.667h-5.351c-1.271-12.926-11.875-23.154-24.964-23.831-.036-.126-.071-.252-.127-.374-.641-1.403-15.725-34.436-19.432-41.851-2.948-5.895-5.401-7.887-9.157-7.58a2.608 2.608 0 0 0-1.009-.203H92.228a2.61 2.61 0 1 0 0 5.22h11.656c-1.502 1.22-2.601 2.649-3.253 4.288-1.381 3.47-.265 6.516-.008 7.133l14.542 37.811c.177.46.279.908.303 1.335.123 2.159-.355 3.783-1.46 4.965-2.063 2.206-5.72 2.271-5.744 2.271H83.779a4.11 4.11 0 0 1-3.303-1.648c-8.229-11.151.348-21.995 6.193-27.467a3.838 3.838 0 0 0 .95-4.235 3.85 3.85 0 0 0-3.6-2.45h-35.34a6.834 6.834 0 0 0-4.698 1.872c-3.312 3.113-4.564 6.159-3.722 9.054.791 2.72 3.247 4.442 5.566 5.495-13.32 13.706-15.749 31.661-15.853 32.476a2.608 2.608 0 0 0 2.59 2.94h7.869c-.018.123-.038.245-.038.373 0 11.721 9.536 21.257 21.257 21.257s21.257-9.536 21.257-21.257c0-.128-.02-.25-.038-.373h38.859c-.018.123-.038.245-.038.373 0 11.721 9.536 21.257 21.257 21.257s21.257-9.536 21.257-21.257c0-.128-.02-.25-.038-.373h11.225a2.61 2.61 0 0 0-.001-5.221zm-10.608 0h-42.181c1.292-10.493 10.254-18.646 21.09-18.646s19.799 8.153 21.091 18.646zM52.533 100.323a2.614 2.614 0 0 0-1.206-4.545c-2.215-.431-5.646-1.841-6.057-3.261-.233-.808.621-2.225 2.286-3.79.312-.293.71-.454 1.122-.454H80.76c-2.609 2.807-5.439 6.549-7.2 10.944-2.958 7.382-2.019 14.674 2.714 21.088 1.742 2.36 4.547 3.769 7.504 3.769h24.485c.239 0 5.889-.044 9.52-3.886 2.128-2.253 3.103-5.236 2.897-8.866a9.637 9.637 0 0 0-.643-2.915l-14.559-37.852c-.016-.041-.018-.047-.036-.088-.297-.728-1.473-4.489 4.57-7.007 7.934-3.306 7.936-3.307 10.832 2.487 3.223 6.445 15.613 33.505 18.668 40.186-11.778 1.875-20.991 11.542-22.17 23.534H35.717c1.355-5.957 5.554-19.692 16.816-29.344zm25.151 34.937c0 8.842-7.194 16.036-16.036 16.036s-16.036-7.193-16.036-16.036c0-.128-.02-.25-.038-.373H77.72c-.016.123-.036.246-.036.373zm81.297 0c0 8.842-7.194 16.036-16.036 16.036-8.842 0-16.036-7.193-16.036-16.036 0-.128-.02-.25-.038-.373h32.146c-.016.123-.036.246-.036.373z" fill="#000000" data-color="1"></path>
                                    <path d="M64.587 41.657H28.876c-4.343 0-7.876 3.533-7.876 7.877v21.539c0 4.343 3.533 7.877 7.876 7.877h35.711c4.343 0 7.876-3.533 7.876-7.877V49.534c0-4.344-3.533-7.877-7.876-7.877zm2.655 29.416a2.659 2.659 0 0 1-2.655 2.656H28.876a2.659 2.659 0 0 1-2.655-2.656V49.534a2.659 2.659 0 0 1 2.655-2.656h35.711a2.659 2.659 0 0 1 2.655 2.656v21.539z" fill="#621FCC" data-color="2"></path>
                                </g>
                            </svg>
                            <span>Giao hàng nhanh chóng</span>
                        </div>
                        <div class="preferential-item">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="22 29.01 158 141.964" viewBox="22 29.01 158 141.964" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-xxni1r-jhjavh">
                                <defs>
                                    <style>
                                        #comp-km3c06wy svg [data-color="1"] #comp-km3c06wy svg [data-color="2"] {
                                            " "
                                        }
                                    </style>
                                </defs>
                                <title id="svgcid-xxni1r-jhjavh"></title>
                                <g>
                                    <path d="M180 57.344c0-15.623-12.711-28.334-28.334-28.334-15.583 0-28.265 12.646-28.33 28.214L88.453 42.025a2.773 2.773 0 0 0-2.297.035L58.541 55.089a2.779 2.779 0 0 0-1.113.525L23.594 71.578c-.071.033-.13.08-.197.118-.039.022-.082.033-.12.057-.039.025-.073.055-.111.081a2.79 2.79 0 0 0-.441.386c-.02.022-.036.045-.055.067a2.736 2.736 0 0 0-.241.328c-.019.03-.039.059-.056.089a2.797 2.797 0 0 0-.197.418c-.011.029-.019.059-.029.089a2.816 2.816 0 0 0-.101.397c-.005.029-.013.058-.017.088a3.092 3.092 0 0 0-.029.397v65.903c0 1.088.635 2.076 1.624 2.529l61.681 28.197.015.005a2.692 2.692 0 0 0 .628.192c.161.03.324.051.488.052.008 0 .016.003.023.003.19 0 .378-.026.562-.065l.113-.024c.179-.045.354-.106.521-.186.011-.005.024-.007.035-.013l62.562-30.841a2.78 2.78 0 0 0 1.551-2.494V85.674C167.363 85.599 180 72.921 180 57.344zm-92.612-9.717l36.648 15.968a28.307 28.307 0 0 0 7.311 13.467l-13.602 6.705-52.128-25.868 21.771-10.272zm-.972 51.584L31.381 74.052l27.825-13.128 52.266 25.936-25.056 12.351zm-58.855-20.79l56.12 25.655v59.788l-56.12-25.654V78.421zm61.681 85.3v-59.703l26.088-12.86 2.287 25.914a2.78 2.78 0 1 0 5.538-.489l-2.476-28.062 15.349-7.566a28.177 28.177 0 0 0 10.215 4.196v50.472l-57.001 28.098zm62.424-83.604c-12.557 0-22.773-10.216-22.773-22.773s10.216-22.773 22.773-22.773 22.773 10.216 22.773 22.773c0 12.556-10.216 22.773-22.773 22.773z" fill="#000000" data-color="1"></path>
                                    <path d="M147.434 68.5h-.041a2.778 2.778 0 0 1-1.956-.846l-7.506-7.747a2.781 2.781 0 0 1 3.994-3.87l5.568 5.746 13.928-13.551a2.781 2.781 0 0 1 3.878 3.986l-15.925 15.494a2.781 2.781 0 0 1-1.94.788z" fill="#621FCC" data-color="2"></path>
                                </g>
                            </svg>
                            <span>Miễn phí vận chuyển cho đơn hàng từ 5 triệu trở lên</span>
                        </div>
                        <div class="preferential-item">
                            <svg preserveAspectRatio="xMidYMid meet" data-bbox="18.037 24.249 169.427 148.092" viewBox="18.037 24.249 169.427 148.092" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-x6j97sxrtow0">
                                <defs>
                                    <style>
                                        #comp-km3aq0qx svg [data-color="1"] #comp-km3aq0qx svg [data-color="2"]
                                    </style>
                                </defs>
                                <title id="svgcid-x6j97sxrtow0"></title>
                                <g>
                                    <path d="M169.8 117c-2.1-.7-4.4.4-5.1 2.5-7.8 23-27.6 39.8-51.5 43.8-34 5.7-66.4-15.7-74.9-48.5l6.4 4.5c.9.6 2 .9 3 .7 1-.2 2-.7 2.6-1.6 1.3-1.8.9-4.3-.9-5.6l-14.6-10.4c-1.8-1.3-4.3-.9-5.6.9L18.8 118c-1.3 1.8-.9 4.3.9 5.6 1.8 1.3 4.3.9 5.6-.9l4.9-6.9c9 37.4 45.7 62 84.2 55.5 26.8-4.5 49-23.4 57.8-49.2.8-2.1-.3-4.4-2.4-5.1z" fill="#000000" data-color="1"></path>
                                    <path d="M185.8 77c-1.8-1.3-4.3-.9-5.6.9l-5.2 7.3c-7.1-39.8-45.2-66.7-85.2-59.9-23.8 4-44.2 19.4-54.5 41.2-.9 2-.1 4.4 1.9 5.3 2 .9 4.4.1 5.3-1.9C51.8 50.6 70 36.8 91.2 33.2c35.3-6 68.8 17.4 75.7 52.3l-6.1-4.3c-1.8-1.3-4.3-.9-5.6.9-1.3 1.8-.9 4.3.9 5.6l14.6 10.4c.9.6 2 .9 3 .7 1-.2 2-.7 2.6-1.6l10.4-14.6c1.3-1.8.9-4.3-.9-5.6z" fill="#000000" data-color="1"></path>
                                    <path d="M98 124c-.5 0-1.1-.1-1.6-.3-1.5-.6-2.4-2.1-2.4-3.7V51.9c0-2.2 1.8-4 4-4s4 1.8 4 4v58.8l25.8-24.6c1.6-1.5 4.1-1.5 5.7.1 1.5 1.6 1.5 4.1-.1 5.7l-32.5 31c-.9.8-1.9 1.1-2.9 1.1z" fill="#621fcc" data-color="2"></path>
                                </g>
                            </svg>
                            <span>Phục vụ 24/7</span>
                        </div>
                    </div>

                    <div class="home-container clearfix">
                        <div class="home-container-title">
                            <h2>
                                <a href="./phone/show/sale/1" class="link-product-hot">Điện thoại Sale</a>
                            </h2>
                        </div>
                        <div class="product-container">
                        <?php 
                            while ($sale = mysqli_fetch_arrAY($data['sale'])) {?>
                            <div class="product-item">
                                <a href="./productDetail/show/<?php echo $sale['id_product'] ?>" class="link-product">
                                    <div class="item-label">
                                        <span class="lb-sale">sale</span>
                                    </div>
                                    <div class="item-img">
                                        <img src="public/images/products/phones/<?php echo $sale['img'] ?>" alt="<?php echo $sale['name'] ?>" width="207" height="207" class="product-img">
                                    </div>
                                    <h3 class="product-name"><?php echo $sale['name'] ?></h3>
                                    <strong class="price">
                                        <?php echo $this->formatPrice($this->formatSale($sale['price'], $sale['sale'])); ?>
                                        <small class="sale">-<?php echo $sale['sale'] ?>%</small>
                                    </strong>
                                    <?php 
                                    if($sale['sale'] > 0) {?>
                                    <div class="price-old"><?php echo $this->formatPrice($sale['price']) ?></div>
                                        <?php
                                    }
                                    ?>
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="home-accessory clearfix">
                        <div class="home-accessory-left">
                            <div class="home-accessory-clip-path"></div>
                            <div class="home-accessory-info abs-center">
                                <p class="title-info t-upper">mang âm thanh đến với bạn</p>
                                <p class="title-info t-upper">lắng nghe sự khác biệt</p>
                                <p class="info-p">Mua phụ kiện máy tính và điện thoại di động trực tuyến tại UEDIT. Tìm loa Bluetooth, webcam và hơn thế nữa.</p>
                                <button class="btn-p btn-acc">Đến ngay</button>
                            </div>
                        </div>
                        <div class="home-accessory-right">
                            <img src="public/images/banner/banner-home/banner-small4.jpg" alt="accessory">
                        </div>
                    </div>

                    <div class="home-container clearfix">
                        <div class="home-container-title">
                            <h2>
                                <a href="./phone" class="link-product-hot">Hãng sản xuất</a>
                            </h2>
                        </div>
                        <div class="product-category">
                            <?php 
                            while ($category = mysqli_fetch_arrAY($data['lcategory'])) {?>
                            <div class="category-item">
                                <a href="./phone/showProductByCategory/<?php echo $category['id_category'] ?>" class="link-category">
                                    <div class="item-category-img">
                                        <img src="public/images/category/<?php echo $category['image']?>" alt="<?php echo $category['category_name']?>" class="category-img">
                                    </div>
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>

