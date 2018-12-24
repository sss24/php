<?php

namespace application\controllers;
use application\core\Controller;

class MainController extends Controller{

    public function indexAction() {
        $this->view->render('Index website');

    }

    public function contactsAction() {
        $data = ['firstName' => 'Ivan', 'lstName' => 'Dorn'];
        $this->view->render('Contacts', $data);
    }
}