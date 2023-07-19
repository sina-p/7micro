<?php
namespace App\Core;

use App\Utilities\Url;

class StupidRouter{
    private $routes ;

    public function __construct()
    {
        $this->routes = [

            '/' => 'index/index.php',
            '/colors/blue' => 'colors/blue.php',
            '/colors/green' => 'colors/green.php',
            '/colors/red' => 'colors/red.php'

        ] ;
    }

    public function run()
    {
        $currnet_route = Url::current_route() ;

        foreach ($this->routes as $route => $view) {
            if($currnet_route == $route){
                $this->includeAndDie(BASE_PATH . 'views/' . $view ) ;
            }
        }
        header('HTTP/1.0 404 Not Found', true, 404);
        $this->includeAndDie(BASE_PATH . 'views/errors/404.php' ) ;
    }

    private function includeAndDie($viewPath)
    {
        include $viewPath ;
        die() ;
    }
}




