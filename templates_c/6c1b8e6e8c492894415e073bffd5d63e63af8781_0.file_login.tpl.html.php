<?php
/* Smarty version 5.4.1, created on 2024-12-12 09:46:13
  from 'file:./login/login.tpl.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_675aa2d5f08ca8_35554148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c1b8e6e8c492894415e073bffd5d63e63af8781' => 
    array (
      0 => './login/login.tpl.html',
      1 => 1733993136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_675aa2d5f08ca8_35554148 (\Smarty\Template $_smarty_tpl) {
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
        <h2 id="form-title">Đăng Nhập</h2>

        <!-- Thông báo lỗi nếu có -->
            <?php if ($_smarty_tpl->getValue('error_message')) {?>
                <div id="error-message"><?php echo $_smarty_tpl->getValue('error_message');?>
</div>
            <?php }?>
        <!-- Form đăng nhập --> 
        <div class="form-container active" id="login-form">
            <form method="POST" action="index.php?action=login">
                <input type="text" name="email" id="email" placeholder="Email Đăng Nhập"  required>
                <input type="password" name="password" id="password" placeholder="Mật Khẩu"  required>
                <button type="submit">Đăng Nhập</button>
            </form>
        </div>


        <!-- Nút chuyển giữa Đăng Nhập và Đăng Ký -->
        <div class="toggle-btn" id="toggle-btn">
            Chưa có tài khoản? <a style="color: #fff;text-decoration: none;" href="index.php?action=FormRegister">Đăng ký ngay</a>
        </div>
    </div>


</body>
</html>
<?php }
}
