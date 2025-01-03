<?php
/* Smarty version 5.4.1, created on 2024-12-19 15:17:25
  from 'file:dasboard.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67642af5481096_23795132',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efb0930f509957434c67473e68b26c6e20fea888' => 
    array (
      0 => 'dasboard.tpl.html',
      1 => 1734617843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67642af5481096_23795132 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển Quản Trị</title>
    <link rel="icon" href="shoe-icon.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar-header h2 {
            margin: 0;
            font-size: 24px;
            padding: 10px;
        }

        .sidebar-menu {
            list-style-type: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin: 20px 0;
            text-align: center;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar-menu li a:hover {
            background-color: #444;
        }

        /* Dropdown Menu */
        .dropdown {
            display: none;
            list-style-type: none;
            padding-left: 20px;
        }

        .dropdown li {
            margin: 10px 0;
        }

        .dropdown li a {
            padding-left: 30px;
        }

        .sidebar-menu li.active .dropdown {
            display: block;
        }

        /* .sidebar-menu li a::after {
            content: ' ▼';
            font-size: 12px;
            margin-left: 5px;
        } */

        /* .sidebar-menu li.active a::after {
            content: ' ▲';
        } */

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-profile span {
            font-size: 18px;
        }

        /* Stats Section */
        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .stat-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 22%;
            text-align: center;
        }

        .stat-card h3 {
            margin: 0;
            font-size: 20px;
            color: #007BFF;
        }

        .stat-card p {
            margin-top: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Recent Activity */
        .recent-activity {
            margin-bottom: 40px;
        }

        .recent-activity h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .recent-activity ul {
            list-style-type: none;
            padding: 0;
        }

        .recent-activity li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .recent-activity li span {
            font-weight: bold;
            color: #007BFF;
        }

        /* Charts Section */
        .charts {
            display: flex;
            justify-content: space-between;
        }

        .chart-card {
            width: 48%;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chart-card h3 {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .chart-placeholder {
            background-color: #f1f1f1;
            height: 200px;
            text-align: center;
            line-height: 200px;
            font-size: 18px;
            color: #ccc;
        }
    </style>
</head>
<body>
        

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
                <!-- Hiển thị icon và tên người dùng -->
                
                    <a href="#" style="display: inline-flex; align-items: center; text-decoration: none;">
                        <i class='far fa-user-circle' style='font-size:36px; margin-right: 5px;'></i>
                        <span style="font-size: 20px; color: white;"><?php echo $_smarty_tpl->getValue('user_name');?>
</span>
                    </a>
               
                <?php }?></h2>
        </div>
        <ul class="sidebar-menu">
            <!-- <li><a href="#">Trang Chủ</a></li> -->
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Sản Phẩm</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=listproduct">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Danh Mục</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=listcategory">Danh sách danh mục</a></li>
                </ul>
            </li>

            <!-- màu sắc -->
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Màu Sắc</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=showcolor">Danh sách màu sắc</a></li>
                </ul>
            </li>

            <!-- size -->
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Size</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=showsize">Danh sách size</a></li>
                </ul>
            </li>

            <!-- khách hàng -->
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Khách Hàng</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=showuser">Xem Danh sách khách hàng</a></li>
                </ul>
            </li>

            <!-- duyệt đơn -->
            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Quản Lý Duyệt Đơn Hàng</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=listdonhang">Danh sách đơn hàng</a></li>
                    <!-- <li><a href="#">Tạo Mã Giảm Giá</a></li> -->
                </ul>
            </li>

            <li class="menu-item">
                <a href="#" class="dropdown-toggle">Thống kê</a>
                <ul class="dropdown">
                    <li><a href="index.php?action=doanhthu">Xem doanh thu</a></li>
                    <!-- <li><a href="#">Tạo Mã Giảm Giá</a></li> -->
                </ul>
            </li>

    
            <li><a href="index.php?action=logout">Đăng xuất</a></li>
           
            
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Chào mừng trở lại, Quản trị viên!</h1>
            <div class="user-profile">
                <img src="https://via.placeholder.com/50" alt="Admin Avatar" class="avatar">
                <span>Quản trị viên</span>
            </div>
        </div>

        <!-- Dashboard Stats -->
        <div class="stats">
            <div class="stat-card">
                <h3>Tổng Doanh Thu</h3>
                <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('totalMoney'),0,',','.');?>
 VND
                </p>
            </div>
            <div class="stat-card">
                <h3>Tổng Đơn Hàng</h3>
                <p><?php echo $_smarty_tpl->getValue('totalOrder');?>
</p>
            </div>
            <div class="stat-card">
                <h3>Người Dùng</h3>
                <p><?php echo $_smarty_tpl->getValue('totalUser');?>
</p>
            </div>
            <div class="stat-card">
                <h3>Sản Phẩm</h3>
                <p><?php echo $_smarty_tpl->getValue('totalProduct');?>
</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h2>Hoạt Động Gần Đây</h2>
            <ul>
                <li>Đơn hàng mới - <span>John Doe</span></li>
                <li>Sản phẩm thêm mới - <span>Áo Khoác Da</span></li>
                <li>Người dùng mới đăng ký - <span>Jane Smith</span></li>
                <li>Đơn hàng đã được vận chuyển - <span>Đơn hàng #1234</span></li>
            </ul>
        </div>

        <!-- Chart Section -->
        <div class="charts">
            <div class="chart-card">
                <h3>Hiệu Suất Doanh Thu</h3>
                <div class="chart-placeholder">[Biểu đồ tại đây]</div>
            </div>
            <div class="chart-card">
                <h3>Đơn Hàng Theo Danh Mục</h3>
                <div class="chart-placeholder">[Biểu đồ tại đây]</div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.querySelector('.dropdown-toggle').addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
