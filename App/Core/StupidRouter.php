<?php
namespace App\Core;

use App\Utilities\Url;

class StupidRouter{
    private $routs ;

    public function __construct()
    {
        $this->routs = [
            '/7micro/colors/blue' => 'colors/blue.php',
            '/7micro/colors/green' => 'colors/green.php',
            '/7micro/colors/red' => 'colors/red.php'
        ] ;
    }

    public function run()
    {
        $currnet_route = Url::current_route() ;

        foreach ($this->routs as $route => $view) {
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




