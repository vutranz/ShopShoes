<?php

namespace app\controller;


require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/service/Product/ProductService.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/model/Product.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Category\CategoryService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Color\ColorService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Product_image\Product_imageService.php';

use config\SmartyConfig;
use app\service\Product\ProductService;
use app\model\Product;
use app\service\Category\CategoryService;
use app\service\Color\ColorService;
use app\service\Size\SizeService;
use app\service\Product_image\Product_imageService;

class ProductController {

    private $smarty;
    private $productService;
    private $categoryService;
    private $colorService;
    private $sizeService;
    public $product_imageService;

    public function __construct() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $this->smarty = SmartyConfig::getSmarty();
        $this->productService = new ProductService();
        $this->categoryService = new CategoryService(); 
        $this->colorService = new ColorService(); 
        $this->sizeService = new SizeService(); 
        $this->product_imageService = new Product_imageService();
    }

    public function getAllProductController() {
        
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $itemsPerPage = 6; 
    
        $allProducts = $this->productService->getAllProduct();
        $totalProducts = count($allProducts);
        $totalPages = ceil($totalProducts / $itemsPerPage);
    
       
        $offset = ($currentPage - 1) * $itemsPerPage;
        $products = array_slice($allProducts, $offset, $itemsPerPage);
    
        $color = $this->colorService->getAllColors();
        $size = $this->sizeService->getAllSizes();
        $category = $this->categoryService->getAllCategory();
    
        
    
        $product_images = [];
        foreach ($products as $product) {
            $product_images[$product->getId()] = $this->product_imageService->getImagesByProductId($product->getId());
        }
        
        $this->smarty->assign('products', $products);
        $this->smarty->assign('product_images', $product_images);
        $this->smarty->assign('category', $category);
        $this->smarty->assign('color', $color);
        $this->smarty->assign('size', $size);
        $this->smarty->assign('currentPage', $currentPage);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->display('templates\admin\product\listproduct.tpl.html');
    }
    
    public function getProductByIdController() {
        $id = 1;
        $products = $this->productService->getProductById($id);
        echo '<pre>';
        print_r($products);
        echo '</pre>';
    }

    public function addProductController() {
        $name = $_POST['name']; 
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $is_active = $_POST['is_active'];
        $color_id = $_POST['color_id'];
        $size_id = $_POST['size_id'];
        $category_id = $_POST['category_id'];
    
        if (!$name || !$description || !$price || !$stock || !$color_id || !$size_id || !$category_id) {
            echo 'Vui lòng điền đầy đủ thông tin!';
            return;
        }
    
        $color = $this->colorService->getColorById($color_id);
        $size = $this->sizeService->getSizeByid($size_id);
        $category = $this->categoryService->getCategoryById($category_id);
    
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $create_at = date('Y-m-d H:i:s');
        $update_at = date('Y-m-d H:i:s');
    
        $product = new Product(
            null, 
            $name, 
            $description, 
            $price, 
            $stock, 
            $create_at, 
            $update_at, 
            $is_active, 
            $color, 
            $size, 
            $category
        );
    
        $result = $this->productService->addProduct($product);
    
        if ($result) {
           
            $productId = $this->productService->getLastInsertedId();
    
           
            if (isset($_FILES['images']) && $_FILES['images']['error'][0] == UPLOAD_ERR_OK) {
                $totalFiles = count($_FILES['images']['name']);
                $uploadDir = 'uploads/';
            
                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
            
                for ($i = 0; $i < $totalFiles; $i++) {
                    $imageName = basename($_FILES['images']['name'][$i]);
                    $imageTmpPath = $_FILES['images']['tmp_name'][$i];
            
                    // Tạo tên tệp tin mới với ID sản phẩm để tránh trùng lặp
                    $baseName = pathinfo($imageName, PATHINFO_FILENAME);
                    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
                    $uniqueName = $productId . '_' . uniqid($baseName . '_') . '.' . $extension;
            
                    $targetFile = $uploadDir . $uniqueName;
            
                    // Kiểm tra loại tệp tin hợp lệ
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (in_array($_FILES['images']['type'][$i], $allowedTypes)) {
                        // Di chuyển tệp tin tới thư mục đích
                        if (move_uploaded_file($imageTmpPath, $targetFile)) {
                            // Lưu thông tin tệp tin vào cơ sở dữ liệu hoặc dịch vụ
                            $this->product_imageService->addProductImage($productId, $uniqueName);
                        } else {
                            echo 'Lỗi khi tải lên file ' . $imageName . '!';
                        }
                    } else {
                        echo 'File ' . $imageName . ' không phải là hình ảnh hợp lệ!';
                    }
                }
            }
            
    
           
            header("Location: index.php?action=listproduct");
            exit;
        } else {
            echo 'Lỗi khi thêm sản phẩm!';
        }
    }
    
    public function updateProductController() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $stock = $_POST['stock'];
                $create_at = $_POST['create_at'];
                $is_active = $_POST['is_active'];
                $category_id = $_POST['category_id'];
                $color_id = $_POST['color_id'];
                $size_id = $_POST['size_id'];
    
                $color = $this->colorService->getColorById($color_id);
                $size = $this->sizeService->getSizeByid($size_id);
                $category = $this->categoryService->getCategoryById($category_id);
    
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $update_at = date('Y-m-d H:i:s');
    
                $product = new Product(
                    null, 
                    $name, 
                    $description, 
                    $price, 
                    $stock, 
                    $create_at, 
                    $update_at, 
                    $is_active, 
                    $color, 
                    $size, 
                    $category
                );
    
                $result = $this->productService->updateProduct($id, $product);
    
                if ($result) {
                    // Kiểm tra xem có upload hình ảnh mới hay không
                    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == UPLOAD_ERR_OK) {
                        $totalFiles = count($_FILES['images']['name']);
                        $uploadDir = 'uploads/';
    
                        // Kiểm tra và tạo thư mục nếu chưa tồn tại
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
    
                        // Xóa ảnh cũ chỉ khi có ảnh mới tải lên
                        $this->product_imageService->deleteImagesByProductId($id);
    
                        for ($i = 0; $i < $totalFiles; $i++) {
                            $imageName = basename($_FILES['images']['name'][$i]);
                            $imageTmpPath = $_FILES['images']['tmp_name'][$i];
    
                            // Tạo tên tệp tin mới để tránh trùng lặp
                            $baseName = pathinfo($imageName, PATHINFO_FILENAME);
                            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
                            $uniqueName = $id . '_' . uniqid($baseName . '_') . '.' . $extension;
    
                            $targetFile = $uploadDir . $uniqueName;
    
                            // Kiểm tra loại tệp tin hợp lệ
                            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                            if (in_array($_FILES['images']['type'][$i], $allowedTypes)) {
                                if (move_uploaded_file($imageTmpPath, $targetFile)) {
                                    // Lưu thông tin tệp tin mới vào cơ sở dữ liệu
                                    $this->product_imageService->addProductImage($id, $uniqueName);
                                } else {
                                    echo 'Lỗi khi tải lên file ' . $imageName . '!';
                                }
                            } else {
                                echo 'File ' . $imageName . ' không phải là hình ảnh hợp lệ!';
                            }
                        }
                    }
    
                    // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
                    header("Location: index.php?action=listproduct");
                    exit;
                } else {
                    echo 'Cập nhật sản phẩm thất bại!';
                }
            } else {
                echo 'ID sản phẩm không được tìm thấy!';
            }
        } else {
            echo 'Phương thức yêu cầu không hợp lệ!';
        }
    }

    public function showFormUpdateProductController(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
       
        $products = $this->productService->getProductById($id);
        $categories = $this->categoryService->getAllCategory();
        $colors = $this->colorService->getAllColors();
        $sizes = $this->sizeService->getAllSizes();

        $product_images = [];
        if ($products) {
            $product_images[$products->getId()] = $this->product_imageService->getImagesByProductId($products->getId());
        }
        
        $this->smarty->assign('product_images', $product_images);

        
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('colors', $colors);
        $this->smarty->assign('sizes', $sizes);
        $this->smarty->assign('products',$products);
        $this->smarty->display('templates\admin\product\updatesanpham.tpl.html');
    }
    
    
    public function deleteProductController() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    
        if ($id) { 
            $result = $this->productService->deleteProduct($id);
            header("Location: index.php?action=listproduct");
            exit;
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function showFormAddProductController(){
        $categories = $this->categoryService->getAllCategory();
        $colors = $this->colorService->getAllColors();
        $sizes = $this->sizeService->getAllSizes();
    
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('colors', $colors);
        $this->smarty->assign('sizes', $sizes);
    

        $this->smarty->display('templates\admin\product\themsanpham.tpl.html');
    }
    
    public function showCountProductController(){
        $totalProduct = $this->productService->getCountProducts();
        echo $totalProduct;
    }

    public function showProductDetail() {

        $id = $_GET['id'];
        $product = $this->productService->getProductById($id);
        $productDetails = $this->productService->getColorByname($product->getName());

        if ($product) {
            $product_images = $this->product_imageService->getImagesByProductId($product->getId());
            $this->smarty->assign('sizes', $productDetails['sizes']);
            $this->smarty->assign('colors', $productDetails['colors']);
            $this->smarty->assign('product', $product);
            $this->smarty->assign('product_images', $product_images);
            $this->smarty->display('templates/admin/product/productdetail.html');
        } else {
             echo "Sản phẩm không tồn tại.";
        }
       

    }


    public function buyProductController()
    {
        $id = $_GET['id'];
        
       
        if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
           
            echo "mua hàng thành công";
        } else {
            
            echo "<div class='error-message'>Bạn chưa đăng nhập. Bạn có muốn <a href='index.php?action=FormLogin'>đăng nhập</a> để mua hàng không?</div>";
            echo "<br><a href='javascript:history.back()' class='back-button'>Quay lại trang trước</a>";
            exit(); 
        }
    }


    public function getProductInfoController()
    {
        $name = $_POST['name'] ?? 'Sản phẩm A';
        $size = $_POST['size'] ?? '37';
        $color = $_POST['color'] ?? 'Đỏ';
        

        $size_id = $this->sizeService->getIdByNameSize($size);
        $color_id = $this->colorService->getIdBynamecolor($color);
    
        $product = $this->productService->getProductByNameColorSize($name, $size_id, $color_id);
    
        if ($product) {

            echo json_encode([
                'status' => 'success',
                'name' => $name,
                'price' => $product->getPrice(),
                'stock' => $product->getStock()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Không tìm thấy sản phẩm với thông tin này!'
            ]);
        }
    }
    

    
}
?>