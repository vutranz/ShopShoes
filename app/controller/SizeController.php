<?php
namespace app\controller;
require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:\xampp\htdocs\ShopShoes\app\service\Size\SizeService.php';

use config\SmartyConfig;
use app\service\Size\SizeService;

class SizeController{

    private $smarty;
    private $sizeService;

    public function __construct() {
        $this->smarty = SmartyConfig::getSmarty();
        $this->sizeService = new SizeService();
    }

    public function getSizeByIdController() {
        $id = 1;
        $size = $this->sizeService->getSizeByid($id);
        echo '<pre>';
        print_r($size);
        echo '</pre>';
    }

}
?>