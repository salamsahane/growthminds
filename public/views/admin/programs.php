<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Notify
};

Filter::guest('admin');

$person = Auth::getAuth();

$form = new Form;
if(isset($_POST['new_program'])){

    $form::setFields(['program_name']);
    if($form::NotEmpty()){

        if(strlen($_POST['program_name']) < 3){
            $form::setError("Name too short");
            Notify::danger('Invalid Form');
        }

        if($form::isValid()){
            $insert = Register::register('programs',['program_name'], '?', [$_POST['program_name']]);

            if($insert){
                Notify::success("Program Added");
            }else{
                Notify::danger("An error has occur");
            }
        }

    }else{
        $form::setError("Give a name to the program");
        Notify::danger("Invalid Form");
    }

}else{
    $form::clearinput();
}

$query = (new QueryBuilder)->from('programs');

$number_programs = $query->count('program_id');
$programs = $query->fetchAll();

require("html/programs.view.php");