<?php
/* Smarty version 5.4.1, created on 2024-12-16 10:17:21
  from 'file:templates\user\cart\cart.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675f9bc104c713_52169867',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5e04b639f5e481d0e712fa6a31c0683e2f62696' => 
    array (
      0 => 'templates\\user\\cart\\cart.html',
      1 => 1734319019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675f9bc104c713_52169867 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\user\\cart';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng - Shop Giày</title>
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/user/cart/cart.css">
</head>
<body>

    <!-- Phần Header có thể tái sử dụng từ trang chính -->
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Danh Mục</a></li>
                    <li><a href="#">Sản Phẩm Mới</a></li>
                    <li><a href="#">Sản Phẩm Phổ Biến</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                </ul>
            </nav>
            <div class="cart-icon">
                <a hidden href="#"><img src="cart-icon.png" alt="Giỏ Hàng"></a>
            </div>
        </div>
    </header>

    <!-- Phần Giỏ Hàng -->
    <!-- Phần Giỏ Hàng -->
    <!-- Phần Giỏ Hàng -->
    <section class="cart">
        <div class="container">
            <h2>Giỏ Hàng Của Bạn</h2>
            
            <div class="cart-items">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach0DoElse = false;
?>
                    <div class="cart-item">
                        <div class="cart-item-select">
                            <label>
                                <input type="checkbox" class="item-select" /> 
                            </label>
                        </div>

                        <div class="cart-item-details">
                            <!-- Lấy tên sản phẩm, size, màu sắc từ đối tượng product -->
                            <h3><?php echo $_smarty_tpl->getValue('product')->getId();?>
</h3>
                         
                        </div>

                        <div class="cart-item-img">
                            <?php $_smarty_tpl->assign('i', 0, false, NULL);?> <!-- Khởi tạo biến đếm -->
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('product')->getId()], 'image');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach1DoElse = false;
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
                        </div>
                        <div class="cart-item-details">
                            <!-- Lấy tên sản phẩm, size, màu sắc từ đối tượng product -->
                            <h3><?php echo $_smarty_tpl->getValue('product')->getName();?>
</h3>
                         
                        </div>
                        <div class="cart-item-price">
                            <!-- Lấy giá sản phẩm từ đối tượng product -->
                            <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')->getPrice(),0,'.','.');?>
 VND</p>
                        </div>

                        <div class="cart-item-color">
    
                            <p>Màu <?php echo $_smarty_tpl->getValue('product')->getColorId()->getColorName();?>
</p>
                        </div>

                        <div class="cart-item-size">
                            
                            <p>kích cỡ: <?php echo $_smarty_tpl->getValue('product')->getSizeId()->getSizeName();?>
</p>
                        </div>
                        <div class="cart-item-quantity">
                            <!-- Cập nhật số lượng sản phẩm trong giỏ -->
                            <input type="number" value="<?php echo $_smarty_tpl->getValue('quantities')[$_smarty_tpl->getValue('product')->getId()];?>
" min="1" max="10">
                        </div>
                        <div class="cart-item-remove">
                            <!-- Nút Mua và Xóa -->
                            <button class="buy-button">Mua</button>
                            <button class="remove-button" data-cart-item-id="">Xóa</button>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

            </div>

            <div class="cart-all-select" style="margin-right: 850px;margin-top: 30px;">
                <label>
                    <input type="checkbox" id="select-all" /> Tích tất cả sản phẩm
                </label>
            </div>

            <!-- Tổng tiền và các nút hành động -->
            <div style="margin-left: 350px;" class="cart-summary">
                <div class="cart-summary-buttons">
                    <button class="checkout-btn">Tiến Hành Thanh Toán</button>
                    <button class="continue-shopping-btn">Tiếp Tục Mua Sắm</button>
                </div>
                <div class="cart-summary-total">
                    <h3>Tổng Tiền: </h3>
                    <p id="total-price">2,200,000 VND</p>
                </div>
            </div>
            
    </section>


    <!-- Phần Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Shop Giày. All rights reserved.</p>
            <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
        </div>
    </footer>

    <?php echo '<script'; ?>
>
        // Lắng nghe sự kiện thay đổi trạng thái của checkbox "Tích tất cả sản phẩm"
        document.getElementById('select-all').addEventListener('change', function() {
            // Lấy tất cả các checkbox trong giỏ hàng
            const checkboxes = document.querySelectorAll('.item-select');
    
            // Nếu checkbox "Tích tất cả sản phẩm" được chọn, thì chọn tất cả các checkbox sản phẩm
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked; // Đặt trạng thái của từng checkbox bằng trạng thái của checkbox "Tích tất cả sản phẩm"
            });
        });
    <?php echo '</script'; ?>
>
    
</body>
</html>
<?php }
}
