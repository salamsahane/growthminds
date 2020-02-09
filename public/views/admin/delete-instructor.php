<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/instructor/instructors";

if(!empty($this->view_data) && isset($this->view_data['instructor_id'])){

    $instructor = Model::find('email', 'persons', 'person_id', $this->view_data['instructor_id']);
    
    if($instructor != null){

        $query = new QueryBuilder;

        $query
            ->from("courses_assign")
            ->where('person_id = :person_id')
            ->setParam("person_id", $this->view_data['instructor_id']);

        $hasCourses = $query->count('assign_id');

        if($hasCourses > 0){
            foreach($query->fetchAll() as $course){
                $sql = new QueryBuilder;
                $sql->update('courses')
                    ->set("status = 'not-assign'")
                    ->where("course_id = :course_id")
                    ->setParam('course_id', $course['course_id']);
                $update = $sql->updateTable();
            }

            $req = new QueryBuilder;
            $req
                ->delete("courses_assign")
                ->where('person_id = :person_id')
                ->setParam("person_id", $this->view_data['instructor_id']);
            $deleteCourseAssign = $req->deleteRecord();
        }

        $q = (new QueryBuilder)
            ->delete('persons')
            ->where('person_id = :person_id')
            ->setParam('person_id', $this->view_data['instructor_id']);
        $deleteInstructor = $q->deleteRecord();
        if($deleteInstructor){
            Notify::success("Instructor Deleted");
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