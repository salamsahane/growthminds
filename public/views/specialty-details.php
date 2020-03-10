<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$person = Auth::getAuth();

if(!empty($this->view_data) && isset($this->view_data['specialty_id'])){

    $course_existe = Model::find("specialty_name", "specialties", "specialty_id", $this->view_data['specialty_id']);

    if($course_existe != null){
        $query = (new QueryBuilder)
                ->from("specialties")
                ->where('specialty_id = :specialty_id')
                ->setParam('specialty_id', $this->view_data['specialty_id']);
        $specialty = $query->fetchObj();

        // $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course->course_id);
        // $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
        // $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
        // $instructor_avatar = Model::find('avatar', 'persons', 'person_id', $instructor_id);

        $sql = (new QueryBuilder)
                    ->from("courses_per_specialty")
                    ->where("specialty_id = :specialty_id")
                    ->setParam("specialty_id", $specialty->specialty_id);
        $number_courses = $sql->count("course_id");
        $courses = $sql->fetchAll();

        // $q = (new QueryBuilder)
        //         ->from("courses_assign")
        //         ->where("course_id = :course_id")
        //         ->setParam("course_id", $this->view_data['course_id']);
        // $course_assign = $q->fetchObj();

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect("/specialty/specialties");
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/specialty/specialties");
}

require("html/specialty-details.view.php");