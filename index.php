<?php

use App\Core\Routing\Route;
use App\Core\Routing\Router;

# Front Controller



include 'bootstrap/init.php' ;








$router = new Router() ;
// $router->findRoute($request) ;
$router->runRouter() ;
