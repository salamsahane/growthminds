<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/specialty/all-specialties";

if(isset($this->view_data['id'])){

    $specialty = Model::find('specialty_name', 'specialties', 'specialty_id', $this->view_data['id']);

    if($specialty != null){

        $query = new QueryBuilder;
        $query
            ->delete('specialties')
            ->where('specialty_id = :specialty_id')
            ->setParam('specialty_id', $this->view_data['id']);

        $delete = $query->deleteRecord();

        if($delete){
            Notify::success("Specialty deleted");
            Funcs::redirect($path);
        }else{
            Notify::danger("Invalid Parameter");
            Funcs::redirect($path);
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect($path);
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect($path);
}