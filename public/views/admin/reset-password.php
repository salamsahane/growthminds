<?php

use App\Core\Model;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify   
};

Filter::auth('admin');

$form = new Form;
if(isset($_POST['reset'])){
    
    $form::setFields(['email']);
    
    if($form::NotEmpty()){

        extract($_POST);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if($form::isValid()){

            $person_id = Model::find('person_id', 'persons', 'email', $email);

            if($person_id != null){
 
                $to = $email;
                $subject = WEBSITE_NAME . " - RESET PASSWORD";
                $token = sha1($person_id.$email);
                
                ob_start();
                require(MAILS . 'admin/reset-password.mail.php');
                $content = ob_get_clean();
                
                $headers = "From:info@growthminds.com \r\n";
                $headers .= 'MINE-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    
                $sendMail = mail($to, $subject, $content, $headers);
                
                if($sendMail){
                    Notify::success("Reset Mail send");
                    Funcs::redirect('/admin/account/login');
                }else{
                    $form::saveInputData();
                    $form::setError("An error occur during the mail sending");   
                }
            }else{
                $form::setError("E-mail don't exist");
            }

        }else{
            $form::saveInputData();
        }

    }else{
        $form::saveInputData();
        $form::setError("Enter your E-mail");
    }   
    
}else{
    $form::clearInput();
}

require('html/reset-password.view.php');