<?php
namespace app\service\Product;

require_once 'E:/xampp/htdocs/ShopShoes/app/model/Product.php';

use app\model\Product;

interface ProductInterface{
    public function getAllProduct();
    public function addProduct(Product $product);
    public function updateProduct($id, Product $product);
    public function deleteProduct($id);
    public function getProductById($id);
    public function getAllproductsForUser();
    public function getCountProducts();
}
?>