<?php
# Front Controller

use App\Utilities\Url;
use App\Utilities\Asset;

include 'bootstrap/init.php' ;

// echo Url::current() . PHP_EOL;


// echo Asset::css('style.php') ;


$route = Url::current_route() ;


if($route == '/7micro/colors/blue')
    include BASE_PATH . 'views/colors/blue.php' ;

if($route == '/7micro/colors/green')
    include BASE_PATH . 'views/colors/green.php' ;

if($route == '/7micro/colors/red')
    include BASE_PATH . 'views/colors/red.php' ;



