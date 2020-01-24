<?php

use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

if(isset($this->view_data['id']) && isset($this->view_data['token'])){
    $query = new QueryBuilder();
    $query
        ->from('persons')
        ->where('person_id = :person_id')
        ->setParam('person_id', $this->view_data['id']);
    $person = $query->fetchAll();

    if($person != null){

        $token_verify = sha1($person['first_name'].$person['email']);

        if($this->view_data['token'] == $token_verify && $person['active'] == 0){

            //set user password
            $rand = rand(8, 12);
            $password = Funcs::random($rand);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            //send mail contenting login information
            $to = $person['email'];
            $subject = WEBSITE_NAME.' - AUTH INFORMATIONS';

            ob_start();
            require(MAILS . 'admin/auth_infos.mail.php');
            $content = ob_get_clean();

            $headers = "From:info@growthminds.com \r\n";
            $headers .= 'MINE-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            $sendMail = mail($to, $subject, $content, $headers);

            if($sendMail){
                $query
                    ->update("persons")
                    ->set("active = '1', password = '{$password_hash}'")
                    ->where("person_id = :person_id")
                    ->setParam('person_id', $this->view_data['id']);
                
                $result = $query->updateTable();

                Notify::warning("Account Activated, Authentification information mail send");
                Funcs::redirect("/admin");
            }else{
                Notify::danger("An error has occur during the mail sending");
                Funcs::redirect("/admin");
            }
        }else{
            Notify::danger("Invalid Parameter token active");
            Funcs::redirect("/admin");
        }
    }else{
        Notify::danger("Invalid Parameter person");
        Funcs::redirect("/admin");
    }
}else{
    Notify::danger("Invalid Parameter param");
    Funcs::redirect("/admin");
}