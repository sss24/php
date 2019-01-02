<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Account;

class AccountController extends Controller
{

    public function loginAction()
    {
        if ($this->isAjax()) {
            echo 'test';
            die;
        }
        $model = new Account();
        //$result = $model->findJobs();
        $result = $model->findOne('midl');
        $data = ['result' => $result];
        $this->view->render('Login in to website', $data);
    }

    public function registerAction()
    {
        $this->view->render('Register in to website');
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $data = ['h1' => 'TEST h1', 'h3' => 'test h3'];
            $this->loadView('test', $data);
            die;
        }

    }

}