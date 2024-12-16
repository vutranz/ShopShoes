<?php
/* Smarty version 5.4.1, created on 2024-12-16 18:30:37
  from 'file:templates/user/cart/order.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_676063bd279f79_77819486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf5f2174446ed26bbe8f687aa80f8268fe9964b9' => 
    array (
      0 => 'templates/user/cart/order.html',
      1 => 1734370236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_676063bd279f79_77819486 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\user\\cart';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đặt Hàng</title>
    <style>
.cart-item-images {
    display: flex;               /* Dùng Flexbox để sắp xếp các hình ảnh nằm ngang */
    justify-content: space-between; /* Tạo khoảng cách đều giữa các hình ảnh */
    gap: 15px;                   /* Khoảng cách giữa các hình ảnh */
    flex-wrap: wrap;             /* Nếu có quá nhiều ảnh, chúng sẽ xuống hàng */
}

.cart-item-img {
    width: 22%;                  /* Mỗi ảnh chiếm khoảng 1/4 chiều rộng của container */
    height: 150px;               /* Chiều cao cố định cho hình ảnh */
    display: flex;
    justify-content: center;     /* Căn giữa hình ảnh */
    align-items: center;         /* Căn giữa hình ảnh theo chiều dọc */
}

.cart-item-img img {
    width: 100%;                 /* Đảm bảo ảnh chiếm toàn bộ chiều rộng của div chứa */
    height: 100%;                /* Đảm bảo ảnh chiếm toàn bộ chiều cao của div chứa */
    object-fit: cover;           /* Cắt ảnh cho vừa với container mà không làm méo hình */
    border-radius: 10px;         /* Bo góc cho ảnh */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Thêm bóng mờ cho ảnh */
}



        
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transform: scale(1);
            transition: transform 0.3s ease-in-out;
        }
        .container:hover {
            transform: scale(1.02);
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }
        h3 {
            font-size: 24px;
            color: #555;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            font-size: 16px;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input:focus, textarea:focus {
            border-color: #28a745;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .btn {
            background-color: #28a745;
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 15px;
        }
        .btn:hover {
            background-color: #218838;
        }
        .btn.cancel {
            background-color: #dc3545;
        }
        .btn.cancel:hover {
            background-color: #c82333;
        }
        .btn:focus {
            outline: none;
        }
        ul {
            list-style-type: none;
            padding: 0;
            font-size: 16px;
        }
        li {
            margin-bottom: 10px;
            color: #555;
        }
        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-top: 15px;
        }
        .total-price span {
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Đặt Hàng</h2>
        <form action="index.php?action=placeOrder" method="POST">
            <!-- Thông tin khách hàng -->
            <div hidden class="form-group">
                <label for="product_id">ID</label>
                <input type="number" id="id-product" value = "<?php echo $_smarty_tpl->getValue('product')->getId();?>
" name="product_id">
            </div>

            <div hidden class="form-group">
                <label for="quantity">số lượng</label>
                <input type="number" id="id-quantity" value = "<?php echo $_smarty_tpl->getValue('quantity');?>
" name="quantity">
            </div>

            <div hidden class="form-group">
                <label for="price">Giá</label>
                <input type="number" id="price" value = "<?php echo $_smarty_tpl->getValue('product')->getPrice();?>
" name="price">
            </div>

            <div class="form-group">
                <label for="full_name">Họ và Tên:</label>
                <input type="text" id="full_name" value = "<?php echo $_smarty_tpl->getValue('userObj')->getFullName();?>
" name="full_name" required placeholder="Nhập họ và tên">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" value = "<?php echo $_smarty_tpl->getValue('userObj')->getEmail();?>
" name="email" required placeholder="Nhập email của bạn">
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại:</label>
                <input type="number" id="phone_number" value = "<?php echo $_smarty_tpl->getValue('userObj')->getPhoneNumber();?>
" name="phone_number"  required placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <textarea id="address" name="address"  required placeholder="Nhập địa chỉ giao hàng"><?php echo $_smarty_tpl->getValue('userObj')->getAddress();?>
</textarea>
            </div>
            <div class="form-group">
                <label for="note">Ghi chú (Tùy chọn):</label>
                <textarea id="note" name="note" placeholder="Bạn có thể thêm ghi chú ở đây"></textarea>
            </div>
            <!-- Chi tiết sản phẩm -->
            <h3>Sản phẩm</h3>
            <div class="form-group">
                <label>Sản phẩm:</label>
                <ul>
                    <li>
                        <?php if ((null !== ($_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('product')->getId()] ?? null))) {?>
                            <div class="cart-item-images">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('product')->getId()], 'image');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach0DoElse = false;
?>
                                    <div class="cart-item-img">
                                        <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Giày 1">
                                    </div>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </div>
                        <?php } else { ?>
                            <p>Không có hình ảnh cho sản phẩm này.</p>
                        <?php }?>
                    </li>
                    
                    
                        
                    
                    <li style="color: #000000; font-size: 20px; font-weight: bold; padding: 5px 0; background-color: #f9f9f9; margin-top: 40px;">
                        Tên sản phẩm: <?php echo $_smarty_tpl->getValue('product')->getName();?>
 - Kích cỡ: <?php echo $_smarty_tpl->getValue('product')->getSizeId()->getSizeName();?>
 - 
                        Màu: <?php echo $_smarty_tpl->getValue('product')->getColorId()->getColorName();?>
 - <?php echo $_smarty_tpl->getValue('product')->getPrice();?>
 - Số lượng: <?php echo $_smarty_tpl->getValue('quantity');?>

                    </li>
                    
                </ul>
            </div>

            <!-- Tổng tiền -->
            <div class="form-group total-price">
                <label><b>Tổng số tiền:</b></label>
                <p><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('price'),0,'.','.');?>
 VND</p>
            </div>
            <!-- Hành động -->
            <div class="form-actions">
                <button type="submit" class="btn">Đặt Hàng</button>
                <a style="text-decoration: none;" href="index.php?action=showcart" class="btn cancel">Quay lại giỏ hàng</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php }
}
