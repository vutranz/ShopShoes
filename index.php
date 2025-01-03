<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Đảm bảo đường dẫn đúng
require_once './vendor/smarty/smarty/libs/Smarty.class.php';
require_once './config/Router.php';
require_once './app/controller/CategoryController.php';   
require_once './app/controller/HomeController.php';   
require_once './app/controller/UserController.php';   
require_once './app/controller/ProductController.php';  
require_once './app/controller/ColorController.php';  
require_once './app/controller/SizeController.php';  
require_once './app/controller/CartController.php';  
require_once './app/controller/OrderController.php';

use Smarty\Smarty;
use config\Router;
use app\controller\CategoryController;
use app\controller\HomeController;
use app\controller\UserController;
use app\controller\ProductController;
use app\controller\ColorController;
use app\controller\SizeController;
use app\controller\CartController;
use app\controller\OrderController;

// Tạo đối tượng Router và controller
$router = new Router();
$categoryController = new CategoryController();
$homeController = new HomeController();
$userController = new UserController();
$productController = new ProductController();
$colorController = new ColorController();
$sizeController = new SizeController();
$cartController = new CartController();
$orderController = new OrderController();

// Đăng ký các route cho các controller
$router->addRoute('showcategorybyid', [$categoryController, 'getCategoryByIdController']);
$router->addRoute('listcategory', [$categoryController, 'getAllCategoryController']);

// Route cho User
$router->addRoute('FormRegister', [$userController, 'showFormRegister']);
$router->addRoute('FormLogin', [$userController, 'showFormLogin']);
$router->addRoute('register', [$userController, 'registerController']);
$router->addRoute('login', [$userController, 'loginController']);
$router->addRoute('logout', [$userController, 'logoutController']);
// Thêm route mới trong Router để quay lại trang dashboard
$router->addRoute('backToDashboard', [$userController, 'backToDashboard']);
$router->addRoute('showuser', [$userController, 'showAllUserControllers']);

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
$router->addRoute('productdetail', [$productController, 'showProductDetail']);
$router->addRoute('buyProduct', [$productController, 'buyProductController']);
$router->addRoute('getProductInfo', [$productController, 'getProductInfoController']);


//router cart
$router->addRoute('addCartProduct', [$cartController, 'addCartController']);
$router->addRoute('showcart', [$cartController, 'showCartController']);
$router->addRoute('deletecart', [$cartController, 'deleteCartItemController']);
$router->addRoute('buyproductincart', [$cartController, 'buyCartItemController']);
$router->addRoute('buyallproductincart', [$cartController, 'buySelectedProductsController']);



//router cart items


//router order
$router->addRoute('placeOrder', [$orderController, 'orderController']);
$router->addRoute('historyorder', [$orderController, 'showHistoryController']);
$router->addRoute('listdonhang', [$orderController, 'showListDonHangController']);
$router->addRoute('duyetdonhang', [$orderController, 'DuyetDonHangController']);
$router->addRoute('doanhthu', [$orderController, 'showDoanhThuController']);
$router->addRoute('searchdanhthu', [$orderController, 'searchDoanhThuController']);
$router->addRoute('export_excel', [$orderController, 'exportExcelController']);




// Routes color
$router->addRoute('getColorByid', [$colorController, 'getColorByIdController']);
$router->addRoute('showcolor', [$colorController, 'showAllColorController']);

// Routes size
$router->addRoute('getSizeByid', [$sizeController, 'getSizeByIdController']);
$router->addRoute('showsize', [$sizeController, 'getAllSizeController']);

// Route cho trang chủ
$router->addRoute('index', [$userController, 'showindex']);



// Route mặc định (index)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$router->route($action);

?>
