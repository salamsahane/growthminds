<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

if(isset($this->view_data['id']) && !empty($this->view_data['id'])){
    $person = Model::find('email', 'persons', 'person_id', $this->view_data['id']);

    if($person != null){

        $query = new QueryBuilder;
        $query
            ->delete('persons')
            ->where('person_id = :person_id')
            ->setParam('person_id', $this->view_data['id']);
        $delete = $query->deleteRecord();

        if($delete){
            Notify::success("Administrator Deleted");
            Funcs::redirect("/admin/account/all-admins");
        }else{
            Notify::danger("An error has occur");
            Funcs::redirect("/admin/account/all-admins");
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect("/admin/account/all-admins");
    }
}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect("/admin/account/all-admins");
}