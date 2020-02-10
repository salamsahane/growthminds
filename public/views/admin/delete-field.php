<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/field/all-fields";

if(isset($this->view_data['id'])){

    $field = Model::find('field_name', 'fields', 'field_id', $this->view_data['id']);
    
    if($field != null){

        $query = new QueryBuilder;

        $query
            ->from("specialties")
            ->where('field_id = :field_id')
            ->setParam("field_id", $this->view_data['id']);

        $hasSpecialty = $query->count('specialty_id');

        if($hasSpecialty > 0){

            foreach($query->fetchAll() as $row){
                $q = (new QueryBuilder)
                        ->delete("courses_per_specialty")
                        ->where("specialty_id = ?")
                        ->setParam(null, $row['specialty_id']);
                $remove = $q->deleteRecord();
            }

            $query
                ->delete("specialties")
                ->where('field_id = :field_id')
                ->setParam("field_id", $this->view_data['id']);
            $deleteSpecialty = $query->deleteRecord();

        }
        $query
            ->delete('fields')
            ->where('field_id = :field_id')
            ->setParam('field_id', $this->view_data['id']);
        $deleteField = $query->deleteRecord();
        if($deleteField){
            Notify::success("Fields Deleted");
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