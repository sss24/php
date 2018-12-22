<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require_once 'application/config/routes.php';
        debug($arr);
    }

    public function add()
    {

    }

    public function match()
    {

    }

    public function run()
    {
        echo 'start method run()';
    }


}