<?php
namespace app\controller;

require_once 'E:\xampp\htdocs\ShopShoes\app\service\CartItem\CartItemService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Cart.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\User\UserService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\Cart.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Cart\CartService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product\ProductService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Color\ColorService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\model\CartItem.php';
require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageService.php';



use app\service\CartItem\CartItemService;
use app\model\Cart;
use app\service\User\UserService;
use app\service\Cart\CartService;
use app\service\Product\ProductService;
use app\service\Color\ColorService;
use app\service\Size\SizeService;
use app\model\CartItem;
use config\SmartyConfig;
use app\service\Product_image\Product_imageService;

class CartController {
    private $smarty;
    private $cartItemService;
    private $userService;
    private $cartService;
    private $productService;
    private $colorService;
    private $sizeService;
    private $product_imageService;
    
    public function __construct(){
        $this->smarty = SmartyConfig::getSmarty();  // Get Smarty instance from SmartyConfig.php
        $this->cartItemService = new CartItemService();
        $this->cartService = new CartService(); 
        $this->userService = new UserService();
        $this->productService = new ProductService();
        $this->colorService = new ColorService();
        $this->sizeService = new SizeService();
        $this->product_imageService = new Product_imageService();
    }

    public function addCartController()
    {
      
       if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {

            $idUser = $_SESSION['user_id'];
            $name = $_GET['name'];
            $size = $_GET['size'];   
            $color = $_GET['color'];
            

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $create_at = date('Y-m-d H:i:s');

            $userObj = $this->userService->getUserById($idUser);
            $cartObj = new Cart(null,$userObj,$create_at,1);
          

            $sizeid = $this->sizeService-> getIdByNameSize($size);
            $colorid = $this->colorService->getIdByNameColor($color);
            
            $product = $this->productService->getProductByNameColorSize($name,$sizeid,$colorid);
           
            if ($product) {
                $cart = $this->cartService->addCart($cartObj);
                $cart_id = $this->cartService->getLastInsertedId(); 
                $cart_info = $this->cartService->getCartById($cart_id);
                $cartitem = new CartItem(null,$cart_info, $product);

                $this->cartItemService->addCartItem($cartitem);

                header("Location: index.php?action=showcart");
                exit();
            } else {
               
                echo "lỗi";
            }
       }
       else{
        echo "<div class='error-message'>Bạn chưa đăng nhập. Bạn có muốn <a href='index.php?action=FormLogin'>đăng nhập</a> để thêm giỏ hàng không?</div>";
            echo "<br><a href='javascript:history.back()' class='back-button'>Quay lại trang trước</a>";
            exit(); 
       }
       
    }

    public function showCartController()
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $idUser = $_SESSION['user_id'];

            $cartItems = $this->cartItemService->getCartItemsbyUser($idUser);

            if ($cartItems) {
                $products = [];
                $quantities = [];  
                $totalPrices = [];  
                $totalCart = 0;  

                foreach ($cartItems as $cartItem) {
                    $product = $this->productService->getProductById($cartItem['product_id']);
                    if ($product) {
                        $productId = $product->getId();

                        if (isset($quantities[$productId])) {
                            $quantities[$productId]++;
                        } else {
                            $quantities[$productId] = 1;
                            $products[] = $product;  
                        }

                        $totalPrices[$productId] = $quantities[$productId] * $product->getPrice();

                        $totalCart += $totalPrices[$productId];
                    }
                }

                $product_images = [];
                foreach ($products as $product) {
                    $product_images[$product->getId()] = $this->product_imageService->getImagesByProductId($product->getId());
                }

                $this->smarty->assign('quantities', $quantities); 
                $this->smarty->assign('totalPrices', $totalPrices); 
                $this->smarty->assign('totalCart', $totalCart); 
                $this->smarty->assign('product_images', $product_images);
                $this->smarty->assign('products', $products);
                $this->smarty->display('templates/user/cart/cart.html');
            } else {
                $this->smarty->display('templates/user/cart/cart.html');
            }
            } else {
                echo "<div class='error-message'>Bạn chưa đăng nhập. Bạn có muốn <a href='index.php?action=FormLogin'>đăng nhập</a> để xem giỏ hàng không?</div>";
                echo "<br><a href='javascript:history.back()' class='back-button'>Quay lại trang trước</a>";
                exit();
        }
    }

    public function deleteCartItemController()
    {
        $id = $_GET['id'];
        $this->cartItemService->removeCartItem($id);
        header("Location: index.php?action=showcart");
        exit();
    }

    public function buyCartItemController()
    {
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
            $idUser = $_SESSION['user_id'];
    
            $name = $_GET['name'] ?? 'Sản phẩm A';
            $size = $_GET['size'] ?? '37';
            $color = $_GET['color'] ?? 'Đỏ';
            $quantity = $_GET['quantity'] ?? 0;
    
            $userObj = $this->userService->getUserById($idUser);
    
            $sizeid = $this->sizeService->getIdByNameSize($size);
            $colorid = $this->colorService->getIdByNameColor($color);
    
            $product = $this->productService->getProductByNameColorSize($name, $sizeid, $colorid);
            
            $price = $product->getPrice()*$quantity;
            if ($product) {
                $product_images = [];
                
                $product_images[$product->getId()] = $this->product_imageService->getImagesByProductId($product->getId());
    
                $this->smarty->assign('userObj', $userObj);
                $this->smarty->assign('product', $product);
                $this->smarty->assign('product_images', $product_images);
                $this->smarty->assign('quantity', $quantity); 
                $this->smarty->assign('price', $price);
                $this->smarty->display('templates/user/cart/order.html');
            } else {
                echo "<div class='error-message'>Không tìm thấy sản phẩm phù hợp.</div>";
                exit();
            }
        } else {
            echo "<div class='error-message'>Bạn chưa đăng nhập. Bạn có muốn <a href='index.php?action=FormLogin'>đăng nhập</a> để tiếp tục?</div>";
            exit();
        }
    }
    


    public function buySelectedProductsController()
    {
        echo "hello";
    }
    


}
?>