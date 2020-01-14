<?php

use App\Core\Model;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::auth();

$form = new Form;
if(isset($_POST['reset'])){

    $form::setFields(['email']);

    if($form::NotEmpty()){

        extract($_POST);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $form::setError("E-mail Invalid");
        }

        if($form::isValid()){

            $data = Model::find('person_id', 'persons', 'email', $email);

            if($data != null){
 
                $to = $email;
                $subject = WEBSITE_NAME . " - RESET PASSWORD";
                $token = sha1($data.$email);
                
                ob_start();
                require(MAILS . 'reset-password.mail.php');
                $content = ob_get_clean();
                
                $headers = "From:info@growthminds.com \r\n";
                $headers .= 'MINE-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    
                $sendMail = mail($to, $subject, $content, $headers);
                
                if($sendMail){
                    Notify::success("Reset mail send");
                    Funcs::redirect('/account/login');
                }else{
                    $form::saveInputData();
                    $form::setError("An error occur during the mail sending");   
                }
            }else{
                $form::setError("E-mail don't exist");
            }


        }else{
            $form::saveInputData();
            $form::setError("Invalid E-mail");
        }

    }else{
        $form::setError("Enter your E-mail address please");
    }

}else{
    $form::clearInput();
}

require("html/reset-password.view.php");