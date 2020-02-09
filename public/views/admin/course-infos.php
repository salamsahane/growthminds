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

if(!empty($this->view_data) && isset($this->view_data['id'])){

    // $course = Model::find('course_name', 'courses', 'course_id', $this->view_data['id']);
    $query = (new QueryBuilder)
                    ->from('courses')
                    ->where("course_id = :course_id")
                    ->setParam('course_id', $this->view_data['id']);
    $course = $query->fetchObj();
    
    if($course != null){

        $req = (new QueryBuilder)
                        ->from('topics')
                        ->where('course_id = :course_id')
                        ->setParam('course_id', $course->course_id);
        $number_topics = $req->count('topic_id');
        $topics = $req->fetchAll();

        $form = new Form;
        if(isset($_POST['add_topic'])){
            $form::setFields(['topic_title']);
            if($form::NotEmpty()){

                extract($_POST);

                if(strlen($topic_title) < 3){
                    Notify::danger("Invalid Form");
                    $form::setError("Topic title too short");
                }

                if($form::isValid()){
                    $register = Register::register('topics', ['course_id', 'topic_title'], '?,?', [$course->course_id, $topic_title]);
                    if($register){
                        Notify::success("Topic added");
                        Funcs::redirect('/admin/course/course-infos/' . $course->course_id);
                    }
                }

            }else{
                Notify::danger("Invalid Form");
                $form::setError("Give a topic title");
            }
        }else{
            $form::clearInput();
        }

        $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course->course_id);
        $q = (new QueryBuilder)
                ->select('first_name, last_name')
                ->from('persons')
                ->where('person_id = :person_id')
                ->setParam('person_id', $instructor_id);
        $instructor = $q->fetchObj();

    }else{
        Notify::danger("Invalid Course");
        Funcs::redirect('/admin/course/courses');
    }
}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/admin/course/courses");
}

require("html/course-infos.view.php");