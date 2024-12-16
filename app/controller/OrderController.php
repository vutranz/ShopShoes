<?php
namespace app\controller;

require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/service/Product/ProductService.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/model/Product.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Category\CategoryService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Color\ColorService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Order\OrderService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\User\UserService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Order.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\OrderItem.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\OrderItem\OrderItemService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\CartItem\CartItemService.php';

use config\SmartyConfig;
use app\service\Product\ProductService;
use app\model\Product;
use app\service\Category\CategoryService;
use app\service\Color\ColorService;
use app\service\Size\SizeService;
use app\service\Product_image\Product_imageService;
use app\service\Order\OrderService;
use app\service\User\UserService;
use app\model\Order;
use app\model\OrderItem;
use app\service\OrderItem\OrderItemService;
use app\service\CartItem\CartItemService;

class OrderController{
    private $smarty;
    private $productService;
    private $categoryService;
    private $colorService;
    private $sizeService;
    public $product_imageService;
    private $orderService;
    private $userService;
    private $orderItemService;
    private $cartItemService;

    public function __construct() {
        $this->smarty = SmartyConfig::getSmarty();
        $this->productService = new ProductService();
        $this->categoryService = new CategoryService(); 
        $this->colorService = new ColorService(); 
        $this->sizeService = new SizeService(); 
        $this->product_imageService = new Product_imageService();
        $this->orderService = new OrderService();
        $this->userService = new UserService();
        $this->orderItemService = new OrderItemService();
        $this->cartItemService = new CartItemService();
    }

    public function orderController(){
        
        $idUser = $_SESSION['user_id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phone_number'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $product_id = $_POST['product_id'];

        $userObj = $this->userService->getUserById($idUser);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_date = date('Y-m-d H:i:s');
        $create_at = date('Y-m-d H:i:s');
        $update_at = date('Y-m-d H:i:s');
        $status = "đang đợi duyệt đơn hàng";
        $total_money = $quantity*$price;
        $is_active = '1';

        $orderObj = new Order(null,$userObj,$fullname,$email,$phonenumber,$address,
        $note,$order_date,$status,$total_money,$order_date,$create_at,$update_at,$is_active); 


        if($orderObj)
        {
            $order = $this->orderService->createOrder($orderObj);
            $order_id = $this->orderService->getLastInsertedId();
            $order_info = $this->orderService->getOrderById($order_id);
            $product_info = $this->productService->getProductById($product_id);
            $oder_item_obj = new OrderItem(null,$order_info,$product_info,$quantity,$price,$total_money,$is_active);
            $this->orderItemService->addOrderItem($oder_item_obj);
            $this->cartItemService->removeCartItem($product_id);
            echo "Đặt hàng thành công!";
        }
        else{
            echo "Đặt hàng thất bại!";
        }
        // echo "<pre>";
        // print_r($orderObj);
        // echo "</pre>";
    }
}
?>