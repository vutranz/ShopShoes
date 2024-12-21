<?php
/* Smarty version 5.4.1, created on 2024-12-19 17:33:32
  from 'file:templates/admin/duyetdonhang/duyetdonhang.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67644adcdd5247_69333471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd747704b40331fede5c0477e34cfec11ac852c85' => 
    array (
      0 => 'templates/admin/duyetdonhang/duyetdonhang.html',
      1 => 1734626009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67644adcdd5247_69333471 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\duyetdonhang';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản Lý Đơn Hàng</title>
    <link rel="stylesheet" href="http://localhost/ShopShoes/templates/admin/duyetdonhang/duyetdonhang.css">
    <style>
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
    <section class="order-info">
        <div style ="margin-right: 1000px;" class="center-link">
                <a href="index.php?action=dashboard" class="back-button">Quay lại</a>
                
            </div>
        <div class="container">
            
            <h2 style="color: black;" class="page-title">Quản Lý Đơn Hàng</h2>
        
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('orderDetails'), 'user');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('user')->value) {
$foreach0DoElse = false;
?>
            <!-- Đơn hàng của Người dùng A -->
            <div class="user-order">
                <h3 class="user-name"><?php echo $_smarty_tpl->getValue('user')['name'];?>
</h3>
                <div class="user-info">
                    <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('user')['email'];?>
</p>
                    <p><strong>Số điện thoại:</strong> <?php echo $_smarty_tpl->getValue('user')['phone'];?>
</p>
                </div>

                <!-- Các sản phẩm của Người dùng A -->
                <div class="order-details">
                    <h4 class="section-title">Sản phẩm đã mua</h4>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('user')['orders'], 'order');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('order')->value) {
$foreach1DoElse = false;
?>
                        <!-- Đơn hàng 1 -->
                        <div class="order-item">
                            <div class="order-item-inner">
                                <div class="product-img">
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('order')['product_images'], 'image');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach2DoElse = false;
?>
                                        <img src="uploads/<?php echo $_smarty_tpl->getValue('image')->getUrl();?>
" alt="Ảnh sản phẩm" />
                                        <?php break 1;?> <!-- Dừng vòng lặp ngay sau khi lấy hình đầu tiên -->
                                     <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                
                                </div>
                                <div class="product-info">
                                    <!-- <p><strong>id:</strong> <?php echo $_smarty_tpl->getValue('order')['order_id'];?>
</p> -->
                                    <p><strong>Tên sản phẩm:</strong> <?php echo $_smarty_tpl->getValue('order')['product_name'];?>
</p>
                                    <p><strong>Số lượng:</strong> <?php echo $_smarty_tpl->getValue('order')['quantity'];?>
</p>
                                    <p><strong>Tồn kho</strong> <?php echo $_smarty_tpl->getValue('order')['stock'];?>
</p>
                                    <p><strong>Giá:</strong> <?php echo $_smarty_tpl->getValue('order')['price'];?>
</p>
                                    <p><strong>Màu:</strong> <?php echo $_smarty_tpl->getValue('order')['color'];?>
</p>
                                    <p><strong>Kích cỡ:</strong> <?php echo $_smarty_tpl->getValue('order')['size'];?>
</p>
                                </div>
                                <div class="product-status"  data-order-id="<?php echo $_smarty_tpl->getValue('order')['order_id'];?>
" data-status="<?php echo $_smarty_tpl->getValue('order')['status'];?>
">
                                    <span class="status">Đang xử lý</span>
                                    <label class="switch">
                                        <input type="checkbox" class="order-status-toggle">
                                        <span class="slider round"></span>
                                    </label>
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

        <div id="status-update-result"></div>

    </section>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

document.addEventListener("DOMContentLoaded", function() {
    // Lặp qua tất cả các phần tử có class 'product-status'
    document.querySelectorAll('.product-status').forEach(function(statusElement) {
        // Lấy giá trị của status từ thuộc tính 'data-status'
        var status = statusElement.getAttribute('data-status');
        
        // Lấy checkbox trong phần tử
        var checkbox = statusElement.querySelector('.order-status-toggle');
        
        // Lấy phần tử span chứa trạng thái
        var statusSpan = statusElement.querySelector('.status');

        // Cập nhật tên trạng thái và trạng thái checkbox
        if (status === 'Đã duyệt') {
            checkbox.checked = true;
            statusSpan.textContent = 'Đã duyệt';  // Cập nhật tên trạng thái
            checkbox.disabled = true;  // Vô hiệu hóa checkbox để không thể thay đổi
        } else {
            checkbox.checked = false;
            statusSpan.textContent = 'Đang xử lý';  // Cập nhật tên trạng thái
            checkbox.disabled = false;  // Bật lại checkbox để có thể thay đổi
        }

        // Lắng nghe sự kiện thay đổi checkbox
        checkbox.addEventListener('change', function() {
            if (checkbox.checked && status !== 'Đã duyệt') {
                // Gửi AJAX để thay đổi trạng thái
                var orderId = statusElement.getAttribute('data-order-id');
                var newStatus = checkbox.checked ? 'Đã duyệt' : 'Đang xử lý';

                $.ajax({
                    url: 'index.php?action=duyetdonhang',  // Địa chỉ PHP xử lý phía server
                    type: 'POST',
                    data: {
                        order_id: orderId,
                        status: newStatus
                    },
                    success: function(response) {
                        console.log("Cập nhật trạng thái thành công: " + newStatus);
                        statusSpan.textContent = newStatus;  // Cập nhật trạng thái hiển thị
                    },
                    error: function(xhr, status, error) {
                        console.log('Có lỗi xảy ra: ' + error);
                        alert('Cập nhật trạng thái thất bại!');
                    }
                });
            } else {
                // Nếu người dùng không thể thay đổi checkbox, gán lại trạng thái cũ
                checkbox.checked = true;
                alert('Không thể tắt trạng thái "Đã duyệt".');
            }
        });
    });
});




            $(document).ready(function() {
            // Lắng nghe sự kiện thay đổi trạng thái checkbox
            $('.order-status-toggle').change(function() {
                // Lấy div cha chứa thông tin đơn hàng
                var $productStatusDiv = $(this).closest('.product-status');
                
                // Lấy ID đơn hàng từ thuộc tính data-order-id
                var orderId = $productStatusDiv.data('order-id');
                
                // Kiểm tra trạng thái checkbox: nếu tick, status là 'Đã duyệt', nếu không, status là 'Đang xử lý'
                var newStatus = $(this).prop('checked') ? 'Đã duyệt' : 'đang đợi duyệt';

                console.log('Order ID:', orderId);    // In ra order_id
                console.log('New Status:', newStatus); // In ra trạng thái mới của đơn hàng

                // Gửi yêu cầu AJAX
                $.ajax({
                    url: 'index.php?action=duyetdonhang',
                    type: 'POST',
                    data: {
                        order_id: orderId,
                        status: newStatus
                    },
                    success: function(response) {
                        console.log(response);  // In ra toàn bộ phản hồi từ server để kiểm tra
                        // Cập nhật giao diện
                        $productStatusDiv.find('.status').text(newStatus);
                        
                        alert("Đơn hàng đã được cập nhật!");
                    },
                    error: function(xhr, status, error) {
                        console.log('Có lỗi xảy ra: ' + error);
                        alert('Cập nhật trạng thái đơn hàng thất bại!');
                    }
                });

            });
        });


    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
