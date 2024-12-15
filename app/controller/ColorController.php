<?php
namespace app\controller;

require_once 'E:/xampp/htdocs/ShopShoes/config/SmartyConfig.php';
require_once 'E:/xampp/htdocs/ShopShoes/app/service/Color/ColorService.php';

use app\service\Color\ColorService;
use config\SmartyConfig;

class ColorController{
    private $smarty;
    private $colorService;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->smarty = SmartyConfig::getSmarty();
        $this->colorService = new ColorService();
    }

    public function getColorByIdController() {
        $id = 1;
        $colors = $this->colorService->getColorById($id);
        echo '<pre>';
        print_r($colors);
        echo '</pre>';
    }
}
?>