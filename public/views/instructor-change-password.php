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

$user_exit = Model::find('email', 'persons', 'person_id', $person->person_id);

if($user_exit == null || (int)$this->view_data['instructor_id'] != $person->person_id){
    Notify::danger("Invalid User");
    Funcs::redirect('/');
}

$form = new Form;
if(isset($_POST['save'])){

    $form::setFields(['actual_password', 'new_password', 'confirm_password']);
    if($form::NotEmpty()){

        extract($_POST);

        if(!password_verify($actual_password,$person->password)){
            $form::setError("Actual Password not Correct");
        }

        if(strlen($new_password) < 6){
            $form::setError("Password Too Short");
        }elseif($confirm_password != $new_password){
            $form::setError("Two passwords do not correspond");
        }

        if($form::isValid()){
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $query = (new QueryBuilder)
                            ->update("persons")
                            ->set("password = '{$password_hash}'")
                            ->where("person_id = :person_id")
                            ->setParam("person_id", $person->person_id);
            $update = $query->updateTable();

            if($update){
                Notify::success("Password Changed");
                Funcs::redirect("/instructor/instructor-profile/" . $person->person_id);
            }
        }

    }else{
        $form::setError("Fill All Fields");
    }

}else{
    $form::clearInput();
}

require("html/instructor-change-password.view.php");  