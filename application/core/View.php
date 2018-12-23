<?php

namespace application\core;

class View {
    public $route;
    public $path;
    public $layout = 'default';

    function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' .  $this->route['action'];
    }

    function render($title = 'Title', $data = []) {
        extract($data);
        if(file_exists("application/views/{$this->path}.php")) {
            ob_start();
            include_once "application/views/{$this->path}.php";
            $content = ob_get_clean();
            include_once "application/views/layouts/{$this->layout}.php";
        } else {
            echo "Not have views {$this->path}";
        }
    }
}