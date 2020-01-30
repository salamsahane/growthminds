<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class specialtyController extends Controller{

    public function allspecialties()
    {
        $this->view('all-specialties', 'Specialties');
        $this->view->render('admin');
    }

    public function addspecialty()
    {
        $this->view('add-specialty', 'New Specialty');
        $this->view->render('admin');
    }

    public function deletespecialty(int $id)
    {
        $this->view('delete-specialty', 'Delete Specialty', [
            'id' => $id
        ]);
        $this->view->render('admin');
    }

}