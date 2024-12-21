<?php
namespace app\controller;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'config/SmartyConfig.php';
require_once BASE_PATH . 'app/service/Product/ProductService.php';
require_once BASE_PATH . 'app/model/Product.php';
require_once BASE_PATH . 'app/service/Category/CategoryService.php';
require_once BASE_PATH . 'app/service/Color/ColorService.php';
require_once BASE_PATH . 'app/service/Size/SizeService.php';
require_once BASE_PATH . 'app/service/Product_image/Product_imageService.php';
require_once BASE_PATH . 'app/service/Order/OrderService.php';
require_once BASE_PATH . 'app/service/User/UserService.php';
require_once BASE_PATH . 'app/model/Order.php';
require_once BASE_PATH . 'app/model/OrderItem.php';
require_once BASE_PATH . 'app/service/OrderItem/OrderItemService.php';
require_once BASE_PATH . 'app/service/CartItem/CartItemService.php';



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
        $status = "đang đợi duyệt";
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
            header("Location: index.php?action=historyorder");
            exit;
        }
        else{
            echo "Đặt hàng thất bại!";
        }
    }

    public function showHistoryController() {
        $idUser = $_SESSION['user_id'];
    
        $orderItems = $this->orderItemService->getAllOrderByIdUser($idUser);
    
        $orderGroupedByDate = [];
        $productImages = []; 
    
        foreach ($orderItems as $item) {
            $product_id = $item['product_id'];
            $product = $this->productService->getProductById($product_id);
    
            $order_date = date("d/m/Y", strtotime($item['order_date']));
            $orderGroupedByDate[$order_date][] = [
                'product' => $product,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total_money' => $item['total_money'],
                'status' => $item['status']
            ];
    
            if (!isset($productImages[$product_id])) {
                $images = $this->product_imageService->getImagesByProductId($product_id);
                $productImages[$product_id] = $images ?: []; 
            }
        }
    
        $this->smarty->assign('orderGroupedByDate', $orderGroupedByDate);
        $this->smarty->assign('productImages', $productImages);
        $this->smarty->display('templates/user/history/history.html');
    }
    

public function showListDonHangController()
{
    $orders = $this->orderService->getAllOrders(); 
    $orderDetails = [];

    foreach ($orders as $order) {
        $userId = $order->getUserId()->getId();  
        $userName = $order->getUserId()->getFullName();  
        $userEmail = $order->getUserId()->getEmail();  
        $userPhone = $order->getUserId()->getPhoneNumber();  

        if (!isset($orderDetails[$userId])) {
            $orderDetails[$userId] = [
                'name' => $userName,
                'email' => $userEmail,
                'phone' => $userPhone,
                'orders' => [],
            ];
        }

        $orderItems = $this->orderItemService->getItemsByOrderId($order->getId());

        foreach ($orderItems as $orderItem) {
            $productId = $orderItem->getProductId()->getId();
            $productName = $orderItem->getProductId()->getName();
            $quantity = $orderItem->getQuantity();
            $price = $orderItem->getPrice();
            $color = $orderItem->getProductId()->getColorId()->getColorName();
            $size = $orderItem->getProductId()->getSizeId()->getSizeName();
            $status = $orderItem->getOrderId()->getStatus();
            $stock = $orderItem->getProductId()->getStock();

            $productImages = $this->product_imageService->getImagesByProductId($productId);

            $orderDetails[$userId]['orders'][] = [
                'order_id' => $order->getId(),
                'product_id' => $productId,
                'product_name' => $productName,
                'quantity' => $quantity,
                'price' => $price,
                'color' =>$color,
                'size' =>$size,
                'status' => $status,
                'stock' => $stock,
                'product_images' => $productImages,
            ];
        }
    }

    $this->smarty->assign('orderDetails', $orderDetails);
    $this->smarty->display('templates/admin/duyetdonhang/duyetdonhang.html');
}


 public function DuyetDonHangController(){
    if (isset($_POST['order_id']) && isset($_POST['status'])) {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        $this->orderService->updateStatusOrder($order_id, $status);
        $this->orderService->updateProductStock($order_id);
    
    }
}



    public function showDoanhThuController()
    {
        $this->smarty->display('templates/admin/quanlydoanhthu/doanhthu.html');
        
    }


    public function searchDoanhThuController()
    {
        $status = isset($_POST['status']) ? $_POST['status'] : 'all';  
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : ''; 
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';  
    
        $orders = $this->orderItemService->searchDoanhThu($status, $start_date, $end_date);
        
        // echo "<prev>";
        // print_r($orders);
        // echo "</prev>";
        // // Gán các giá trị vào Smarty
        // $this->smarty->assign('status', $status);
        // $this->smarty->assign('start_date', $start_date);
        // $this->smarty->assign('end_date', $end_date);
        $this->smarty->assign('orders', $orders);
        $this->smarty->display('templates/admin/quanlydoanhthu/doanhthu.html');
    }
    
    
    public function exportExcelController() 
{
    if (isset($_POST['export'])) {
        // Lấy dữ liệu đơn hàng đã duyệt
        $orders = $this->orderItemService->searchDoanhThu('Đã duyệt', '', '');

        // Khởi tạo biến tổng tiền
        $totalAmount = 0;

        // Bắt đầu xây dựng bảng HTML để xuất Excel
        $html = '<table border="1">';
        $html .= '<tr><th>Mã Đơn Hàng</th><th>Trạng Thái</th><th>Ngày Đặt Hàng</th><th>Tên Sản Phẩm</th><th>Màu Sắc</th><th>Kích Cỡ</th><th>Số Lượng</th><th>Giá</th><th>Tổng Tiền</th></tr>';

        // Lặp qua từng đơn hàng để thêm thông tin vào bảng
        foreach ($orders as $order) {
            $html .= '<tr>';
            $html .= '<td>' . $order['order_id'] . '</td>';
            $html .= '<td>' . $order['status'] . '</td>';
            $html .= '<td>' . $order['order_date'] . '</td>';
            $html .= '<td>' . $order['product_name'] . '</td>';
            $html .= '<td>' . $order['product_color'] . '</td>';
            $html .= '<td>' . $order['product_size'] . '</td>';
            $html .= '<td>' . $order['quantity'] . '</td>';
            $html .= '<td>' . number_format($order['price'], 0, ',', '.') . ' VND</td>';
            $html .= '<td>' . number_format($order['total_price'], 0, ',', '.') . ' VND</td>';
            $html .= '</tr>';

            // Cộng tổng tiền của đơn hàng vào tổng
            if (isset($order['total_price']) && is_numeric($order['total_price'])) {
                $totalAmount += $order['total_price'];
            }
        }

        // Thêm dòng tổng tiền của tất cả đơn hàng
        $html .= '<tr>';
        $html .= '<td colspan="8" style="text-align: right;"><strong>Tổng Tiền:</strong></td>';
        $html .= '<td><strong>' . number_format($totalAmount, 0, ',', '.') . ' VND</strong></td>';
        $html .= '</tr>';
        
        $html .= '</table>';

        // Xuất file Excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Danh_Sach_Don_Hang.xls"');
        header('Cache-Control: max-age=0');

        echo $html;
        exit;
    }
}


    

    

  
}
?>