<?php

namespace application\controllers;
use application\core\Controller;

class Account extends Controller{

    public function loginAction() {
        $this->view->render('Login in to website');
    }

    public function registerAction() {
        $this->view->render('Register in to website');
    }

}