<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
        
    }
    public function loginAction()
    {
        $this->view->render('Вхід');
    }
    public function logoutAction()
    {
        $this->view->render('Вихід');
    }
    public function addAction()
    {
        $this->view->render('Додати запис');
    }
    public function editAction()
    {
        $this->view->render('Редагування поста');
    }
    public function deleteAction()
    {
        //
    }
}
