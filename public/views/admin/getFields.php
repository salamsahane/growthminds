<?php

use App\Models\QueryBuilder;

require('../../../vendor/autoload.php');

if(isset($_POST['program']) && !empty($_POST['program'])){

    $query = new QueryBuilder;
    $query
        ->from('fields')
        ->where("program_id = :program_id")
        ->setParam('program_id', $_POST['program']);

    $fields = $query->fetchAll();

    if($query->count('field_id') > 0){
        foreach($fields as $field){
            echo "<option value='" . $field['field_id'] . "'>" . $field['field_name'] . "</option>";
        }
    }else{
        echo "<option value=''>No Field Found</option>";
    }

}else{
    echo "Invalid Parameter";
}