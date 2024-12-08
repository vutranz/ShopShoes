<?php
namespace app\service\Category;

require_once 'E:/xampp/htdocs/ShopShoes/app/model/Category.php';

interface CategoryInterface{
    public function getAllCategory();
    public function getCategoryById($id);
    // public function addCategory();
    // public function updateCategory($id, $data);
    // public function deleteCategory($id);
    
}
?>