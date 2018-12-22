<?php

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller{

    public function indexAction() {
        echo '<br>index';
    }

    public function contactsAction() {
        echo '<br>contacts';
    }
}