<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class specialtyController extends Controller{

    public function specialties()
    {
        $this->view('all-specialties', 'Specialties');
        $this->view->render('admin');
    }

    public function addspecialty()
    {
        $this->view('add-specialty', 'New Specialty');
        $this->view->render('admin');
    }

    public function specialtyinfos(?int $specialty_id = null)
    {
        $this->view('specialty-infos', 'Specialty', [
            'specialty_id' => $specialty_id
        ]);
        $this->view->render('admin');
    }

    public function removespecialtycourse(?int $course_id = null ,?int $specialty_id = null)
    {
        $this->view('remove-specialty-course', 'Remove Course of Specialty', [
            'course_id' => $course_id,
            'specialty_id' => $specialty_id
        ]);
        $this->view->render('admin');
    }

    public function editspecialty(?int $specialty_id = null)
    {
        $this->view('edit-specialty', 'Edit Specialty', [
            'specialty_id' => $specialty_id
        ]);
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