<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::auth();

$form = new Form;

if(!empty($this->view_data) && isset($this->view_data['id']) && isset($this->view_data['token'])){
    
    $email = Model::find('email', 'persons', 'person_id', $this->view_data['id']);
    $token_verify = sha1($this->view_data['id'].$email);
    
    if($email != null && $token_verify == $this->view_data['token']){
        if(isset($_POST['save_password'])){

            $form::setFields(['password', 'password_confirm']);
        
            if($form::NotEmpty()){
        
                extract($_POST);
        
                if(strlen($password) < 6){
                    $form::setError("Password too short!");
                }elseif($password_confirm != $password){
                    $form::setError("The two(2) passwords do not match");
                }

                if($form::isValid()){
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    
                    $query = new QueryBuilder();
                    $query
                            ->update("persons")
                            ->set("password = '{$password_hash}'")
                            ->where("person_id = :person_id")
                            ->setParam('person_id', $this->view_data['id']);
                    $update = $query->updateTable();

                    if($update){
                        Notify::success("New password set successfully");
                        Funcs::redirect("/account/login");
                    }else{
                        $form::setError("An Error has occur");
                    }
                }else{
                    $form::setError("Invalid Form");
                }
        
            }else{
                $form::setError("Fill all the fields please");
            }
        
        }else{
            $form::clearInput();
        }
    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect('/account/login');
    }
}

require('html/new-password.view.php');