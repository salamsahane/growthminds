<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class fieldController extends Controller{

    public function allfields(){
        $this->view('fields', 'Fields');
        $this->view->render('admin');
    }

    public function deletefield(int $id){
        $this->view('delete-field', 'Delete Field', [
            'id' => $id
        ]);
        $this->view->render('admin');
    }

}