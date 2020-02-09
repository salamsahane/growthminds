<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\Filter;
use App\Utils\Form;
use App\Utils\Funcs;
use App\Utils\Notify;

Filter::guest('admin');

$person = Auth::getAuth();

if(!empty($this->view_data) && isset($this->view_data['specialty_id'])){

    $specialty_exist = Model::find('specialty_name', 'specialties', 'specialty_id', $this->view_data['specialty_id']);

    if($specialty_exist != null){
        $query = (new QueryBuilder)
                        ->from('specialties')
                        ->where("specialty_id = :specialty_id")
                        ->setParam('specialty_id', $this->view_data['specialty_id']);
        $specialty = $query->fetchObj();

        //get Field
        $field = Model::find('field_name', 'fields', 'field_id', $specialty->field_id);
        
        //get Program
        $program_id = Model::find('program_id', 'fields', 'field_id', $specialty->field_id);
        $program = Model::find('program_name', 'programs', 'program_id', $program_id);

        $q = (new QueryBuilder)
                ->from('courses_per_specialty')
                ->where("specialty_id = :specialty_id")
                ->setParam('specialty_id', $specialty->specialty_id);
        $number_courses = $q->count('course_id');

        $form = new Form;
        if(isset($_POST['add_course'])){
            $form::setFields(['course_specialty', 'course_id']);
            if($form::NotEmpty()){
                extract($_POST);

                $req = (new QueryBuilder)
                            ->select("specialty_id")
                            ->from('courses_per_specialty')
                            ->where("course_id = :course_id")
                            ->setParam('course_id', $course_id);
                $courseIsAssign = $req->fetchAll();

                foreach($courseIsAssign as $row){
                    if($row['specialty_id'] == $specialty->specialty_id){
                        $form::setError("Course Already Assigned");
                        Notify::danger("Error");
                        break;
                    }
                }


                if($form::isValid()){
                    $insert = Register::register('courses_per_specialty', ['course_id', 'specialty_id'], '?,?', [$course_id, $specialty->specialty_id]);
                    if($insert){
                        Notify::success("Course Added");
                        Funcs::redirect('/admin/specialty/specialty-infos/' . $specialty->specialty_id);
                    }
                }

            }
        }else{
            $form::clearInput();
        }

        $sql = (new QueryBuilder)
                    ->from("courses_per_specialty")
                    ->where("specialty_id = :specialty_id")
                    ->setParam('specialty_id', $specialty->specialty_id);
        $courses = $sql->fetchAll();

    }else{
        Notify::danger("Invalid Specialty");
        Funcs::redirect('/admin/specialty/specialties');
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect('/admin/specialty/specialties');
}

require('html/specialty-infos.view.php');