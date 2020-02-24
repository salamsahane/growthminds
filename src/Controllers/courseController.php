<?php
namespace App\Controllers;

use App\Core\Controller;

class courseController extends Controller{

    public function courses()
    {
        $this->view('courses', 'Courses');
        $this->view->render();
    }

    public function coursedetails(?int $course_id = null)
    {
        $this->view('course-details', 'Course Details', [
            'course_id' => $course_id
        ]);
        $this->view->render();
    }

    public function edittopic(?int $course_id = null, ?int $topic_id = null)
    {
        $this->view('edit-topic', 'Edit Topic', [
            'course_id' => $course_id,
            'topic_id' => $topic_id
        ]);
        $this->view->render();
    }

}