<?php
namespace app\controller;

// require_once 'E:\xampp\htdocs\ShopShoes\app\service\CartItem\CartItemService.php';
// require_once 'E:\xampp\htdocs\ShopShoes\app\model\Cart.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\User\UserService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Cart.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Cart\CartService.php';
// use app\service\CartItem\CartItemService;
use app\model\Cart;
use app\service\User\UserService;
use app\service\Cart\CartService;

class CartController {
    // private $cartItemService;
    private $userService;
    private $cartService;
    
    public function __construct(){
        // $this->cartItemService = new CartItemService();
        $this->cartService = new CartService();  // new CartService();

        $this->userService = new UserService();
    }

    public function addCartController()
    {
      

       if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

            $idUser = $_SESSION['user_id'];
            $size = $_GET['size'];   
            $color = $_GET['color'];
            $name = $_GET['name'];

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $create_at = date('Y-m-d H:i:s');

            // $userObj = $this->userService->getUserById($idUser);
            // $cartObj = new Cart(null,$userObj,$create_at,1);
            
            // $this->cartService->addCart($cartObj);
            echo "Size đã chọn: $name<br>";
            echo "Size đã chọn: $size<br>";
            echo "Màu sắc đã chọn: $color<br>";
       }
       else{
        echo "<div class='error-message'>Bạn chưa đăng nhập. Bạn có muốn <a href='index.php?action=FormLogin'>đăng nhập</a> để thêm giỏ hàng không?</div>";
            echo "<br><a href='javascript:history.back()' class='back-button'>Quay lại trang trước</a>";
            exit(); 
       }
       
    }

      


}
?>