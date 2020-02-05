<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::guest('admin');

$person = Auth::getAuth();

$form = new Form;

if(isset($_POST['add'])){

    $form::setFields(['course_name', 'number_topics', 'course_price', 'description']);
    if($form::NotEmpty()){
        
        extract($_POST);

        if(strlen($course_name) < 3){
            $form::setError('Course Name too short');
        }

        if(!ctype_digit($number_topics)){
            $form::setError("Invalid Number of Topics");
        }

        if(!ctype_digit($course_price) || strlen($course_price) < 4){
            $form::setError("Price invalid");
        }

        if(strlen($description) < 40){
            $form::setError("Course description short");
        }

        if(Model::is_already_used('course_id', 'courses', 'course_name', $course_name)){
            $form::setError("This Course Already exist");
        }

        if($form::isValid()){
            $register = Register::register('courses', ['course_name', 'number_chapter', 'course_price', 'course_image', 'course_description'], '?,?,?,?,?', [$course_name, $number_topics, $course_price, '/assets/images/course/default.png', $description]);
            if($register){
                Notify::success("Course added");
                Funcs::redirect("/admin/course/courses");
            }
        }else{
            $form::saveInputData();
        }
    }else{
        $form::setError("Fill all the fields please");
    }

}else{
    $form::clearInput();
}

require("html/add-course.view.php");