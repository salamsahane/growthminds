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
if(isset($_POST['new_field'])){

    $form::setFields(['field_name', 'program']);
    if($form::NotEmpty()){

        if(strlen($_POST['field_name']) < 3){
            $form::setError("Name too short");
            Notify::danger('Invalid Form');
        }

        if($form::isValid()){
            $insert = Register::register('fields',['field_name', 'program_id'], '?,?', [$_POST['field_name'], $_POST['program']]);

            if($insert){
                Notify::success("Field Added");
            }else{
                Notify::danger("An error has occur");
            }
        }

    }else{
        $form::setError("Give a name to the field");
        Notify::danger("Invalid Form");
    }

}else{
    $form::clearinput();
}

$query = (new QueryBuilder)->from('fields');

$number_fields = $query->count('field_id');
$fields = $query->fetchAll();

require("html/fields.view.php");