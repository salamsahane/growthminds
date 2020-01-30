<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class programController extends Controller{

    public function allprograms(){
        $this->view('programs', 'Programs');
        $this->view->render('admin');
    }

    public function programinfos(int $id)
    {
        $this->view('program-infos', 'Program Infos', [
            'id' => $id
        ]);
        $this->view->render('admin');
    }

    public function deleteprogram(int $id){
        $this->view('delete-program', 'Delete', [
            'id' => $id
        ]);
        $this->view->render('admin');
    }

}