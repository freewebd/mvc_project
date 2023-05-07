<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class NewsController extends Controller
{
    function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'news';
    }
    public function indexAction()
    {   
        $pagination = new Pagination($this->route, $this->model->postsCount());
        $news = $this->model->getNews($pagination->start, $pagination->limit);
        $vars = [
            'pagination' => $pagination->draw(),
            'list' => $news,
        ];
        $this->view->render('Список новини', $vars);
    }
    public function showAction()
    {
        if (!$this->model->isNews($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $news = $this->model->showNews($this->route['id']);
        $vars = [
            'data' => $news[0],
        ];
        $this->view->render('Cторінка новина', $vars);
    }
    public function createAction()
    {
        if (!empty($_POST)) {
            $id = $this->model->createNews();
            $this->model->newsUploadsImage($id);
        }
        $this->view->render('Додати новину');
    }
    public function editAction()
    {
        $this->view->render('Головна сторінка');
    }
    public function deleteAction()
    {
        if (!$this->model->isNews($this->route['id'])) {
            $this->view->errorCode(404);
        }
        $this->model->deleteNews($this->route['id']);
        $this->view->redirect('/');
    }
}
