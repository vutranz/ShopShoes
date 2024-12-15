<?php


namespace app\controller;

session_start();
error_log("Session hiện tại: " . print_r($_SESSION, true));
require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/service/User/UserService.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/model/User.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product\ProductService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\controller\ProductController.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\controller\HomeController.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Category\CategoryService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Color\ColorService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';


use config\SmartyConfig;
use app\service\User\UserService;
use app\model\User;
use app\service\Product\ProductService;
use app\controller\ProductController;
use app\controller\UserController;
use app\service\Category\CategoryService;
use app\service\Product_image\Product_imageService;
use app\service\Color\ColorService;
use app\service\Size\SizeService;

class UserController{
    private $smarty;
    private $usersService;
    private $productService;
    private $productController;
    private $homeController;
    private $categoryService;
    private $product_imageService;
    private $colorService;
    private $sizeService;

    public function __construct() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->smarty = SmartyConfig::getSmarty();
        $this->usersService = new UserService();
        $this->productService = new ProductService();
        $this->productController = new ProductController();
        $this->homeController = new HomeController();
        $this->categoryService = new CategoryService();
        $this->product_imageService = new Product_imageService();
        $this->colorService = new ColorService();
        $this->sizeService = new SizeService();
    }


    public function registerController(){


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $gender = $_POST['gender'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $day_of_birth = $_POST['day_of_birth'];

            $error_message="";
                    
            if(empty($full_name) || empty($email) || empty($password) 
            || empty($confirm_password) || empty($gender) || empty($phone_number) 
            || empty($address) || empty($day_of_birth)){
                $error_message="không được để trống thông tin";
            }

            if($password<5)
            {
                $error_message = "Mật khẩu phải dài hơn 5 ký tự";
            }
            else if($password !== $confirm_password)
            {
                $error_message =  "Mật khẩu không trùng khớp";
            }
            else if ($this->usersService->checkEmailExists($email)) {
                $error_message = "Email đã được đăng ký. Vui lòng sử dụng email khác.";
            }

            if (empty($error_message)) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
                $id = null; 
                $create_at = date('Y-m-d H:i:s');  
                $update_at = $create_at;  
                $is_active = 1;  
                $profile_image = null; 
    
               
                $user = new User($id, $full_name, $gender, $email, $hashed_password, 
                                 $phone_number, $address, $day_of_birth, $create_at, 
                                 $update_at, $is_active, $profile_image);
    
               $user= $this->usersService->createUsers($user);
               $user = $this->usersService->getUserByEmail($email);
               if ($user) {
              
                $this->usersService->assignRoleToUser($user['id'], 2);

                header("Location: index.php?action=FormLogin");
                exit;
            }

                
            } else {
                $this->smarty->assign('error_message', $error_message);
                $this->smarty->display('./login/register.tpl.html');
            }
        }

    }

    public function loginController() {
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if (empty($email) || empty($password)) {
                $error_message = "Email và mật khẩu không được để trống.";
                $this->smarty->assign('error_message', $error_message);
                $this->smarty->display('./login/login.tpl.html');
                return; 
            }
    
            $user = $this->usersService->getUserByEmail($email);
    
            if ($user) {
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_name'] = $user->getFullName();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['is_logged_in'] = true;
    
                    $this->smarty->assign('is_logged_in',true);
                    $this->smarty->assign('user_name', $_SESSION['user_name']);
    
                 
                    $role = $this->usersService->getUserRoleByid($user->getId());

                    if ($role == 'admin') {
                        header("Location: index.php?action=dashboard");
                        exit();
                        //$this->showDasboard();
                    } else {
                        //$this->showindex();
                        header("Location: index.php?action=index");
                        exit();
                    }

                    
                } else {
                    $error_message = "Mật khẩu không chính xác.";
                    $this->smarty->assign('error_message', $error_message);
                    $this->smarty->display('./login/login.tpl.html');
                }
            } else {
                $error_message = "Email không tồn tại.";
                $this->smarty->assign('error_message', $error_message);
                $this->smarty->display('./login/login.tpl.html');
            }
        }
    }
    
    

    public function logoutController() {
        session_start();
        session_unset();  
        session_destroy();  
        header("Location: index.php?action=FormLogin"); 
        exit;
    }
    
    
    
    public function showFormRegister(){
        $this->smarty->display('./login/register.tpl.html');
    }

    public function showFormLogin(){
        $this->smarty->display('./login/login.tpl.html');
    }

    public function showDasboard() {

        
        if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
            header("Location: index.php?action=login");
            exit();
        }

        $totalProduct = $this->productService->getCountProducts(); 
        $totalUser = $this->usersService->getCountUsers();

        $this->smarty->assign('totalUser', $totalUser);
        $this->smarty->assign('totalProduct', $totalProduct);
       
        $this->smarty->assign('user_name', $_SESSION['user_name']);
        $this->smarty->assign('is_logged_in', $_SESSION['is_logged_in']);

        $this->smarty->display('dasboard.tpl.html');
    }

    
    public function showIndex() {
        $userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
        $isLoggedIn = isset($_SESSION['is_logged_in']) ? $_SESSION['is_logged_in'] : false;
    
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $itemsPerPage = 8;
    
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
        $colorFilter = isset($_GET['color']) ? $_GET['color'] : '';
        $sizeFilter = isset($_GET['size']) ? $_GET['size'] : '';
        $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : '';
    
        $products = $this->productService->searchProducts($search, $categoryFilter, $colorFilter, $sizeFilter, $sortOrder);
        
        $productCount = count($products);
        $totalPages = ceil($productCount / $itemsPerPage);
    
        $offset = ($currentPage - 1) * $itemsPerPage;
        $products = array_slice($products, $offset, $itemsPerPage);
    
        $color = $this->colorService->getAllColors();
        $size = $this->sizeService->getAllSizes();
        $category = $this->categoryService->getAllCategory();
    
        $product_images = [];
        foreach ($products as $product) {
            $product_images[$product->getId()] = $this->product_imageService->getImagesByProductId($product->getId());
        }
    
        $product_new = $this->productService->getProductsnews();
        $product_images_new = [];
        foreach ($product_new as $product) { 
            $product_images_new[$product->getId()] = $this->product_imageService->getImagesByProductId($product->getId());
        }
    
        $this->smarty->assign('user_name', $userName);
        $this->smarty->assign('is_logged_in', $isLoggedIn);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('product_images', $product_images);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('color', $color);
        $this->smarty->assign('size', $size);
        $this->smarty->assign('currentPage', $currentPage);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->assign('search', $search);
        $this->smarty->assign('categoryFilter', $categoryFilter);
        $this->smarty->assign('colorFilter', $colorFilter);
        $this->smarty->assign('sizeFilter', $sizeFilter);
        $this->smarty->assign('sortOrder', $sortOrder);
        $this->smarty->assign('product_new', $product_new);
        $this->smarty->assign('product_images_new', $product_images_new);
    
        $this->smarty->display('templates/index.tpl.html');
    }
    

    
}
?>