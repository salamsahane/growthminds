<?php
namespace App\Controllers;

use App\Core\Controller;

class policyController extends Controller{

    public function cookiepolicy()
    {
        $this->view('cookie-policy', 'Cookie Policy');
        $this->view->render();
    }

    public function acceptcookie(){
        $this->view('accept-cookie', 'Accept Cookies');
        $this->view->render();
    }

    public function privacypolicy(){
        $this->view('privacy-policy', 'Privacy Policy');
        $this->view->render();
    }

    public function termsconditions(){
        $this->view('terms-conditions', 'Terms and Conditions');
        $this->view->render();
    }

}