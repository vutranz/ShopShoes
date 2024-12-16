<?php
/* Smarty version 5.4.1, created on 2024-12-16 10:29:10
  from 'file:templates/user/cart/cart.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675ff2e667d1c2_59930903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21ce1ee8f084bb3e197faf2cfa23c681c0e8cdc9' => 
    array (
      0 => 'templates/user/cart/cart.html',
      1 => 1734341349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675ff2e667d1c2_59930903 (\Smarty\Template $_smarty_tpl) {
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
                                <input type="checkbox" class="item-select" data-product-id="<?php echo $_smarty_tpl->getValue('product')->getId();?>
"/> 
                            </label>
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
                            <h3 id="product-name-<?php echo $_smarty_tpl->getValue('product')->getId();?>
"><?php echo $_smarty_tpl->getValue('product')->getName();?>
</h3>
                        </div>
                        <div class="cart-item-price">
                            <!-- Lấy giá sản phẩm từ đối tượng product -->
                            <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')->getPrice(),0,'.','.');?>
 VND</p>
                        </div>

                        <div class="cart-item-color">
                            <p id=" id="product-color-<?php echo $_smarty_tpl->getValue('product')->getId();?>
">Màu <?php echo $_smarty_tpl->getValue('product')->getColorId()->getColorName();?>
</p>
                        </div>

                        <div class="cart-item-size">
                            <p id="product-size-<?php echo $_smarty_tpl->getValue('product')->getId();?>
">Kích cỡ: <?php echo $_smarty_tpl->getValue('product')->getSizeId()->getSizeName();?>
</p>
                        </div>
                        <div class="cart-item-quantity">
                            <!-- Cập nhật số lượng sản phẩm trong giỏ -->
                            <input type="number" id="quantity_<?php echo $_smarty_tpl->getValue('product')->getId();?>
" value="<?php echo $_smarty_tpl->getValue('quantities')[$_smarty_tpl->getValue('product')->getId()];?>
" min="1" max="10">
                        </div>

                        <div class="cart-item-totalmoney">
                            <!-- Hiển thị tổng tiền cho sản phẩm -->
                            <p>Tổng tiền: <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('totalPrices')[$_smarty_tpl->getValue('product')->getId()],0,'.','.');?>
 VND</p>
                        </div>
                        <div class="cart-item-remove">
                            <!-- Nút Mua và Xóa -->
                            <a href="#" 
                                onclick="buyProduct('<?php echo $_smarty_tpl->getValue('product')->getName();?>
', '<?php echo $_smarty_tpl->getValue('product')->getSizeId()->getSizeName();?>
', '<?php echo $_smarty_tpl->getValue('product')->getColorId()->getColorName();?>
', document.getElementById('quantity_<?php echo $_smarty_tpl->getValue('product')->getId();?>
').value)"
                                style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; border-radius: 5px; text-align: center; text-decoration: none; cursor: pointer;">
                                Mua
                            </a>

                            <a href="index.php?action=deletecart&id=<?php echo $_smarty_tpl->getValue('product')->getId();?>
" 
                            style="display: inline-block; padding: 10px 20px; background-color: #dc3545; color: white; border-radius: 5px; text-align: center; text-decoration: none; cursor: pointer;">
                                Xóa
                            </a>
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
                <div class="cart-summary-buttons" style="display: flex; justify-content: space-between; text-align: center;">
                    <a href="#" onclick="buyAllProducts()"
                        style="flex: 1; padding: 10px 20px; background-color: #41a83e; color: white; border-radius: 5px; text-align: center; cursor: pointer; text-decoration: none; margin-right: 10px;">
                        Mua tất cả
                    </a>
                    
                    <a href="index.php?action=index" class="continue-shopping-btn"
                        style="flex: 1; padding: 10px 20px; background-color: #ff0000; color: white; border-radius: 5px; text-align: center; cursor: pointer; text-decoration: none;">
                        Tiếp Tục Mua Sắm
                    </a>
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
        function buyProduct(name, size, color, quantity) {
            // Tạo URL bằng cách nối chuỗi
            const url = "index.php?action=buyproductincart" +
                        "&name=" + encodeURIComponent(name) +
                        "&size=" + encodeURIComponent(size) +
                        "&color=" + encodeURIComponent(color) +
                        "&quantity=" + encodeURIComponent(quantity);
    
            // Chuyển hướng tới URL
            window.location.href = url;
        }


        function buyAllProducts() {
            const selectedProducts = [];
            const selectedCheckboxes = document.querySelectorAll('.item-select:checked');
            selectedCheckboxes.forEach(checkbox => {
                const productId = checkbox.getAttribute('data-product-id');
                const productName = document.querySelector(`#product-name-<?php ob_start();
echo $_smarty_tpl->getValue('productId');
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
`).textContent;
                const productColor = document.querySelector(`#product-color-<?php ob_start();
echo $_smarty_tpl->getValue('productId');
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
`).textContent;
                const productSize = document.querySelector(`#product-size-<?php ob_start();
echo $_smarty_tpl->getValue('productId');
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
`).textContent;
                const productQuantity = document.querySelector(`#quantity_<?php ob_start();
echo $_smarty_tpl->getValue('productId');
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
`).value;

                selectedProducts.push({
                    name: productName,
                    size: productSize,
                    color: productColor,
                    quantity: productQuantity
                });
            });

            if (selectedProducts.length > 0) {
                let url = "index.php?action=buyallproductincart";
                selectedProducts.forEach(function(product, index) {
                url += "&product" + index + "name=" + encodeURIComponent(product.name);
                url += "&product" + index + "size=" + encodeURIComponent(product.size);
                url += "&product" + index + "color=" + encodeURIComponent(product.color);
                url += "&product" + index + "quantity=" + encodeURIComponent(product.quantity);
            });
                window.location.href = url;
            } else {
                alert("Vui lòng chọn ít nhất một sản phẩm.");
            }
        }

        document.getElementById('select-all').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.item-select');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    <?php echo '</script'; ?>
>
    
    
    
    
    <!-- <?php echo '<script'; ?>
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
> -->
    
</body>
</html>
<?php }
}
