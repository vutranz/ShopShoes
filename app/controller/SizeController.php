<?php
namespace app\controller;

require_once 'config/PathConfig.php'; 

require_once BASE_PATH . 'config/SmartyConfig.php';
require_once BASE_PATH . 'app/service/Size/SizeService.php';

use config\SmartyConfig;
use app\service\Size\SizeService;

class SizeController{

    private $smarty;
    private $sizeService;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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

    public function getAllSizeController() 
    {
        $sizes = $this->sizeService->getAllSizes();
        $this->smarty->assign('sizes', $sizes);
        $this->smarty->display('templates\admin\size\size.html');
    }

}
?>