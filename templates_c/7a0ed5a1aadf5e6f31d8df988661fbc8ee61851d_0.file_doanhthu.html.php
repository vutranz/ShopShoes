<?php
/* Smarty version 5.4.1, created on 2024-12-19 15:02:27
  from 'file:templates/admin/quanlydoanhthu/doanhthu.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67642773f036c4_81878919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a0ed5a1aadf5e6f31d8df988661fbc8ee61851d' => 
    array (
      0 => 'templates/admin/quanlydoanhthu/doanhthu.html',
      1 => 1734616936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67642773f036c4_81878919 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\quanlydoanhthu';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/admin/quanlydoanhthu/doanhthu.css">
    <style>
      #order-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Khoảng cách giữa các đơn hàng */
}

.order-item {
    flex: 1 1 30%; /* Mỗi đơn hàng chiếm 30% chiều rộng */
    box-sizing: border-box;
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #f9f9f9;
}

.order-item.approved {
    border: 2px solid green; /* Đổi màu khung thành màu xanh lá */
    background-color: #e8f5e9; /* Màu nền nhẹ cho đơn hàng đã duyệt */
}

    /* Căn giữa và tạo kiểu cho nút */
    .center-link {
    text-align: center; /* Căn giữa thẻ a */
    margin-top: 20px;   /* Khoảng cách từ trên xuống */
}

.back-button {
    color: red; /* Màu chữ đỏ */
    text-decoration: none; /* Bỏ gạch chân */
    border: 2px solid red; /* Khung viền màu đỏ */
    padding: 10px 20px; /* Kích thước bên trong khung */
    font-size: 18px; /* Kích thước chữ */
    font-weight: bold; /* Chữ đậm */
    display: inline-block; /* Hiển thị dạng block để áp dụng padding */
    text-transform: uppercase; /* Chữ in hoa */
    transition: all 0.3s ease; /* Hiệu ứng mượt mà */
}

.back-button:hover {
    background-color: red; /* Màu nền khi hover */
    color: white; /* Màu chữ khi hover */
}
    </style>
</head>

<body>
   
    <div class="container">
        <a href="index.php?action=dashboard" class="back-button">Quay lại</a>
        <!-- Header Section -->
        <header class="header">
            <h1>Quản Lý Doanh Thu</h1>
        </header>

        <!-- Bộ Lọc Đơn Hàng -->
        <section class="order-filter">
            <h2>Lọc Đơn Hàng</h2>
            <form method="post" action="index.php?action=searchdanhthu">
                <label for="filter-status">Trạng Thái:</label>
                <select id="filter-status" name="status">
                    <option value="all" <?php if ($_smarty_tpl->getValue('status') == 'all') {?>selected<?php }?>>Tất Cả</option>
                    <option value="Đã duyệt" <?php if ($_smarty_tpl->getValue('status') == 'Đã duyệt') {?>selected<?php }?>>Đã Duyệt</option>
                    <option value="đang đợi duyệt" <?php if ($_smarty_tpl->getValue('status') == 'đang đợi duyệt') {?>selected<?php }?>>Chưa Duyệt</option>
                </select>

                <label for="filter-start-date">Từ Ngày:</label>
                <input type="date" id="filter-start-date" name="start_date" value="<?php echo (($tmp = $_smarty_tpl->getValue('start_date') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

                <label for="filter-end-date">Đến Ngày:</label>
                <input type="date" id="filter-end-date" name="end_date" value="<?php echo (($tmp = $_smarty_tpl->getValue('end_date') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

                <button type="submit">Lọc Đơn Hàng</button>
            </form>
        </section>

        <!-- Danh Sách Đơn Hàng -->
        <section class="order-list">
            <h2>Danh Sách Đơn Hàng</h2>
        
            <div id="order-container">
                <!-- Lặp qua danh sách các đơn hàng -->
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'order');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach0DoElse = false;
?>
                <div class="order-item <?php if ($_smarty_tpl->getValue('order')['status'] == 'Đã duyệt') {?>approved<?php }?>" >
                    <h3>Đơn Hàng #<?php echo $_smarty_tpl->getValue('order')['order_id'];?>
</h3> 
                    <p><strong>Trạng Thái:</strong> <?php echo $_smarty_tpl->getValue('order')['status'];?>
</p> 
                    <p><strong>Ngày Đặt Hàng:</strong> <?php echo $_smarty_tpl->getValue('order')['order_date'];?>
</p> 
                    
                    <h4>Sản Phẩm:</h4>
                    <ul>
                        <li>
                            <strong>Tên sản phẩm: <?php echo $_smarty_tpl->getValue('order')['product_name'];?>
</strong> - Số lượng: 
                            <?php echo $_smarty_tpl->getValue('order')['quantity'];?>
 
                            - Giá:<?php echo $_smarty_tpl->getValue('order')['price'];?>
 VND - <br>
                            Tổng tiền: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['total_price'],0,',','.');?>
 VND

                            

                        </li>
                        <li>
                            Màu: <?php echo $_smarty_tpl->getValue('order')['product_color'];?>
<br>Kích cỡ: <?php echo $_smarty_tpl->getValue('order')['product_size'];?>
</br> 
                           
                        </li>
                    </ul>

                    <p><strong>Trạng Thái:</strong> <span class="<?php echo $_smarty_tpl->getValue('order')['status'];?>
"><?php echo $_smarty_tpl->getValue('order')['status'];?>
</span></p>
                </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
        </section>

       <!-- Nút xuất Excel -->
       <form method="post" action="index.php?action=export_excel">
        <button style="margin-left: 500px;background-color: green;" type="submit" name="export" value="1">Xuất Excel</button>
    </form>



        
    </div>
</body>



</html>
<?php }
}
