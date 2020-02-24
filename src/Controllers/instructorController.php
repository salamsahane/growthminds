<?php

namespace App\Controllers;

use App\Core\Controller;

class instructorController extends Controller{

    public function instructorprofile(?int $instructor_id = null){
        $this->view('instructor-profile', 'Instructor Profile', [
            'instructor_id' => $instructor_id
        ]);
        $this->view->render();
    }

    public function editprofile(?int $instructor_id = null){
        $this->view('instructor-edit-profile', 'Edit Profile', [
            'instructor_id' => $instructor_id
        ]);
        $this->view->render();
    }

    public function changepassword(?int $instructor_id = null){
        $this->view('instructor-change-password', 'Change Password', [
            'instructor_id' => $instructor_id
        ]);
        $this->view->render();
    }

}