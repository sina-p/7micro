<?php
namespace App\Utilities;



// http://7learn.msa/7micro/assets/css/style.css
class Url{

    public static function current()
    {
        return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function current_route()
    {
        return strtok($_SERVER['REQUEST_URI'] ,'?') ;
    }

}



