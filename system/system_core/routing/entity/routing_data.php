<?php

class RoutingData{
    public $request;
    public $file;
    public $controller;
    public $middleware;
    public $module_path;
    public $cookie;

    public function __construct(array $file, array $request, $controller = null, $middleware = null){
        $this->file = $file;
        $this->request = $request;
        $this->cookie = $_COOKIE;
        $this->controller = $controller;
        $this->middleware = $middleware;
    }

    public static function getHttpMethodData(string $method) : array{
        // if($method === 'POST')
        // {
        //     return $_POST;
        // }
        // elseif($method === 'GET')
        // {
        //     return $_GET;
        // }
        // else
        // {
        //     ErrorHandler::echo('this http method not have any data', -1);
        // }
        return $_REQUEST;
    }
}