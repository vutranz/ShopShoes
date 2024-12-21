<?php
/* Smarty version 5.4.1, created on 2024-12-17 14:44:10
  from 'file:templates/index.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_6761802a8cbf06_60422574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4ae7b146e03bbb83ea55511493b89ccd6ceadde' => 
    array (
      0 => 'templates/index.tpl.html',
      1 => 1734443049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6761802a8cbf06_60422574 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates';
?><!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Giày</title>
    <!-- <link rel="stylesheet" href="./templates/style.css"> -->
    <link rel="icon" href="shoe-icon.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/index.css">
    
    <style>
        .cart-count {
    position: absolute;
    top: -5px; /* Đưa số lượng lên trên giỏ hàng */
    right: -10px; /* Đưa số lượng sang bên phải giỏ hàng */
    background-color: red; /* Màu nền của số lượng */
    color: white; /* Màu chữ của số lượng */
    border-radius: 50%; /* Để số lượng hiển thị trong một vòng tròn */
    padding: 3px 10px; /* Điều chỉnh kích thước vòng tròn */
    font-size: 14px; /* Kích thước chữ */
    margin-right: 15px;
    margin-top: 15px;
    font-weight: bold; /* Làm đậm số lượng */
}

    </style>
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
                    <!-- <li><a href="#">Sản Phẩm Phổ Biến</a></li> -->
                    <li><a href="#">Liên Hệ</a></li>
                    <?php if (!$_smarty_tpl->getValue('is_logged_in')) {?>
                    <li><a href="index.php?action=FormLogin">Đăng nhập</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
                    <li><a href="index.php?action=historyorder">Lịch sử đặt hàng</a></li>
                    <?php }?>

                    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
                    <li>
                        <a href="#" style="display: inline-flex; align-items: center;">
                            <i class='far fa-user-circle' style='font-size:24px;color: white; margin-right: 5px;'></i>
                            <span style="font-size: 14px; color: white;"><?php echo $_smarty_tpl->getValue('user_name');?>
</span>
                        </a>
                    </li>
                    <?php }?>

                    <!-- Icon giỏ hàng -->
                    <li style="position: relative;">
                        <a href="index.php?action=showcart">
                            <i class="fa fa-shopping-cart" style="font-size: 24px; color: white; margin-right: 20px;"></i>
                            <span class="cart-count" id="cart-count"><?php echo $_smarty_tpl->getValue('cartitemService');?>
</span> <!-- Số lượng sản phẩm trong giỏ hàng -->
                        </a>
                    </li>
                    
                    
                    

                    <?php if ($_smarty_tpl->getValue('is_logged_in')) {?>
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
            </div>
        </section>

       <!-- Product Categories -->
<section class="categories" id="categories">
    <div class="container">
        <h2 >Danh Mục Sản Phẩm</h2>
        <div class="category-list">
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

<!-- Bộ lọc -->
<div style="margin-left: 500px;" class="search-and-filter">
    <!-- Ô tìm kiếm -->
    <div class="search-box" style="padding-left: 100px; padding-bottom: 50px;padding-top: 50px;">
        <form action="index.php?action=index" method="GET">
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." value="<?php echo $_smarty_tpl->getValue('search');?>
">
            <button type="submit">Tìm kiếm</button>
        </form>
    </div>

    <!-- Bộ lọc sản phẩm -->
    <div class="filters">
        <form action="index.php?action=index" method="GET">
            <select name="category" id="category">
                <option value="">Chọn danh mục</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('category'), 'category');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach1DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('category')->getId();?>
