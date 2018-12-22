<?php

require_once 'application/lib/dev.php';

use application\core\Router;

function my_autoloader($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    if(file_exists($path)) {
        include_once $path;
    }
}

spl_autoload_register('my_autoloader');

session_start();

$router = new Router();
$router->run();