<?php

namespace application\core;

abstract class Controller {

    public function __construct() {
        echo 'I\'m abstract Controller';
    }
}