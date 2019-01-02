<?php

namespace application\core;


class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require_once 'application/config/routes.php';
        foreach ($arr as $kay => $value) {
            $this->add($kay, $value);
        }
    }

    public function add($route, $params)
    {
        $route =  '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ( $this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if($this->match()) {
            $class = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if(class_exists($class)) {
                $action = $this->params['action'] . 'Action';
                if(method_exists($class, $action)) {
                    $controller = new $class($this->params);
                    $controller->$action();
                } else {
                    echo '<br>method is not find';
                }
            } else {
                echo '<br>class ' . $this->params['controller'] . ' is not find';
            }
        } else {
            echo '<br>path is not find';
        }
    }
}