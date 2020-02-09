<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Notify,
    Funcs
};

Filter::guest('admin');

$person = Auth::getAuth();

$form = new Form;

if(isset($_POST['add'])){
    
    $form::setFields(['first_name', 'last_name', 'email', 'gender', 'course']);

    if($form::NotEmpty()){

        extract($_POST);

        if(strlen($first_name) < 3 || strlen($last_name) < 3){
            $form::setError("Name too short");
        }elseif(!ctype_alpha($first_name) || !ctype_alpha($last_name)){
            $form::setError("Invalid name");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if($form::isValid()){
            $today = date('Y-m-d');

            $admin = Register::register('persons',['first_name', 'last_name', 'email', 'gender', 'profil', 'avatar', 'status', 'creation_date'], '?,?,?,?,?,?,?,?', [$first_name, $last_name, $email, $gender, 'instructor', '/assets/images/avatars/avatar.png', 'not-active', $today]);
            $person = Model::getDB()->lastInsertId();
            if($admin){
                $to = $email;
                $subject = WEBSITE_NAME . " - ACCOUNT ACTIVATION";
                $token = sha1($first_name.$email);
                
                ob_start();
                require(MAILS . 'admin/activation.mail.php');
                $content = ob_get_clean();
                
                $headers = "From:info@growthminds.com \r\n";
                $headers .= 'MINE-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

                $sendMail = mail($to, $subject, $content, $headers);
                
                if($sendMail){
                    $query = (new QueryBuilder)
                                        ->update('courses')
                                        ->set("status = 'assign'")
                                        ->where("course_id = :course_id")
                                        ->setParam('course_id', $course);
                    $update = $query->updateTable();
                    if($update){
                        $assign_course = Register::register('courses_assign', ['person_id', 'course_id'], '?,?', [$person, $course]);
                        if($assign_course){
                            Notify::success("New Instructor Added, Activation Mails send");
                            Funcs::redirect('/admin/instructor/instructors');
                        }else{
                            $form::setError("An error has Occur");
                        }
                    }
                }else{
                    $form::saveInputData();
                    $form::setError("An error occur during the mail sending");   
                }
            }else{
                $form::setError("An error has occur");
            }
        }else{
            $form::saveInputData();
        }

    }else{
        $form::saveInputData();
        $form::setError('Fill all the fields please!');
    }

}else{
    $form::clearInput();
}

require('html/add-instructor.view.php');