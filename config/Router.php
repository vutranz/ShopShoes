<?php

namespace config;

class Router {

    private $routes = [];

    public function addRoute($action, $callback) {
        $this->routes[$action] = $callback;
    }

    public function route($action) {
        if (isset($this->routes[$action])) {
            call_user_func($this->routes[$action]);
        } else {
           
            echo "404 Not Found";  
        }
    }
}
?>
