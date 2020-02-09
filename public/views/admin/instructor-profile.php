<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify,
};

Filter::guest('admin');

$person = Auth::getAuth();

if(!empty($this->view_data) && isset($this->view_data['instructor_id'])){

    // $course = Model::find('course_name', 'courses', 'course_id', $this->view_data['id']);

    $query = (new QueryBuilder)
                    ->from('persons')
                    ->where("person_id = :person_id")
                    ->setParam('person_id', $this->view_data['instructor_id']);
    $instructor = $query->fetchObj();

    if($instructor != null){

        $req = (new QueryBuilder)
                        ->from('courses_assign')
                        ->where('person_id = :person_id')
                        ->setParam('person_id', $instructor->person_id);
        $number_courses = $req->count('assign_id');
        $courses = $req->fetchAll();

        $form = new Form;
        if(isset($_POST['assign_course'])){
            $form::setFields(['course']);
            if($form::NotEmpty()){

                extract($_POST);

                if($form::isValid()){
                    $register = Register::register('courses_assign', ['person_id', 'course_id'], '?,?', [$this->view_data['instructor_id'], $course]);
                    if($register){
                        $q = (new QueryBuilder)
                                    ->update('courses')
                                    ->set("status = 'assign'")
                                    ->where("course_id = :course_id")
                                    ->setParam("course_id", $course);
                        $update = $q->updateTable();

                        if($update){
                            Notify::success("Course Assign");
                            Funcs::redirect('/admin/instructor/profile/' . $this->view_data['instructor_id']);
                        }
                    }
                }

            }else{
                Notify::danger("Invalid Form");
                $form::setError("Select a Course");
            }
        }else{
            $form::clearInput();
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect('/admin/instructor/instructors');
    }
}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/admin/instructor/instructors");
}

require("html/instructor-profile.view.php");