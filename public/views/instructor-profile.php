<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Funcs;
use App\Utils\Notify;

Filter::guest();

$person = Auth::getAuth();

$user_exit = Model::find('email', 'persons', 'person_id', $person->person_id);

if($user_exit == null || (int)$this->view_data['instructor_id'] != $person->person_id){
    Notify::danger("Invalid User");
    Funcs::redirect('/');
}

$query = (new QueryBuilder)
                ->from("courses_assign")
                ->where("person_id = :person_id")
                ->setParam('person_id', $person->person_id);
$courses = $query->fetchAll();
$number_courses = $query->count('assign_id');

require("html/instructor-profile.view.php");  