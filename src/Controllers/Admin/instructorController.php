<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class instructorController extends Controller{

    public function instructors(){
        $this->view('instructors', 'Instructors');
        $this->view->render('admin');
    }

    public function addinstructor(){
        $this->view('add-instructors', 'New Instructor');
        $this->view->render('admin');
    }

}