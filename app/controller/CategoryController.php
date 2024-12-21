<?php
namespace app\controller;

require_once 'config/PathConfig.php';

require_once BASE_PATH . 'config/SmartyConfig.php';
require_once BASE_PATH . 'app/service/Category/CategoryService.php';
require_once BASE_PATH . 'app/model/Category.php';

use app\service\Category\CategoryService;
use config\SmartyConfig;
use app\model\Category;

class CategoryController{
    private $smarty;
    private $categoryService;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->smarty = SmartyConfig::getSmarty();
        $this->categoryService = new CategoryService();
    }

    public function getAllCategoryController() {
        $categorys = $this->categoryService->getAllCategory();
        
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates\admin\category\listcategory.tpl.html');
    }
    public function getCategoryByIdController() {
        $category = $this->categoryService->getCategoryById();
        echo '<pre>';
        print_r($category);
        echo '</pre>';
    }
}
?>