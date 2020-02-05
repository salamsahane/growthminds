<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/course/courses";

if(!empty($this->view_data['course_id'])){

    $course = Model::find('course_name', 'courses', 'course_id', $this->view_data['course_id']);

    if($course != null){

        $query = new QueryBuilder;
        $query
            ->delete('topics')
            ->where('course_id = :course_id')
            ->setParam('course_id', $this->view_data['course_id']);

        $delete = $query->deleteRecord();

        if($delete){
            $req = (new QueryBuilder)
                            ->delete("courses")
                            ->where("course_id = :course_id")
                            ->setParam('course_id', $this->view_data['course_id']);
            $deleteCourse = $req->deleteRecord();

            if($deleteCourse){
                Notify::success("Course deleted");
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