" <?php if ($_smarty_tpl->getValue('category')->getId() == $_smarty_tpl->getValue('categoryFilter')) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('category')->getName();?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>

            <select name="color" id="color">
                <option value="">Chọn màu sắc</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('color'), 'color');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('color')->value) {
$foreach2DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('color')->getId();?>
" <?php if ($_smarty_tpl->getValue('color')->getId() == $_smarty_tpl->getValue('colorFilter')) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('color')->getColorName();?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>

            <select name="size" id="size">
                <option value="">Chọn kích thước</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('size'), 'size');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('size')->value) {
$foreach3DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('size')->getId();?>
" <?php if ($_smarty_tpl->getValue('size')->getId() == $_smarty_tpl->getValue('sizeFilter')) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('size')->getSizeName();?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>

            <select name="sort" id="sort">
                <option value="">Sắp xếp</option>
                <option value="0" <?php if ($_smarty_tpl->getValue('sortOrder') == 0) {?>selected<?php }?>>Theo giá giảm dần</option>
                <option value="1" <?php if ($_smarty_tpl->getValue('sortOrder') == 1) {?>selected<?php }?>>Theo giá tăng dần</option>
                <!-- <option value="2" <?php if ($_smarty_tpl->getValue('sortOrder') == 2) {?>selected<?php }?>>Sản phẩm mới nhất</option>
                <option value="3" <?php if ($_smarty_tpl->getValue('sortOrder') == 3) {?>selected<?php }?>>Sản phẩm bán chạy</option> -->
            </select>

            <button style="
            background-color: #45a049; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            font-size: 16px; 
            border-radius: 5px; 
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        ">
            Lọc
        </button>
        
        </form>
    </div>
</div>

<!-- Featured Products -->
<section class="featured-products" id="product-Featured">
    <div class="container">
        <h2>Sản Phẩm Của Chúng tôi</h2>
        <div class="products">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach4DoElse = false;
?>
            <div class="product-card">
                <td>
                    <?php $_smarty_tpl->assign('i', 0, false, NULL);?> <!-- Khởi tạo biến đếm -->
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('product')->getId()], 'image');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach5DoElse = false;
?>
                    <?php if ($_smarty_tpl->getValue('i') == 1) {?>
                        <?php break 1;?>
                    <?php }?>
                    <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Giày 1">
                    <?php $_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);?> <!-- Tăng biến đếm -->
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </td>
                <h3><?php echo $_smarty_tpl->getValue('product')->getName();?>
</h3>
                <p>Giá: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')->getPrice(),0,'.','.');?>
 VND</p>
                <div class="product-buttons">
                    <?php if ($_smarty_tpl->getValue('product') != null && $_smarty_tpl->getValue('product')->getId() != null) {?>
                        <a style="background-color: grey;" href="index.php?action=productdetail&id=<?php echo $_smarty_tpl->getValue('product')->getId();?>
" class="btn-buy-now">Xem chi tiết</a>
                    <?php } else { ?>
                        <p>Sản phẩm không hợp lệ hoặc không có ID.</p>
                    <?php }?>
                </div>
                
            </div>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>

    <!-- Phân trang -->
    <div class="pagination" id="pagination">
        <?php if ($_smarty_tpl->getValue('currentPage') > 1) {?>
            <a href="index.php?action=index&page=<?php echo $_smarty_tpl->getValue('currentPage')-1;?>
" class="prev">Trước</a>
        <?php }?>

        <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <a href="index.php?action=index&page=<?php echo $_smarty_tpl->getValue('i');?>
" 
            class="page-link <?php if ($_smarty_tpl->getValue('i') == $_smarty_tpl->getValue('currentPage')) {?> active <?php }?>">
            <?php echo $_smarty_tpl->getValue('i');?>

            </a>
        <?php }
}
?>

        <?php if ($_smarty_tpl->getValue('currentPage') < $_smarty_tpl->getValue('totalPages')) {?>
            <a href="index.php?action=index&page=<?php echo $_smarty_tpl->getValue('currentPage')+1;?>
" class="next">Tiếp</a>
        <?php }?>
    </div>
</section>

        
       
        

       <!-- New Products -->
