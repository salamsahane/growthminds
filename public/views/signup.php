<?php

use App\Utils\Form;
use App\Models\Auth\Auth;
use App\Models\Register;
use App\Utils\{
    Filter,
    Funcs,
    Notify   
};

Filter::auth();

$form = new Form;
if(isset($_POST['signup'])){
    
    $form::setFields(['first_name', 'last_name','email', 'gender', 'password', 'password_confirm']);
    
    if($form::NotEmpty()){

        extract($_POST);

        if(strlen($first_name) < 3 || strlen($last_name) < 3){
            $form::setError("Name too short");
        }

        if(!ctype_alpha($first_name) || !ctype_alpha($last_name)){
            $form::setError("Invalid name");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if(strlen($password) < 6){
            $form::setError("Password too short, six(6) characters minimum");
        }elseif($password_confirm != $password){
            $form::setError("The two(2) passwords do not correspond");
        }

        if($form::isValid()){
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $today = date('Y-m-d');

            $signup = Register::register(['first_name', 'last_name', 'email', 'gender', 'profil', 'password', 'avatar', 'creation_date'], [$first_name, $last_name, $email, $gender, 'Prospect', $password_hash, '/assets/images/avatars/default.png', $today]);
            
            if($signup){

                $to = $email;
                $subject = WEBSITE_NAME . " - ACCOUNT ACTIVATION";
                $token = sha1($first_name.$email);
                
                ob_start();
                require(MAILS . 'activation.mail.php');
                $content = ob_get_clean();
                
                $headers = "From:info@growthminds.com \r\n";
                $headers .= 'MINE-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

                $sendMail = mail($to, $subject, $content, $headers);
                
                if($sendMail){
                    Notify::success("Signup successful, Activation Mails send");
                    Funcs::redirect('/');
                }else{
                    $form::saveInputData();
                    $form::setError("Erreur souvenu lors de l'envoi de mail");   
                }

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

require('html/signup.view.php');