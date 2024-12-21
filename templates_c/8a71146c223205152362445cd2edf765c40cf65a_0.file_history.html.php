<?php
/* Smarty version 5.4.1, created on 2024-12-17 13:41:03
  from 'file:templates\user\history\history.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_6761715f28ac93_53570937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a71146c223205152362445cd2edf765c40cf65a' => 
    array (
      0 => 'templates\\user\\history\\history.html',
      1 => 1734375436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6761715f28ac93_53570937 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\user\\history';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Mua Hàng</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/user/history/history.css">
</head>
<body>
    <section class="order-history">
        <div class="container">
            <h2>Lịch Sử Mua Hàng</h2>

            <!-- Group of orders for the date 01/01/2024 -->
            <div class="order-day">
                <h3>Ngày: 01/01/2024</h3>
                <div class="order-list">
                    <div class="order-item">
                        <div class="order-details">
                            <span class="order-status delivered">Trạng thái: Đã giao</span>
                            <img src="../../../image/giày cao gót/MWC 4179/kem/MWC 4179_1.jpg" alt="Sản phẩm 1" class="order-product-img">
                            <div class="order-product-info">
                                <p class="order-product-name">Giày Thể Thao Nam</p>
                                <p class="order-product-price">1,000,000 VND</p>
                            </div>
                            <div class="order-actions">
                                <button class="reorder-btn">Mua Lại</button>
                            </div>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-details">
                            <span class="order-status pending">Trạng thái: Đang đợi duyệt</span>
                            <img src="../../../image/giày cao gót/MWC 4179/kem/MWC 4179_1.jpg" alt="Sản phẩm 2" class="order-product-img">
                            <div class="order-product-info">
                                <p class="order-product-name">Giày Sandal Nữ</p>
                                <p class="order-product-price">800,000 VND</p>
                            </div>
                            <div class="order-actions">
                                <button class="reorder-btn">Mua Lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group of orders for the date 15/02/2024 -->
            <div class="order-day">
                <h3>Ngày: 15/02/2024</h3>
                <div class="order-list">
                    <div class="order-item">
                        <div class="order-details">
                            <span class="order-status delivered">Trạng thái: Đã giao</span>
                            <img src="../../../image/giày cao gót/MWC 4179/kem/MWC 4179_1.jpg" alt="Sản phẩm 3" class="order-product-img">
                            <div class="order-product-info">
                                <p class="order-product-name">Giày Boot Nữ</p>
                                <p class="order-product-price">1,200,000 VND</p>
                            </div>
                            <div class="order-actions">
                                <button class="reorder-btn">Mua Lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more date groups here as needed -->

        </div>
    </section>
</body>
</html>
<?php }
}
