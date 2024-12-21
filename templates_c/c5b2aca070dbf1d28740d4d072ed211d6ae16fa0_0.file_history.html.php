<?php
/* Smarty version 5.4.1, created on 2024-12-17 14:38:08
  from 'file:templates/user/history/history.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67617ec0624a43_05910735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5b2aca070dbf1d28740d4d072ed211d6ae16fa0' => 
    array (
      0 => 'templates/user/history/history.html',
      1 => 1734442687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67617ec0624a43_05910735 (\Smarty\Template $_smarty_tpl) {
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
    <style>
        /* Giảm kích thước ảnh */
.product-img {
    width: 100px; /* Chiều rộng nhỏ lại */
    height: 100px; /* Chiều cao tương ứng */
    object-fit: cover; /* Giữ tỉ lệ hình ảnh và cắt phần dư */
    border-radius: 8px; /* Bo tròn góc ảnh (nếu cần) */
    margin-bottom: 10px; /* Khoảng cách dưới */
    
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
    
    <section class="order-history">
        <div class="container">
            <div>
                <h2>Lịch Sử Mua Hàng</h2>
            <div style ="margin-right: 1000px;" class="center-link">
                <a href="index.php?action=index" class="back-button">Quay lại</a>
            </div>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orderGroupedByDate'), 'orders', false, 'date');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('date')->value => $_smarty_tpl->getVariable('orders')->value) {
$foreach0DoElse = false;
?>
            </div>
            
            <div class="order-day">
                <h3>Ngày: <?php echo $_smarty_tpl->getValue('date');?>
</h3>
                <div class="order-list">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orders'), 'order');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach1DoElse = false;
?>
                    <div class="order-item">
                        <div class="order-details">
                            <span class="order-status <?php if ($_smarty_tpl->getValue('order')['status'] == 'Đã duyệt') {?>delivered<?php } else { ?>pending<?php }?>">
                                Trạng thái: <?php echo $_smarty_tpl->getValue('order')['status'];?>

                            </span>
                            

                            <!-- Hiển thị hình ảnh -->
                            <div class="order-product-image">
                                <?php $_smarty_tpl->assign('images', (($tmp = $_smarty_tpl->getValue('productImages')[$_smarty_tpl->getValue('order')['product']->getId()] ?? null)===null||$tmp==='' ? array() ?? null : $tmp), false, NULL);?>
                                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('images')) > 0) {?>
                                    <img class="product-img" src="uploads/<?php echo $_smarty_tpl->getValue('images')[0]->getUrl();?>
" alt="Sản phẩm <?php echo $_smarty_tpl->getValue('order')['product']->getName();?>
">
                                <?php } else { ?>
                                    <img class="product-img" src="uploads/default.jpg" alt="Ảnh mặc định">
                                <?php }?>
                            </div>

                            <!-- Thông tin sản phẩm -->
                            <div class="order-product-info">
                                <p class="order-product-name"><?php echo $_smarty_tpl->getValue('order')['product']->getName();?>
</p>
                                <p class="order-product-price"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['price'],0);?>
 VND</p>
                                <p class="order-product-quantity">Số lượng: <?php echo $_smarty_tpl->getValue('order')['quantity'];?>
</p>
                                <p class="order-product-total-money">Tổng tiền: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('order')['total_money'],0);?>
 VND</p>
                            </div>

                            <!-- Nút hành động -->
                            <div class="order-actions">
                                <button class="reorder-btn">Mua Lại</button>
                            </div>
                        </div>
                    </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </section>
   
    
    
</body>


</html>
<?php }
}
