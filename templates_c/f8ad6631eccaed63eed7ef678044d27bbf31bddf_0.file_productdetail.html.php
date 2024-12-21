<?php
/* Smarty version 5.4.1, created on 2024-12-17 14:42:45
  from 'file:templates/admin/product/productdetail.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67617fd509abf5_99137873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8ad6631eccaed63eed7ef678044d27bbf31bddf' => 
    array (
      0 => 'templates/admin/product/productdetail.html',
      1 => 1734442964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67617fd509abf5_99137873 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\product';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/admin/product/productdetail.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <style>
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

<div style ="margin-right: 1000px;" class="center-link">
    <a href="index.php?action=index" class="back-button">Quay lại</a>
    
</div>
<h2 style="text-align: center;">Chi tiết sản phẩm</h2>
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
           
                <div class="thumbnail-images">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('product_images'), 'product_image');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product_image')->value) {
$foreach1DoElse = false;
?>
                        <div class="thumbnail" onclick="changeSlide('<?php echo $_smarty_tpl->getValue('product_image')->getUrl();?>
')">
                            <img src="uploads/<?php echo $_smarty_tpl->getValue('product_image')->getUrl();?>
" alt="Thumbnail Image">
                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
        </div>
        <div class="product-info">
            <h1><?php echo $_smarty_tpl->getValue('product')->getName();?>
</h1>
            <!-- <p>Giá: <?php echo $_smarty_tpl->getValue('product')->getPrice();?>
</p> -->
            <p><?php echo $_smarty_tpl->getValue('product')->getDescription();?>
</p>

            <div class="options">
                <div class="option-group">
                    <p>Size:</p>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('sizes'), 'size');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('size')->value) {
$foreach2DoElse = false;
?>
                        <div class="option" onclick="selectOption('size', this)"><?php echo $_smarty_tpl->getValue('size');?>
</div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    
                </div>
               
                <br></br>
                <div class="option-group">
                    <p>Màu sắc:</p>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('colors'), 'color_code', false, 'color_name');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('color_name')->value => $_smarty_tpl->getVariable('color_code')->value) {
$foreach3DoElse = false;
?>
                        <div class="option" style="background-color: <?php echo $_smarty_tpl->getValue('color_code');?>
; color: #800080;" onclick="selectOption('color', this)">
                            <?php echo $_smarty_tpl->getValue('color_name');?>

                        </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    
                </div>

               

                <div class="product-info" > 
                    <p hidden><strong>tên:</strong> <span id="product-name"></span></p>
                    <p><strong>Giá:</strong> <span id="product-size">0 VND</span></p>
                    <p><strong>Tồn kho:</strong> <span id="product-color">0 sản phẩm</span></p>
                </div>
                
            </div>
            <div class="button-group">
                <a href="index.php?action=buyProduct&id=<?php echo $_smarty_tpl->getValue('product')->getId();?>
&name=<?php echo $_smarty_tpl->getValue('product')->getName();?>
" class="button" style="background-color: green;">Mua ngay</a>
                <!-- <a href="index.php?action=addCartProduct&id=<?php echo $_smarty_tpl->getValue('product')->getId();?>
" class="button" style="background-color: red;">Thêm vào giỏ hàng</a> -->
                <a href="javascript:void(0);" class="button add-to-cart" style="background-color: red;" 
                data-name="<?php echo $_smarty_tpl->getValue('product')->getName();?>
">
                 Thêm vào giỏ hàng
             </a>
             
             


            </div>
            
            
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

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

    let selectedValue = element.innerText || element.style.backgroundColor;

    if (type === 'size') {
        window.selectedSize = selectedValue;
        console.log("Selected Size: ", selectedValue);
    } else if (type === 'color') {
        window.selectedColor = selectedValue;
        console.log("Selected Color: ", selectedValue);
    }

    // Kiểm tra nếu cả size và color đều đã được chọn
    if (window.selectedSize && window.selectedColor) {
        // Gửi AJAX request đến server nếu cả size và color đã được chọn
        $.ajax({
            url: "index.php?action=getProductInfo", 
            type: "POST", 
            data: {
                name: "<?php ob_start();
echo $_smarty_tpl->getValue('product')->getName();
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
", // Kiểm tra xem giá trị này có đúng
                size: window.selectedSize,   // Gửi size đã chọn
                color: window.selectedColor  // Gửi color đã chọn
            },
            success: function(response) {
                try {
                    // Parse JSON response
                    let data = JSON.parse(response);
                    if (data.status === 'success') {
                        // Cập nhật UI với dữ liệu trả về
                        document.getElementById("product-name").innerText = data.name;
                        document.getElementById("product-size").innerText = data.price + " VND";  // Đảm bảo giá có đơn vị VND
                        document.getElementById("product-color").innerText = data.stock + " sản phẩm"; // Đảm bảo hiển thị số lượng sản phẩm
                    } else {
                        alert("Không nhận được thông tin sản phẩm.");
                    }
                } catch (e) {
                    console.error("Lỗi phân tích JSON:", e);
                }
            },
            error: function(error) {
                console.error("Lỗi khi gửi yêu cầu:", error);
            }
        });
    }
}

// Hiển thị giá trị mặc định khi trang được tải lần đầu
window.onload = function() {
    if (!window.selectedSize && !window.selectedColor) {
        // Nếu chưa có size và color, hiển thị mặc định
        document.getElementById("product-name").innerText = "Sản phẩm z";
        document.getElementById("product-size").innerText = "<?php ob_start();
echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('product')->getPrice(),0,'.','.');
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
 VND";
        document.getElementById("product-color").innerText = "<?php ob_start();
echo $_smarty_tpl->getValue('product')->getStock();
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
";
    }
}






    $(document).ready(function() {
    // Lắng nghe sự kiện khi người dùng chọn size
    $(".size-option").on("click", function() {
        $(".size-option").removeClass("selected");
        $(this).addClass("selected");
        window.selectedSize = $(this).text(); // Lưu size đã chọn
        console.log("Selected Size: ", window.selectedSize); // Kiểm tra trong console
    });

    // Lắng nghe sự kiện khi người dùng chọn màu sắc
    $(".color-option").on("click", function() {
        $(".color-option").removeClass("selected");
        $(this).addClass("selected");
        window.selectedColor = $(this).text(); // Lưu màu sắc đã chọn
        console.log("Selected Color: ", window.selectedColor); // Kiểm tra trong console
    });

    // Cập nhật URL của nút "Thêm vào giỏ hàng"
    $(".button.add-to-cart").on("click", function() {
        // Lấy tên sản phẩm từ data-name
        var productName = $(this).data("name");
        
        // Kiểm tra xem size và color đã được chọn chưa
        if (window.selectedSize && window.selectedColor) {
            // Cập nhật URL
            var addCartUrl = "index.php?action=addCartProduct&name=" + encodeURIComponent(productName) + 
                             "&size=" + encodeURIComponent(window.selectedSize) + 
                             "&color=" + encodeURIComponent(window.selectedColor);
            console.log("Redirect URL: ", addCartUrl); // Kiểm tra URL
            window.location.href = addCartUrl; // Điều hướng đến giỏ hàng
        } else {
            alert("Vui lòng chọn kích thước và màu sắc.");
        }
    });
});










    showSlide(slideIndex);
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
