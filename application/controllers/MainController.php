<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Головна сторінка');
    }
    public function aboutAction()
    {
        $this->view->render('Про блог');
    }
    public function contactAction()
    {
        if(!empty($_POST)){
            $this->view->message('success', 'Форма відправлена');
        }
        $this->view->render('Контакти');
    }
    public function postAction()
    {
        $this->view->render('Пост');
    }
}
