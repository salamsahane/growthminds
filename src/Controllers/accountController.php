<?php
namespace App\Controllers;

use App\Core\Controller;

class accountController extends Controller{

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

    public function resetpassword()
    {
        $this->view('reset-password', 'Reset your Password');
        $this->view->render();
    }

    public function newpassword(int $id, string $token)
    {
        $this->view('new-password', 'Set new password', [
            'id' => $id,
            'token' => $token
        ]);
        $this->view->render();
    }

    public function prospectprofile(int $id)
    {
        $this->view('prospect-profile', 'Profile', [
            'id' => $id
        ]);
        $this->view->render();
    }

}