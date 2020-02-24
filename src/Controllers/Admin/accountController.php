<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class accountController extends Controller{

    public function login(){
        $this->view('login', 'Admin Login');
        $this->view->render('admin');
    }

    public function logout(){
        $this->view('logout', 'Logout');
        $this->view->render('admin');
    }

    public function resetpassword(){
        $this->view('reset-password', 'Reset your Password');
        $this->view->render('admin');
    }

    public function seed(){
        $this->view('seed', 'seed');
        $this->view->render('admin');
    }

    public function alladmins(){
        $this->view('all-admins', 'Administrators');
        $this->view->render('admin');
    }
    
    public function addadmin(){
        $this->view('add-admin', 'New Administrator');
        $this->view->render('admin');
    }

    public function editaccount(int $id){
        $this->view('edit-account', 'Edit Account', [
            'id' => $id,
        ]);
        $this->view->render('admin');
    }

    public function deleteadmin(int $id){
        $this->view('delete-admin', 'Delete Admin', [
            'id' => $id,
        ]);
        $this->view->render('admin');
    }

    public function newpassword(int $id, string $token, int $timestamp){
        $this->view('new-password', 'New Password', [
            'id' => $id,
            'token' => $token,
            'timestamp' => $timestamp
        ]);
        $this->view->render('admin');
    }

    public function activation(int $id, string $token){
        $this->view('activation', 'Activation', [
            'id' => $id,
            'token' => $token
        ]);
        $this->view->render('admin');
    }

}