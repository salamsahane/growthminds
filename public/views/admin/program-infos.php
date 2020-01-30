<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::guest('admin');

$person = Auth::getAuth();

$program = Model::find('program_name', 'programs', 'program_id', $this->view_data['id']);

if($program != null){

    $query = new QueryBuilder;
    $query
        ->from("fields")
        ->where('program_id = :program_id')
        ->setParam('program_id', $this->view_data['id']);
    $fields = $query->fetchAll();

}else{
    Notify::danger("Program Does not exist");
    Funcs::redirect('/admin/program/all-programs');
}

require("html/program-infos.view.php");