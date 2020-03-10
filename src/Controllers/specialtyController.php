<?php
namespace App\Controllers;

use App\Core\Controller;

class specialtyController extends Controller{

    public function specialties()
    {
        $this->view('specialties', 'Specialties');
        $this->view->render();
    }

    public function specialtydetails(?int $specialty_id = null)
    {
        $this->view('specialty-details', 'Specialty Details', [
            'specialty_id' => $specialty_id
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