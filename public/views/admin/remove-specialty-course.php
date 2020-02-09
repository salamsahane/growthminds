<?php

use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

if(!empty($this->view_data) && isset($this->view_data['course_id']) && isset($this->view_data['specialty_id'])){

    $query = (new QueryBuilder)
                    ->delete('courses_per_specialty')
                    ->where("course_id = :course_id AND specialty_id = :specialty_id")
                    ->setParam('course_id', $this->view_data['course_id'])
                    ->setParam('specialty_id', $this->view_data['specialty_id']);
    $delete = $query->deleteRecord();

    if($delete){
        Notify::success("Course Removed");
        Funcs::redirect("/admin/specialty/specialty-infos/" . $this->view_data['specialty_id']);
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/admin/specialty/specialty-infos/" . $this->view_data['specialty_id']);
}