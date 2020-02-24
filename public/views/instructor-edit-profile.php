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
    $form::setFields(['first_name', 'last_name', 'email']);

    if($form::NotEmpty()){
        extract($_POST);

        if(strlen($first_name) < 3 || strlen($last_name) < 3){
            $form::setError("Invalid Name");
        }

        if(strpbrk($first_name, '0123456789') != false || strpbrk($last_name, '0123456789') != false){
            $form::setError("Invalid name");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if($form::isValid()){
            $query = (new QueryBuilder)
                            ->update('persons')
                            ->set("first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}'")
                            ->where("person_id = :person_id")
                            ->setParam('person_id', $person->person_id);
            $update = $query->updateTable();

            if($update){
                Notify::success("Changes Saved");
                Funcs::redirect("/". strtolower($person->profil) . "/instructor-profile/" . $person->person_id);
            }
        }


    }else{
        $form::setError("Fill All fields");
    }
}

require("html/instructor-edit-profile.view.php");  