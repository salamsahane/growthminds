<?php

use App\Models\Auth\Auth;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify   
};

Filter::auth('admin');

$form = new Form;
if(isset($_POST['login'])){
    
    $form::setFields(['email', 'password']);
    
    if($form::NotEmpty()){

        extract($_POST);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if($form::isValid()){

            $auth = new Auth();
            $user = $auth->adminLogin($email, $password);

            if(!is_null($user)){

                Notify::success('Login Successful');
                Funcs::redirect('/admin');

            }else{
                $form::saveInputData();
                $form::setError("Email or Password not correct");
            }

        }else{
            $form::saveInputData();
        }

    }else{
        $form::saveInputData();
        $form::setError("Fill all the fields Please!");
    }   
    
}else{
    $form::clearInput();
}

require('html/login.view.php');