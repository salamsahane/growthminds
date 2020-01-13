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
            $query
                ->update("persons")
                ->set("active = '1'")
                ->where("person_id = :person_id")
                ->setParam('person_id', $this->view_data['id']);
            
            $result = $query->updateTable();

            if($result){
                Notify::success("Account Activated");
                Funcs::redirect("/home/login");
            }
        }else{
            Notify::danger("Invalid Parameter");
            Funcs::redirect("/");
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect("/");
    }


}