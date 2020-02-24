<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Form;
use App\Utils\Funcs;
use App\Utils\Notify;

Filter::guest();

$person = Auth::getAuth();

if(!empty($this->view_data) && count(array_count_values($this->view_data)) === 2){

    extract($this->view_data);

    $course_name = Model::find('course_name', 'courses', 'course_id', $this->view_data['course_id']);

    if($course_name != null){

        $query = (new QueryBuilder)
                        ->from("topics")
                        ->where("topic_id = :topic_id AND course_id = :course_id")
                        ->setParam("topic_id", $topic_id)
                        ->setParam("course_id", $course_id);
        $topic = $query->fetchObj();

        if($query->count('topic_id') == 0){
            Notify::danger("Invalid Topic");
            Funcs::redirect("/course/courses");
        }

        $form = new Form;
        if(isset($_POST['save'])){
            $form::setFields(['topic_content']);
            if($form::NotEmpty()){
                if($form::isValid()){
                    $sql = (new QueryBuilder)
                        ->update("topics")
                        ->set("topic_content = :content")
                        ->where("topic_id = :topic_id AND course_id = :course_id")
                        ->setParam('content', $_POST['topic_content'])
                        ->setParam('topic_id', $topic_id)
                        ->setParam('course_id', $course_id);
                    $update = $sql->updateTable();

                    if($update){
                        Notify::success("Topic Content Updated");
                        Funcs::redirect("/course/course-details/" . $course_id);
                    }else{
                        $form::setError("An error has occur");
                    }
                }
            }else{
                $form::setError("Set Content");
            }
        }

    }else{
        Notify::danger("Invalid Course");
        Funcs::redirect('/course/courses');
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect('/course/courses');
}

require("html/edit-topic.view.php");