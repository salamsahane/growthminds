<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class instructorController extends Controller{

    public function instructors(){
        $this->view('instructors', 'Instructors');
        $this->view->render('admin');
    }

    public function addinstructor(){
        $this->view('add-instructor', 'New Instructor');
        $this->view->render('admin');
    }

    public function profile(?int $instructor_id){
        $this->view('instructor-profile', 'Profile', [
            'instructor_id' => $instructor_id
        ]);
        $this->view->render('admin');
    }

    public function removecourse(?int $course_id){
        $this->view('remove-course', 'Remove Course', [
            'course_id' => $course_id
        ]);
        $this->view->render('admin');
    }

    public function deleteinstructor(?int $instructor_id){
        $this->view('delete-instructor', 'Delete Instructor', [
            'instructor_id' => $instructor_id
        ]);
        $this->view->render('admin');
    }
}