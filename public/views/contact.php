<?php

use App\Models\Auth\Auth;
use App\Utils\Form;
use App\Utils\Funcs;
use App\Utils\Notify;

$person = Auth::getAuth();

$form = new Form();

if(isset($_POST['send'])){

    $form::setFields(['name', 'email', 'message']);
    if($form::NotEmpty()){

        extract($_POST);

        if(strlen($name) < 3){
            $form::setError("Name too short");
        }elseif(strpbrk($name, '0123456789') != false){
            $form::setError("Invalid Name");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail invalid");
        }

        if($form::isValid()){
            $to = "cugit@localhost.com";
            $subject = WEBSITE_NAME . " - USER MESSAGE";
    
            $content = $message;
            
            $headers = "From:{$email} \r\n";
            $headers .= 'MINE-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            $sendMail = mail($to, $subject, $content, $headers);
            
            if($sendMail){
                Notify::success("Thanks for your message, contact mail send");
                Funcs::redirect('/');
            }else{
                $form::saveInputData();
                $form::setError("An error occur during the mail sending");   
            }
        }else{
            $form::saveInputData();
        }



    }else{
        $form::setError("Fill all the fields please");
        $form::saveInputData();
    }

}else{
    $form::clearInput();
}

require("html/contact.view.php");