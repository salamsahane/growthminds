<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/program/all-programs";

if(!empty($this->view_data) && isset($this->view_data['id'])){

    $program = Model::find('program_name', 'programs', 'program_id', $this->view_data['id']);

    if($program != null){

        $query = new QueryBuilder;

        $query
            ->from('fields')
            ->where('program_id = :program_id')
            ->setParam('program_id', $this->view_data['id']);

        $hasField = $query->count('field_id');
        
        if($hasField > 0){
            $programFields = $query->fetchAll();
            $req = new QueryBuilder;
            foreach($programFields as $programField){
                $req
                ->from("specialties")
                ->where('field_id = :field_id')
                ->setParam("field_id", $programField['field_id']);
    
                $hasSpecialty = $req->count('specialty_id');
    
                if($hasSpecialty > 0){
                    $req
                        ->delete("specialties")
                        ->where('field_id = :field_id')
                        ->setParam("field_id", $programField['field_id']);
                    $deleteSpecialty = $req->deleteRecord();
                }
            }
        }

        $query
            ->delete("fields")
            ->where('program_id = :program_id')
            ->setParam("program_id", $this->view_data['id']);
        $deleteField = $query->deleteRecord();
            
        if($deleteField){
            $query
                ->delete('programs')
                ->where('program_id = :program_id')
                ->setParam('program_id', $this->view_data['id']);
            $delete = $query->deleteRecord();
    
            if($delete){
                Notify::success("Program Deleted");
                Funcs::redirect($path);
            }else{
                Notify::danger("Error occur");
                Funcs::redirect($path);
            }
        }

    }else{
        Notify::danger("Invalid Parameters");
        Funcs::redirect($path);
    }

}else{
    Notify::danger("Invalid Parameters");
    Funcs::redirect($path);
}