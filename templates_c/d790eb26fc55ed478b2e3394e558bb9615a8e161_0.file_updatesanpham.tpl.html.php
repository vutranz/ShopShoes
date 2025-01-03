<?php
/* Smarty version 5.4.1, created on 2024-12-13 00:12:51
  from 'file:templates\admin\product\updatesanpham.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675b6df3b25873_29658745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd790eb26fc55ed478b2e3394e558bb9615a8e161' => 
    array (
      0 => 'templates\\admin\\product\\updatesanpham.tpl.html',
      1 => 1734045170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675b6df3b25873_29658745 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\product';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Sản Phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 10px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9f9f9;
        }
        .form-group textarea {
            height: 120px;
        }
        .form-group select {
            background-color: #fff;
            cursor: pointer;
        }
        .form-group input[type="file"] {
            padding: 0;
        }
        .form-group button {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .form-group img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            margin-top: 15px;
        }
        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .form-group .color-picker {
            display: flex;
            justify-content: space-between;
        }
        .color-picker label {
            flex: 1;
            text-align: center;
        }
        .color-picker select {
            flex: 2;
        }
        .form-group select:focus, .form-group input:focus, .form-group textarea:focus {
            border-color: #80bdff;
            outline: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Chỉnh sửa sản phẩm</h2>
            <form action="index.php?action=updateProduct" method="POST" enctype="multipart/form-data">
                    <input hidden type="text" name = "id" value="<?php echo $_smarty_tpl->getValue('products')->getId();?>
">
                    <input hidden type="text" name = "create_at" value="<?php echo $_smarty_tpl->getValue('products')->getCreateAt();?>
">
                    <!-- Tên sản phẩm -->
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm:</label>
                        <input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->getValue('products')->getName();?>
" required>
                    </div>

                    <!-- Mô tả -->
                    <div class="form-group">
                        <label for="description">Mô Tả:</label>
                        <textarea id="description" name="description"  required><?php echo $_smarty_tpl->getValue('products')->getDescription();?>
</textarea>
                    </div>

                    <!-- Giá -->
                    <div class="form-group">
                        <label for="price">Giá:</label>
                        <input type="number" id="price" name="price" value="<?php echo $_smarty_tpl->getValue('products')->getPrice();?>
" VND required>
                    </div>

                    <!-- Tồn kho -->
                    <div class="form-group">
                        <label for="stock">Tồn Kho:</label>
                        <input type="number" id="stock" name="stock" value="<?php echo $_smarty_tpl->getValue('products')->getStock();?>
" required>
                    </div>

                

                    <!-- Trạng thái -->
                    <div class="form-group">
                        <label for="is_active">Trạng Thái:</label>
                        <select id="is_active" name="is_active" required>
                            <option value="1">Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                        </select>
                    </div>

                    <!-- Màu sắc -->
            <div class="form-group color-picker">
                <label for="color_id">Màu Sắc:</label>
                <select id="color_id" name="color_id" required>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('colors'), 'colors');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('colors')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('colors')->getId();?>
" <?php if ($_smarty_tpl->getValue('colors')->getId() == $_smarty_tpl->getValue('products')->getColorId()->getId()) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->getValue('colors')->getColorName();?>
</option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            
            <!-- Kích cỡ -->
            <div class="form-group">
                <label for="size_id">Kích Cỡ:</label>
                <select id="size_id" name="size_id" required>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('sizes'), 'sizes');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('sizes')->value) {
$foreach1DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('sizes')->getId();?>
" <?php if ($_smarty_tpl->getValue('sizes')->getId() == $_smarty_tpl->getValue('products')->getSizeId()->getId()) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->getValue('sizes')->getSizeName();?>

                        </option>
                        
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            
            <!-- Danh mục -->
            <div class="form-group">
                <label for="category_id">Danh Mục:</label>
                <select id="category_id" name="category_id" required>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'categories');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('categories')->value) {
$foreach2DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('categories')->getId();?>
" <?php if ($_smarty_tpl->getValue('categories')->getId() == $_smarty_tpl->getValue('products')->getCategoryId()->getId()) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->getValue('categories')->getName();?>

                        </option>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>

            <div class="form-group">
                <label>Hình ảnh hiện tại:</label>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images')[$_smarty_tpl->getValue('products')->getId()], 'image');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach3DoElse = false;
?>
                    <div style="display: inline-block; margin-right: 10px; text-align: center;">
                        <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Hình ảnh sản phẩm" width="100">
                        <br>
                        <!-- Checkbox để giữ lại hình ảnh -->
                        <label>
                            <input type="checkbox" name="keep_images[]" value="<?php echo $_smarty_tpl->getValue('image')->getId();?>
" checked>
                            Giữ lại
                        </label>
                    </div>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </div>
            
            <!-- Chọn ảnh mới -->
            <div class="form-group">
                <label for="images">Chọn Hình Ảnh (không bắt buộc):</label>
                <input type="file" id="images" name="images[]" accept="image/*" multiple>
            </div>
            
            <!-- Nút cập nhật -->
            <div class="form-group">
                <button type="submit">Cập nhật sản phẩm</button>
            </div>
            
                   
                </form>
       
    </div>

    <?php echo '<script'; ?>
>
        // Xem trước hình ảnh
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                const imagePreview = document.getElementById("imagePreview");
                imagePreview.innerHTML = '<img src="' + reader.result + '" alt="Hình ảnh sản phẩm">';
            }
            reader.readAsDataURL(file);
        }
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
