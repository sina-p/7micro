<?php
namespace App\Core;

class Request{

    private $params ;
    private $method ;
    private $user_agent ;
    private $ip ;
    private $uri ;

    public function __construct()
    {
        $this->params = $_REQUEST ; # params
        $this->method = $_SERVER['REQUEST_METHOD'] ;
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'] ;
        $this->ip = $_SERVER['REMOTE_ADDR'] ;
        $this->uri = strtok($_SERVER['REQUEST_URI'] , '?') ;
    }

    public function __get($param)
    {
        return $this->params[$param] ?? null ;
    }


    public function getParams()
    {
        return $this->params ;
    }
    public function getMethod()
    {
        return $this->method ;
    }
    public function getUserAgent()
    {
        return $this->user_agent ;
    }
    public function getIp()
    {
        return $this->ip ;
    }
    public function getUri()
    {
        return $this->uri ;
    }
    public function isset($key)
    {
        return isset($this->params[$key]) ;
    }
    public function getInput($key)
    {
        return $this->params[$key] ?? null ;
    }
    public function redirect($route)
    {
        header("Location: " . site_url($route)) ;
        die() ;
    }
}