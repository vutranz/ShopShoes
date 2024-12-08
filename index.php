<?php

// Đảm bảo đường dẫn đúng
require_once './vendor/smarty/smarty/libs/Smarty.class.php';
require_once './config/Router.php';
require_once './app/controller/CategoryController.php';   
require_once './app/controller/HomeController.php';   
require_once './app/controller/UserController.php';   
require_once './app/controller/ProductController.php';  
require_once './app/controller/ColorController.php';  
require_once './app/controller/SizeController.php';  

use Smarty\Smarty;
use config\Router;
use app\controller\CategoryController;
use app\controller\HomeController;
use app\controller\UserController;
use app\controller\ProductController;
use app\controller\ColorController;
use app\controller\SizeController;

// Tạo đối tượng Router và controller
$router = new Router();
$categoryController = new CategoryController();
$homeController = new HomeController();
$userController = new UserController();
$productController = new ProductController();
$colorController = new ColorController();
$sizeController = new SizeController();

// Đăng ký các route cho các controller
$router->addRoute('showcategorybyid', [$categoryController, 'getCategoryByIdController']);
$router->addRoute('listcategory', [$categoryController, 'getAllCategoryController']);

// Route cho User
$router->addRoute('FormRegister', [$userController, 'showFormRegister']);
$router->addRoute('FormLogin', [$userController, 'showFormLogin']);
$router->addRoute('register', [$userController, 'registerController']);
$router->addRoute('login', [$userController, 'loginController']);
$router->addRoute('logout', [$userController, 'logoutController']);

// Admin Routes
$router->addRoute('dashboard', [$userController, 'showDasboard']);

// Routes cho sản phẩm
$router->addRoute('listproduct', [$productController, 'getAllProductController']);
$router->addRoute('getProductById', [$productController, 'getProductByIdController']);
$router->addRoute('addProduct', [$productController, 'addProductController']);
$router->addRoute('deleteProduct', [$productController, 'deleteProductController']);
$router->addRoute('formAddProduct', [$productController, 'showFormAddProductController']);
$router->addRoute('updateProduct', [$productController, 'updateProductController']);
$router->addRoute('formupdateproduct', [$productController, 'showFormUpdateProductController']);
$router->addRoute('countproduct', [$productController, 'showCountProductController']);

// Routes cho màu sắc và kích thước
$router->addRoute('getColorByid', [$colorController, 'getColorByIdController']);
$router->addRoute('getSizeByid', [$sizeController, 'getSizeByIdController']);

// Route cho trang chủ
$router->addRoute('index', [$userController, 'showindex']);

// Route mặc định (index)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$router->route($action);

?>
