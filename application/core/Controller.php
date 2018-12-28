<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
    }

    public function isAjax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === "XMLHttpRequest")
            return true;
        return false;
    }

    public function loadView($view, $vars = []) {
        extract($vars);
        $path = $this->route['controller'] . '/' .  $view . '.php';
        require "application/views/{$path}";
    }
}