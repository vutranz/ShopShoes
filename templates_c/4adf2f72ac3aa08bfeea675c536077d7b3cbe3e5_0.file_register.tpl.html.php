<?php
/* Smarty version 5.4.1, created on 2024-12-16 02:40:43
  from 'file:./login/register.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675f851bc44974_64003495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4adf2f72ac3aa08bfeea675c536077d7b3cbe3e5' => 
    array (
      0 => './login/register.tpl.html',
      1 => 1734273437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675f851bc44974_64003495 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\login';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập / Đăng Ký</title>
    <link rel="stylesheet" href="login/login.css">
    <link rel="stylesheet" href="./templates/login/login.css">

    <style>
        /* CSS cơ bản cho các form */
        .form-container {
            display: none; /* Ẩn các form khi chưa được chọn */
        }

        .form-container.active {
            display: block; /* Hiển thị form khi có class 'active' */
        }

        /* Thêm style cho nút chuyển form */
        .toggle-btn {
            text-align: center;
            font-size: 16px;
            color: #007bff;
            cursor: pointer;
            margin-top: 10px;
        }

        /* Thêm style cho thông báo lỗi */
        #error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <h2 id="form-title">Đăng Ký</h2>

        <?php if ($_smarty_tpl->getValue('error_message')) {?>
            <div id="error-message"><?php echo $_smarty_tpl->getValue('error_message');?>
</div>
        <?php }?>

        <!-- Form đăng ký -->
        <div class="form-container active" id="signup-form">
            <form method="POST" action="index.php?action=register">
                <input type="text" name="full_name" id="signup-full-name" placeholder="Họ và Tên" required>
                <input type="email" name="email" id="signup-email" placeholder="Email Đăng Nhập"  required>
                <input type="password" name="password" id="signup-password" placeholder="Mật Khẩu"  required>
                <input type="password" name="confirm_password" id="signup-confirm-password" placeholder="Xác Nhận Mật Khẩu"  required>
                
                <div class="gender-container" style="display: flex; justify-content: center; align-items: center; gap: 15px;">
                    <label for="gender-male" style="display: flex; align-items: center; font-size: 16px;">
                        <input type="radio" name="gender" id="gender-male" value="Nam" > Nam
                    </label>
                    <label for="gender-female" style="display: flex; align-items: center; font-size: 16px;">
                        <input type="radio" name="gender" id="gender-female" value="Nữ" > Nữ
                    </label>
                </div>

                <input type="text" name="phone_number" id="signup-phone-number" placeholder="Số Điện Thoại"  required>
                <input type="text" name="address" id="signup-address" placeholder="Địa Chỉ"  required>
                <input type="date" name="day_of_birth" id="signup-day-of-birth" placeholder="Ngày Sinh"  required>
                
                <button type="submit">Đăng Ký</button>
            </form>
        </div>

        <!-- Nút chuyển giữa Đăng Nhập và Đăng Ký -->
        <div class="toggle-btn" id="toggle-btn">
            Đã tài khoản? <a href="index.php?action=FormLogin" style="color: #fff;text-decoration: none;">Quay lại</a>
        </div>
    </div>


</body>
</html>
<?php }
}
