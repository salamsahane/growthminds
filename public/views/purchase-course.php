<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Funcs;

Filter::guest();

$person = Auth::getAuth();

if(isset($this->view_data['course_id']) && !empty($this->view_data['course_id'])){

    $query = (new QueryBuilder)
                    ->from("courses")
                    ->where("course_id = ?")
                    ->setParam(null, $this->view_data['course_id']);
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

}else{
    Funcs::redirect("/course/courses");
}

require('html/purchase-course.view.php');