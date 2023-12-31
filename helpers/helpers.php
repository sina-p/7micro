<?php

function site_url(string $route = null):string {
    return $_ENV['BASE_URL'] . $route ;
}

function asset_url(string $route):string {
    return site_url("assets/" . $route) ;
}

function random_element(array $arr){
    shuffle($arr) ;
    return array_pop($arr) ;
}

function view(string $path):void
{
    $path = str_replace('.' , '/' , $path) ;
    include_once BASE_PATH . "views/$path.php" ;
}

