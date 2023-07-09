<?php
# Front Controller

use App\Core\StupidRouter;
use App\Utilities\Asset;

include 'bootstrap/init.php' ;

// echo Url::current() . PHP_EOL;


// echo Asset::css('style.php') ;



$router = new StupidRouter() ;
$router->run() ;

