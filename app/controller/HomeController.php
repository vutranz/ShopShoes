<?php
namespace app\controller;

require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product\ProductService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Category\CategoryService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageService.php';

use config\SmartyConfig;
use app\service\Product\ProductService;
use app\service\Category\CategoryService;
use app\service\Product_image\Product_imageService;

class HomeController{
    private $smarty;
    private $productService;
    private $categoryService;
    private $product_imageService;


    public function __construct() {
        $this->smarty = SmartyConfig::getSmarty();
        $this->productService = new ProductService();
        $this->categoryService = new CategoryService();  
        $this->product_imageService = new Product_imageService();
    }
   
    
}
?>