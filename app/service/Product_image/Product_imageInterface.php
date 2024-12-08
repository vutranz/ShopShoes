<?php
namespace app\service\Product_image;

interface Product_imageInterface{
    
    public function addProductImage($product_id, $url);
    public function deleteImagesByProductId($productId);
    // public function getAllProductImages();
    // public function deleteProductImage($productId, $image);
    // public function getProductImagesByProductId($productId);
    // public function updateProductImage($productId, $image, $newImage);
    // public function getProductImage($productId, $image);
    // public function checkImageExists($productId, $image);
    // public function deleteAllProductImages($productId);
}
?>