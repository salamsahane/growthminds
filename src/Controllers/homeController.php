<?php
namespace App\Controllers;

use App\Core\Controller;

class homeController extends Controller{

    public function index()
    {
        $this->view('home', 'Home');
        $this->view->render();
    }

    public function login()
    {
        $this->view('login', 'Login');
        $this->view->render();
    }

    public function logout()
    {
        $this->view('logout', 'Logout');
        $this->view->render();
    }

    public function signup()
    {
        $this->view('signup', 'Create Account');
        $this->view->render();
    }

    public function activation(int $id, string $token)
    {
        $this->view('activation', 'Account Activation', [
            'id' => $id,
            'token' => $token
        ]);
        $this->view->render();
    }

}