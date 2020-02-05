<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class courseController extends Controller{

    public function courses(){
        $this->view('courses', 'Courses');
        $this->view->render('admin');
    }

    public function addcourse(){
        $this->view('add-course', 'Add A Courses');
        $this->view->render('admin');
    }

    public function courseinfos(?int $id = null){
        $this->view('course-infos', 'Courses Details', [
            'id' => $id
        ]);
        $this->view->render('admin');
    }

    public function editcourse(?int $course_id = null){
        $this->view('edit-course', 'Edit Course', [
            'course_id' => $course_id
        ]);
        $this->view->render('admin');
    }

    public function deletecourse(int $course_id){
        $this->view('delete-course', 'Delete course', [
            'course_id' => $course_id
        ]);
        $this->view->render('admin');
    }

    public function deletetopic(int $course_id, int $topic_id){
        $this->view('delete-topic', 'Delete Topic', [
            'course_id' => $course_id,
            'topic_id' => $topic_id
        ]);
        $this->view->render('admin');
    }

}