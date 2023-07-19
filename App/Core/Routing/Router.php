<?php
namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;

class Router{

    private $request ;
    private $routes ;
    private $current_route ;
    const BASE_CONTROLLER = '\App\Controllers\\' ;

    public function __construct()
    {
        $this->request = new Request() ;
        $this->routes = Route::routes() ;
        $this->current_route = $this->findRoute($this->request) ?? null;
        // var_dump($this->current_route) ;
    }


    public function findRoute(Request $request)
    {

        foreach ($this->routes as $route) {
            if(in_array($request->getMethod(), $route['methods']) && $request->getUri() == $route['uri']){
                return $route ;
            }
        }
        return null ;
    }

    public function dispatch404()
    {
        header('HTTP/1.0 404 Not Found');
        view('errors.404') ;
        die() ;
    }

    public function runRouter()
    {

        # 404 : uri not exists!
        if(is_null($this->current_route))
            $this->dispatch404() ;

        $this->dispatch($this->current_route) ;
    }

    private function dispatch($route)
    {
        $action = $route['action'] ;

        # action: null
        if(is_null($action) || empty($action))
            return ;

        # action: Closure
        if(is_callable($action))
            $action() ;

        #action : Controller@method
        if(is_string($action))
            $action = explode('@' , $action) ;

        #action : ['Controller' , 'method']
        if(is_array($action)){
            $class_name = self::BASE_CONTROLLER . $action[0] ;
            $method_name = $action[1] ;
            if(!class_exists($class_name)){
                throw new \Exception("Class $class_name is not exists!!") ;
            }
            $controller = new $class_name() ;
            if(!method_exists($class_name, $method_name)){
                throw new \Exception("method $method_name  is not exists in Class $class_name!!") ;
            }
            $controller->{$method_name}() ;
        }
    }



}