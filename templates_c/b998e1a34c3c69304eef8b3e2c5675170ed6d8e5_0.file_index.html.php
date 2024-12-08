<?php
/* Smarty version 5.4.1, created on 2024-12-07 11:28:52
  from 'file:index.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_6754236442a519_48871199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b998e1a34c3c69304eef8b3e2c5675170ed6d8e5' => 
    array (
      0 => 'index.html',
      1 => 1733567331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6754236442a519_48871199 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates';
?><!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Giày</title>
    <link rel="stylesheet" href="./templates/style.css">
    <link rel="icon" href="shoe-icon.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    

</head>

<body>
    <!-- Header -->
    
    <header>
        <div class="container">
            <div class="logo">
                <a href="#">Shop Giày</a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#categories">Danh Mục</a></li>
                    <li><a href="#product-new">Sản Phẩm Mới</a></li>
                    <li><a href="#">Sản Phẩm Phổ Biến</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    
                    <?php if (!$_smarty_tpl->getValue('is_logged_in')) {?>
                        <li><a href="index.php?action=FormLogin">Đăng nhập</a></li>
                    <?php }?>
            
                    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
                        <!-- Hiển thị icon và tên người dùng -->
                        <li>
                            <a href="#" style="display: inline-flex; align-items: center;">
                                <i class='far fa-user-circle' style='font-size:24px;color: white; margin-right: 5px;'></i>
                                <span style="font-size: 14px; color: white;"><?php echo $_smarty_tpl->getValue('user_name');?>
</span>
                            </a>
                        </li>
                    <?php }?>
                    
                    <!-- Icon giỏ hàng -->
                    <li>
                        <a href="#"><i class="fa fa-shopping-cart" style="font-size:24px; color: white; margin-right: 20px;"></i></a>
                    </li>
                    
                    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
                        <!-- Icon đăng xuất -->
                        <li>
                            <a href="index.php?action=logout"><i class='fas fa-power-off' style='font-size:24px; color: white;'></i></a>
                        </li>
                    <?php }?>
                </ul>
            </nav>
            
        </div>
    </header>
    

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1 style="color: #000;">Chào mừng đến với Shop Giày!</h1>
                <p style="color: #000;">Khám phá bộ sưu tập giày mới nhất</p>
                <!-- <a href="#" class="btn">Xem Sản Phẩm</a> -->
            </div>
        </section>

        <!-- Product Categories -->
        <section class="categories" id="categories">
            <div class="container">
                <h2>Danh Mục Sản Phẩm</h2>
                <div  class="category-list">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('category'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
                        <div style="background-color: darksalmon;" class="category-item">
                            
                            <h3><?php echo $_smarty_tpl->getValue('category')->getName();?>
</h3>
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
                
            </div>
        </section>

        <!-- Featured Products -->
        <section class="featured-products" id="product-Featured">
            <div class="container">
                <h2>Sản Phẩm Nỗi Bật</h2>
                <div class="products">
                   <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'products');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('products')->value) {
$foreach1DoElse = false;
?>
                        <div class="product-card">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('products')->getId()], 'image');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach2DoElse = false;
?>
                              
                                <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Giày 1">
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                           
                            <h3><?php echo $_smarty_tpl->getValue('products')->getName();?>
</h3>
                            <p>Giá: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('products')->getPrice(),0,'.','.');?>
 VND</p>
                            <div class="product-buttons">
                            <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </section>


        <!-- New Products -->
        <section class="new-products">
            <div class="container">
                <h2>Sản Phẩm Mới Nhất</h2>
                <div class="products">
                    <!-- Product Card -->
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 1">
                        <h3>Giày Sneaker</h3>
                        <p>Giá: 1,200,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 2">
                        <h3>Giày Thể Thao</h3>
                        <p>Giá: 1,500,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 3">
                        <h3>Giày Lười</h3>
                        <p>Giá: 800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Products -->
        <section class="popular-products">
            <div class="container">
                <h2>Sản Phẩm Phổ Biến</h2>
                <div class="products">
                    <!-- Product Card -->
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 1">
                        <h3>Giày Sneaker</h3>
                        <p>Giá: 1,200,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 2">
                        <h3>Giày Thể Thao</h3>
                        <p>Giá: 1,500,000 VND</p>
                        <div class="product-buttons">
                            <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 3">
                        <h3>Giày Lười</h3>
                        <p>Giá: 800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="./templates/image/giaymwc.jpg" alt="Giày 4">
                        <h3>Giày Boot</h3>
                        <p>Giá: 1,800,000 VND</p>
                        <div class="product-buttons">
                           <a href="#" class="btn-buy-now">Mua Ngay</a>
                            <a href="#" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div id="footer"></div>

    <?php echo '<script'; ?>
>
        fetch('./templates/header.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('header').innerHTML = data;
            })
            .catch(error => console.error('Error loading header:', error));
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        fetch('./templates/footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footer').innerHTML = data;
            })
            .catch(error => console.error('Error loading footer:', error));
    <?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
