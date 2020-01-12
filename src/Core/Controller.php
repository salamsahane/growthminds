<?php

namespace App\Core;

class Controller{

    /**
     * @var View
     */
    protected $view;

    public function view(string $viewName, string $viewTitle, ?array $data = []): View
    {
        $this->view = new View($viewName, $viewTitle, $data);
        return $this->view;
    }

    public function errorPage()
    {
        $this->view('errorpage', 'Error 404');
        $this->view->render();
    }

}