<?php
/* Smarty version 5.4.1, created on 2024-12-12 04:01:21
  from 'file:templates\admin\product\productdetail.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675a52011ba246_99492345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f66dc07666b8f644d7726bd5f57e98935e5b934' => 
    array (
      0 => 'templates\\admin\\product\\productdetail.html',
      1 => 1733972480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675a52011ba246_99492345 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\product';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .container:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .product-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product-images {
            width: 35%;
            text-align: center;
        }
        .product-info {
            width: 50%;
        }
        .product-images img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }
        .product-images img:hover {
            transform: scale(1.05);
        }
        .product-info h1 {
            font-size: 28px;
            margin-bottom: 15px;
        }
        .product-info p {
            font-size: 18px;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        .product-info .options {
            margin-bottom: 15px;
        }
        .product-info .option-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .product-info .option-group p {
            margin-right: 10px;
            font-weight: bold;
        }
        .product-info .option {
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .product-info .option.selected, .product-info .option:hover {
            background-color: #28a745;
            color: #fff;
            border-color: #28a745;
        }
        .product-info .button-group {
            display: flex;
            justify-content: space-between;
        }
        .product-info button {
            width: 48%;
            padding: 12px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        .product-info button:hover {
            background-color: #218838;
        }
        .product-images .slide {
            display: none;
        }
        .product-images .active-slide {
            display: block;
        }
        .carousel-buttons {
            text-align: center;
            margin-top: 10px;
        }
        .carousel-buttons i {
            cursor: pointer;
            font-size: 24px;
            margin: 0 15px;
            color: #333;
            transition: color 0.3s;
        }
        .carousel-buttons i:hover {
            color: #28a745;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="product-details">
        <div class="product-images">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images'), 'product_images');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product_images')->value) {
$foreach0DoElse = false;
?>
                <div class="slide active-slide"><img src="uploads/<?php echo $_smarty_tpl->getValue('product_images')->getUrl();?>
" alt="Product Image 1"></div>
                
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>   
                <div class="carousel-buttons">
                    <i class="fas fa-chevron-left" onclick="prevSlide()"></i>
                    <i class="fas fa-chevron-right" onclick="nextSlide()"></i>
                </div>
           
        </div>
        <div class="product-info">
            <h1>Tên Sản Phẩm</h1>
            <p>Giá: 1,000,000 VND</p>
            <p>Mô tả: Đây là mô tả chi tiết của sản phẩm. Nó cung cấp các thông tin chi tiết về tính năng, công dụng và các thông tin liên quan khác của sản phẩm.</p>
            <div class="options">
                <div class="option-group">
                    <p>Size:</p>
                    <div class="option" onclick="selectOption('size', this)">38</div>
                    <div class="option" onclick="selectOption('size', this)">39</div>
                    <div class="option" onclick="selectOption('size', this)">40</div>
                    <div class="option" onclick="selectOption('size', this)">41</div>
                    <div class="option" onclick="selectOption('size', this)">42</div>
                </div>
                <div class="option-group">
                    <p>Màu sắc:</p>
                    <div style="background-color: #000000;" class="option" onclick="selectOption('color', this)">Đen</div>
                    <div class="option" onclick="selectOption('color', this)">Trắng</div>
                    <div class="option" onclick="selectOption('color', this)">Đỏ</div>
                    <div class="option" onclick="selectOption('color', this)">Xanh</div>
                </div>
            </div>
            <div class="button-group">
                <button style="background-color: green;" onclick="buyNow()">Mua ngay</button>
                <button style="background-color: red;" onclick="addToCart()">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active-slide'));
        slides[index].classList.add('active-slide');
    }

    function prevSlide() {
        slideIndex = (slideIndex === 0) ? slides.length - 1 : slideIndex - 1;
        showSlide(slideIndex);
    }

    function nextSlide() {
        slideIndex = (slideIndex === slides.length - 1) ? 0 : slideIndex + 1;
        showSlide(slideIndex);
    }

    function selectOption(type, element) {
        const options = element.parentElement.querySelectorAll('.option');
        options.forEach(option => option.classList.remove('selected'));
        element.classList.add('selected');
    }

    function addToCart() {
        alert('Sản phẩm đã được thêm vào giỏ hàng.');
    }

    function buyNow() {
        alert('Bạn đã mua sản phẩm thành công.');
    }

    showSlide(slideIndex);
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
