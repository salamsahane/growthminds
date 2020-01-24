<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::auth('admin');

if(!empty($this->view_data) && count($this->view_data) == 3){

    $current_timestamp = (new DateTime())->getTimestamp();
    $interval = Funcs::timeDifference($current_timestamp, $this->view_data['timestamp']) * 60;

    if($interval < 60){

        $email = Model::find('email', 'persons', 'person_id', $this->view_data['id']);
        $token_verify = sha1($this->view_data['id'].$email);

        if($email != null && $token_verify == $this->view_data['token']){

            $form = new Form;
            if(isset($_POST['change_password'])){
                $form::setFields(['new_password', 'new_password_confirm']);
                if($form::NotEmpty()){
                    extract($_POST);

                    if(strlen($new_password) < 6){
                        $form::setError("Password too short");
                    }elseif($new_password_confirm != $new_password){
                        $form::setError("Password do not match");
                    }

                    if($form::isValid()){
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $query = new QueryBuilder;
                        $query
                            ->update('persons')
                            ->set("password = '{$password_hash}'")
                            ->where('person_id = :person_id')
                            ->setParam('person_id', $this->view_data['id']);
                        $update = $query->updateTable();

                        if($update){
                            Notify::success("Password Reset successfully");
                            Funcs::redirect('/admin/account/login');
                        }else{
                            $form::setError("An error has occur");
                        }
                    }
                }else{
                    $form::setError("Fill all the Fields");
                }
            }else{
                $form::clearInput();
            }

        }else{
            Notify::danger("Invalid parameters");
            Funcs::redirect('/admin/account/login');
        }

    }else{
        Notify::warning("Link expired");
        Funcs::redirect('/admin');
    }

}else{
    Notify::danger("Invalid parameters");
    Funcs::redirect('/admin/account/login');
}

require("html/new-password.view.php");