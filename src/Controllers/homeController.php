<?php
namespace App\Controllers;

use App\Core\Controller;

class homeController extends Controller{

    public function index()
    {
        $this->view('home', 'Home');
        $this->view->render();
    }

}