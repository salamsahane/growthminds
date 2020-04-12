<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$person = Auth::getAuth();

if(!empty($this->view_data) && isset($this->view_data['course_id'])){

    $course_existe = Model::find("course_name", "courses", "course_id", $this->view_data['course_id']);

    if($course_existe != null){
        $query = (new QueryBuilder)
                ->from("courses")
                ->where('course_id = :course_id')
                ->setParam('course_id', $this->view_data['course_id']);
        $course = $query->fetchObj();

        $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course->course_id);
        if($instructor_id == null){
            $instructor_fname = null;
            $instructor_lname = null;
            $instructor_avatar = '/assets/images/avatars/avatar.png';
        }else{
            $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
            $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
            $instructor_avatar = Model::find('avatar', 'persons', 'person_id', $instructor_id);
        }

        $sql = (new QueryBuilder)
                    ->from("topics")
                    ->where("course_id = :course_id")
                    ->setParam("course_id", $course->course_id);
        $number_topics = $sql->count("topic_id");
        $topics = $sql->fetchAll();

        $q = (new QueryBuilder)
                ->from("courses_assign")
                ->where("course_id = :course_id")
                ->setParam("course_id", $this->view_data['course_id']);
        $course_assign = $q->fetchObj();

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect("/course/courses");
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/course/courses");
}

require("html/course-details.view.php");