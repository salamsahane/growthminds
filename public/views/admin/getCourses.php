<?php

use App\Models\QueryBuilder;

require('../../../vendor/autoload.php');

if(isset($_POST['course']) && !empty($_POST['course'])){
    extract($_POST);

    $query = (new QueryBuilder)
                    ->select('course_id', 'course_name')
                    ->from('courses')
                    ->where("course_name LIKE '%{$course}%'");
    $result = $query->count('course_id');
    $courses = $query->fetchAll();

    if($result > 0){
        foreach($courses as $row){
            echo "<a href='#' class='list-group-item list-group-item-action'>"  . $row['course_name'] . "<span style='opacity:0;' class='mask'>" . $row['course_id'] . "</span></a>";
        }
    }else{ 
        echo '<span class="list-group-item list-group-item-action">No Match Result</span>';
    }

}else{
    echo '<span class="list-group-item list-group-item-action">Paramètre Invalide</span>';
}