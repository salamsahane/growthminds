<?php
namespace App\Controllers;

use App\Core\Controller;

class homeController extends Controller{

    public function index()
    {
        $this->view('home', 'Home');
        $this->view->render();
    }

    public function contactus()
    {
        $this->view('contact', 'Contact Us');
        $this->view->render();
    }

}