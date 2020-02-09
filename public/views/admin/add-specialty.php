<?php

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

    $form::setFields(['specialty_name', 'program', 'field', 'specialty_price', 'description']);
    if($form::NotEmpty()){
        
        extract($_POST);

        if(strlen($specialty_name) < 3){
            $form::setError("Specialty Name too short");
        }

        if(strlen($description) < 40){
            $form::setError('Description too short');
        }

        if(strlen($specialty_price ) < 4 || !ctype_digit($specialty_price )){
            $form::setError('Invalid Price');
        }

        if($form::isValid()){
            $register = Register::register('specialties', ['specialty_name', 'specialty_price', 'specialty_description', 'specialty_image', 'field_id'], '?,?,?,?,?', [$specialty_name, $specialty_price, $description, '/assets/images/specialty/default.png' ,$field]);
            if($register){
                Notify::success("Specialty added");
                Funcs::redirect("/admin/specialty/specialties");
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

require("html/add-specialty.view.php");