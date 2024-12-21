<?php
namespace app\controller;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'config/SmartyConfig.php';
require_once BASE_PATH . 'app/service/Color/ColorService.php';

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

    public function showAllColorController()
    {
        $colors = $this->colorService->getAllColors();
        $this->smarty->assign('colors', $colors);
        $this->smarty->display('templates\admin\color\color.html');
    }
}
?>