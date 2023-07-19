<?php
namespace App\Core\Routing;



class Route{

    private static $routes = [] ;

    public static function __callStatic($methods, $arguments)
    {
        $http_verbs = ['get', 'post', 'put', 'patch', 'delete', 'options'] ;

        if(!in_array($methods, $http_verbs))
            throw new \Exception('Request method not support!');

        $uri = $arguments[0] ;
        $action = $arguments[1] ?? null;
        self::add($methods,$uri,$action) ;
    }

    public static function add(array|string $methods, string $uri, $action = null)
    {
        $methods = is_array($methods) ? $methods : [$methods] ;
        self::$routes[] = [

            'methods' => $methods ,
            'uri' => $uri,
            'action' => $action

        ] ;
    }

    public static function getRoutes()
    {
        return self::$routes ;
    }

}