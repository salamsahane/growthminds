<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Funcs;

Filter::guest();

$person = Auth::getAuth();

$user_exit = Model::find('email', 'persons', 'person_id', $person->person_id);

if($user_exit == null || (int)$this->view_data['prospect_id'] != $person->person_id){
    Funcs::redirect('/');
}

$query = (new QueryBuilder)
                ->from("courses")
                ->orderBy('course_name', 'asc')
                ->limit(8);
$courses = $query->fetchAll();

$diff = null;

// while(true){
//     $num1 = rand(0, 5);
//     $num2 = rand(6, 9);
//     $diff = $num2 - $num1;

//     if($diff == 3){
//         echo $num2 . '<br>';
//         echo $num1;
//         break;
//     }
// }


require("html/prospect-profile.view.php");  