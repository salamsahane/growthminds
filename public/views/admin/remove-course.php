<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$instructor = Model::find('person_id', 'courses_assign', 'course_id', $this->view_data['course_id']);
$path  = "/admin/instructor/profile/" . $instructor;

if(!empty($this->view_data['course_id'])){

    $course = Model::find('course_name', 'courses', 'course_id', $this->view_data['course_id']);

    if($course != null){

        $query = new QueryBuilder;
        $query
            ->delete('courses_assign')
            ->where('course_id = :course_id')
            ->setParam('course_id', $this->view_data['course_id']);
        $delete = $query->deleteRecord();

        if($delete){
            $q = new QueryBuilder;
            $q
                ->update('courses')
                ->set("status = 'not-assign'")
                ->where("course_id = :course_id")
                ->setParam('course_id', $this->view_data['course_id']);
            $update = $q->updateTable();
            if($update){
                Notify::success("Course Removed");
                Funcs::redirect($path);
            }
        }else{
            Notify::danger("Invalid Parameter");
            Funcs::redirect($path);
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect($path);
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect($path);
}