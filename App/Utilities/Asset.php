<?php
namespace App\Utilities;


class Asset{

    public static function __callStatic(string $method, $arguments): ?string
    {
        $url = $_ENV['BASE_URL'] ;
        $file = "assets/" . $method . "/" . $arguments[0];

        return (file_exists(BASE_PATH ."/". $file)) ? $url . $file : null;
    }

}