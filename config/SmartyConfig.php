<?php

namespace config;

require_once 'E:/xampp/htdocs/ShopShoes/vendor/smarty/smarty/libs/Smarty.class.php';

use Smarty\Smarty;

class SmartyConfig {
    
    public static function getSmarty() {

        $smarty = new Smarty();
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');

        return $smarty;
    }
}
?>