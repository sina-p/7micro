<?php
# Front Controller

use App\Core\Request;
use App\Core\StupidRouter;
use App\Utilities\Asset;

include 'bootstrap/init.php' ;

// echo Url::current() . PHP_EOL;


// echo Asset::css('style.css') ;

// $router = new StupidRouter() ;
// $router->run() ;


$request = new Request() ;
// $request->redirect('/colo/rs/blue') ;

var_dump($request->name) ;
// var_dump ($request->isset('name')) ;
// var_dump ($request->isset('sex')) ;






