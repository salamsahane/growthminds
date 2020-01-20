<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class homeController extends Controller{

    public function index()
    {
        $this->view('home', 'Administrative panel');
        $this->view->render('admin');
    }

}