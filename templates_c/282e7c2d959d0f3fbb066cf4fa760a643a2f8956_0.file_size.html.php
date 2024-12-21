<?php
/* Smarty version 5.4.1, created on 2024-12-21 01:53:53
  from 'file:templates\admin\size\size.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_676611a1033983_89190028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '282e7c2d959d0f3fbb066cf4fa760a643a2f8956' => 
    array (
      0 => 'templates\\admin\\size\\size.html',
      1 => 1734508456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_676611a1033983_89190028 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp\\htdocs\\ShopShoes\\templates\\admin\\size';
?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Thêm link font-awesome cho icons -->
    <style>
        .pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.pagination a {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s;
}

.pagination a:hover {
    background-color: #4CAF50;
    color: white;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
    pointer-events: none;
}

        /* Container cho phần tìm kiếm và lọc */
.search-and-filter {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-left: 350px;
    gap: 15px;
    margin-bottom: 20px;
}

/* Ô tìm kiếm */
.search-box {
    display: flex;
    align-items: center;
    gap: 10px;
}

.search-box input {
    padding: 8px 12px;
    font-size: 14px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: border 0.3s ease;
}

.search-box input:focus {
    border-color: #4CAF50;
    outline: none;
}

.search-box button {
    padding: 8px 12px;
    font-size: 14px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-box button:hover {
    background-color: #45a049;
}

/* Bộ lọc sản phẩm */
.filters {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.filters select {
    padding: 8px 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f8f8;
    cursor: pointer;
    transition: border 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.filters select:hover {
    border-color: #4CAF50;
}

.filters select:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Hiệu ứng hover cho tất cả các input/select */
.filters select:focus, .search-box input:focus {
    box-shadow: 0 0 10px rgba(72, 174, 63, 0.5);
}

        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: auto;
    padding-top: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    white-space: nowrap; /* Ngăn chặn xuống hàng */
}

table th {
    background-color: #f2f2f2;
}

.actions i {
    font-size: 20px;
    cursor: pointer;
    margin-right: 10px;
    transition: all 0.3s ease; /* Thêm hiệu ứng chuyển động */
}

.actions i:hover {
    color: #007bff; /* Màu xanh khi hover */
    transform: scale(1.2); /* Tăng kích thước biểu tượng khi hover */
}

/* Hiệu ứng cho các nút "Thêm sản phẩm" */
.add-product {
    margin-bottom: 20px;
    text-align: right;
}

.add-product a {
    text-decoration: none;
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Thêm hiệu ứng */
}

.add-product a:hover {
    background-color: #218838;
    transform: scale(1.1); /* Tăng kích thước khi hover */
}

/* Hiệu ứng cho các biểu tượng */
.actions i {
    font-size: 20px;
    cursor: pointer;
    margin-right: 10px;
    transition: all 0.3s ease; /* Thêm hiệu ứng chuyển động */
}

.actions i:hover {
    color: #007bff; /* Màu xanh khi hover */
    transform: scale(1.2); /* Tăng kích thước biểu tượng khi hover */
}


    </style>
</head>
<body>

<div class="container">
    <h1 style="padding-left: 150px;">Danh mục kích cỡ</h1>

    <!-- Mục thêm sản phẩm -->
    <div class="add-product">
        <a href="">Thêm danh mục<i class="fas fa-plus-circle"></i></a>
        <a style="background-color: red;" href="index.php?action=dashboard">Quay lại </a>
    </div>
    <div class="search-and-filter" >
        <!-- Ô tìm kiếm -->
        <div class="search-box" style="padding-left: 200px;">
            <input type="text" name="search" placeholder="Tìm kiếm danh mục..." value="">
            <button type="submit">Tìm kiếm</button>
        </div>
    
        <!-- Bộ lọc sản phẩm -->
        <div class="filters">

            <select name="category" id="category">
                <option value="">Xem trạng thái</option>
                <option value="0">Chế độ tắt</option>
                <option value="1">Hoạt động</option>
            </select>

            
            
        </div>
    </div>
    

    <!-- Bảng danh sách sản phẩm -->
    <table>
        <thead>
            <tr>
                <th>Kích cỡ</th>
                <!-- <th>Ngày Tạo</th> -->
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu sản phẩm -->
            
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('sizes'), 'sizes');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('sizes')->value) {
$foreach0DoElse = false;
?>
                <tr>
    
                    <td><?php echo $_smarty_tpl->getValue('sizes')->getSizeName();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('sizes')->getIsActive();?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->getValue('sizes')->getIsActive() == 1) {?>
                        <a href="#" style="display: inline-block; width: 100px; height: 40px; background-color: green; color: white; text-align: center; line-height: 40px; border-radius: 5px; text-decoration: none; margin-right: 10px;">Hoạt động</a>
                        <?php } else { ?>
                        <a href="#" style="display: inline-block; width: 100px; height: 40px; background-color: red; color: white; text-align: center; line-height: 40px; border-radius: 5px; text-decoration: none;">Đã tắt</a>
                        <?php }?>
                    </td>
                    
                    <td class="actions">
                        <a href=""><i class="fas fa-edit"></i></a>
                        <a href="" onclick="return confirmDelete();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

        
            <!-- Thêm sản phẩm vào đây -->
        </tbody>
    </table>
</div>
 <!-- Phân trang -->
 <div class="pagination">
    <?php if ($_smarty_tpl->getValue('currentPage') > 1) {?>
        <a href="index.php?action=listproduct&page=<?php echo $_smarty_tpl->getValue('currentPage')-1;?>
" class="prev">Trước</a>
    <?php }?>

    <?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
        <a href="index.php?action=listproduct&page=<?php echo $_smarty_tpl->getValue('i');?>
" 
        class="page-link <?php if ($_smarty_tpl->getValue('i') == $_smarty_tpl->getValue('currentPage')) {?> active <?php }?>">
        <?php echo $_smarty_tpl->getValue('i');?>

        </a>
    <?php }
}
?>

    <?php if ($_smarty_tpl->getValue('currentPage') < $_smarty_tpl->getValue('totalPages')) {?>
        <a href="index.php?action=listproduct&page=<?php echo $_smarty_tpl->getValue('currentPage')+1;?>
" class="next">Tiếp</a>
    <?php }?>
</div>
<?php echo '<script'; ?>
>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
    }
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
