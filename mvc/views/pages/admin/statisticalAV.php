<?php
require './public/carbon/autoload.php';
use Carbon\Carbon;
use Carbon\CarbonInterval;
?>

<div class="right-admin statistical-admin">
    <div class="right-content statistical-content">
        <div class="top-content">
            <div class="title-statis">
                Thống kê cửa hàng
            </div>
            <div class="search">
                <form action="./search/searchStatisticalA" class="search-form">
                    <input type="text" class="ipt input-search" placeholder="Tìm kiếm..."
                    name="key" maxlength="100" autocomplete="of" required>
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
        <script src="public/js/ScriptDate.js"></script>
        <div class="filter-time">
            <div class="filter-item">
                <label>Từ ngày:</label>
                <input type="date" class="ipt ipt-time from-date" id="filter-from-date">
            </div>
            <div class="filter-item">
                <label>Đến ngày:</label>
                <input type="date" class="ipt ipt-time to-date" id="filter-to-date">
            </div>
            <div class="filter-item">
                <label>Lọc theo: <span id="text-date"></span></label>
                <select class="ipt ipt-time" id="select-statis">
                    <option>---Lọc theo---</option>
                    <option value="7days">Lọc theo 7 ngày (1 tuần)</option>
                    <option value="30days">Lọc theo 30 ngày (1 tháng)</option>
                    <option value="90days">Lọc theo 90 ngày (1 quý)</option>
                    <option value="365days">Lọc theo 365 ngày (1 năm)</option>
                </select>
            </div>
            <div class="filter-item">
                <input type="submit" class="btn-p btn-filter" id="btn-filterDay" value="Lọc theo ngày">
            </div>
        </div>
        <div class="chart-statis">
            <div id="chart" style="height: 250px;"></div>
            <script src="public/js/chartMorrisLine.js"></script>
        </div>
        
        <div class="table-content statis-list">
            <table class="table-mng table-statis">
                <tr class="info-table-title">
                    <th>STT</th>
                    <th>Mục thống kê</th>
                    <th>Chi tiết</th>
                </tr>
                <tr class="info-table-item">
                    <td>1</td>
                    <td>Danh mục</td>
                    <td>
                        <span>Tổng: 15</span><br>
                        <span>Hoạt động: 14</span><br>
                        <span>Dừng hoạt động: 1</span><br>
                        <span><a href="./admin/showMgCategoty">Xem tất cả danh mục</a></span>
                    </td>
                </tr>
                <tr class="info-table-item">
                    <td>2</td>
                    <td>Sản phẩm</td>
                    <td>
                        <span>Tổng: 15</span><br>
                        <span>Hoạt động: 14</span><br>
                        <span>Dừng hoạt động: <?php echo Carbon::now() ?></span><br>
                        <span>Tổng đã bán: 100</span>
                        <span><a href="./admin/showMgProduct">Xem tất cả danh mục</a></span>
                    </td>
                </tr>
            </table>
        </div>
        
    </div>
</div>