<section class="new-products">
    <div class="container">
        <h2>Sản Phẩm Mới Nhất</h2>
        <div class="products">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_new'), 'product_new');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product_new')->value) {
$foreach6DoElse = false;
?>
                <div class="product-card">
                    <td>
                        <?php $_smarty_tpl->assign('product_id', $_smarty_tpl->getValue('product_new')->getId(), false, NULL);?>
                        <?php if ((null !== ($_smarty_tpl->getValue('product_images_new')[$_smarty_tpl->getValue('product_id')] ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('product_images_new')[$_smarty_tpl->getValue('product_id')]) > 0) {?>
                            <?php $_smarty_tpl->assign('i', 0, false, NULL);?> <!-- Khởi tạo biến đếm -->
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images_new')[$_smarty_tpl->getValue('product_id')], 'image');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach7DoElse = false;
?>
                                <?php if ($_smarty_tpl->getValue('i') == 1) {?> <?php break 1;?> <?php }?> <!-- Dừng vòng lặp khi i = 1 -->
                                <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Giày 1">
                                <?php $_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);?> <!-- Tăng biến đếm -->
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <p>Không có hình ảnh cho sản phẩm này.</p>
                        <?php }?>
                    </td>
                    <h3><?php echo $_smarty_tpl->getValue('product_new')->getName();?>
</h3>
                    <p>Giá: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product_new')->getPrice(),0,'.','.');?>
 VND</p>
                    <div class="product-buttons">
                        <?php if ($_smarty_tpl->getValue('product') != null && $_smarty_tpl->getValue('product')->getId() != null) {?>
                            <a style="background-color: grey;" href="index.php?action=productdetail&id=<?php echo $_smarty_tpl->getValue('product')->getId();?>
" class="btn-buy-now">Xem chi tiết</a>
                        <?php } else { ?>
                            <p>Sản phẩm không hợp lệ hoặc không có ID.</p>
                        <?php }?>
                    </div>
                    
                </div>
                 
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</section>


        <!-- Popular Products -->
            <!-- <section class="popular-products">
                <div class="container">
                    <h2>Sản Phẩm Phổ Biến</h2>
                    <div class="products">
                    
                        <div class="product-card">
                            <img src="./templates/image/giaymwc.jpg" alt="Giày 1">
                            <h3>Giày Sneaker</h3>
                            <p>Giá: 1,200,000 VND</p>
                            <div class="product-buttons">
                                <a style="background-color: grey;" href="#" class="btn-buy-now">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

        <div class="popup" id="product-popup">
            <div class="popup-content">
                <img id="popup-image" src="" alt="Product Image">
                <h3 id="popup-name"></h3>
                <p id="popup-price"></p>
                
                <!-- New Quantity Section -->
                <div style="margin-left: 120px;" class="product-quantity">
                    <label for="popup-quantity">Số lượng:</label>
                    <input type="number" id="popup-quantity" value="1" min="1">
                </div>
                
                <div class="product-buttons">
                    <a href="#" class="btn-buy-now">Mua Ngay</a>
                    <a href="" class="btn-add-to-cart">Thêm Vào Giỏ</a>
                </div>
                <span class="close" onclick="closePopup()">&times;</span>
            </div>
        </div>
        
    </main>

    <footer>
        <div class="container">
            <p>© 2024 Shop Giày. Tất cả quyền lợi được bảo lưu.</p>
        </div>
    </footer>

    <?php echo '<script'; ?>
>
        // Hàm hiển thị popup
function showPopup(name, price, image) {
    // Cập nhật thông tin vào popup
    document.getElementById('popup-name').innerText = name;
    document.getElementById('popup-price').innerText = price;
    document.getElementById('popup-image').src = image;
    
    // Hiển thị popup
    document.getElementById('product-popup').style.display = 'flex';
}

// Hàm đóng popup
function closePopup() {
    document.getElementById('product-popup').style.display = 'none';
}

// Thêm sự kiện click vào tất cả hình ảnh sản phẩm để hiển thị popup
document.querySelectorAll('.product-card img').forEach(img => {
    img.addEventListener('click', (event) => {
        // Lấy thông tin sản phẩm từ thuộc tính của hình ảnh
        const name = event.target.getAttribute('data-name');
        const price = event.target.getAttribute('data-price');
        const image = event.target.src;

        // Hiển thị popup
        showPopup(name, price, image);
    });
});

// Thêm sự kiện đóng popup khi người dùng nhấn vào dấu "X"
document.querySelector('.popup .close').addEventListener('click', closePopup);



        
    <?php echo '</script'; ?>
>

     <!-- Đặt mã JavaScript ở cuối trang hoặc sau phần Smarty -->
     <?php echo '<script'; ?>
 type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
    // Lấy vị trí cuộn từ localStorage
    const savedScrollPosition = localStorage.getItem('scrollPosition');
    if (savedScrollPosition) {
        window.scrollTo(0, parseInt(savedScrollPosition, 10));
        localStorage.removeItem('scrollPosition');
    }

    // Lưu vị trí cuộn trước khi điều hướng đến trang khác
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
    });
});


        <?php echo '</script'; ?>
>
        
    
    
</body>

</html>
<?php }
}
