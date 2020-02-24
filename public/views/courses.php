<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Funcs;

$person = Auth::getAuth();

if($person != null && $person->profil == "instructor"){
    Funcs::redirect("/instructor/instructor-profile/" . $person->person_id);
}

$query = (new QueryBuilder)
                ->from("courses")
                ->orderBy('course_name', 'asc');
$courses = $query->fetchAll();
$number_courses = $query->count('course_id');
require("html/courses.view.php");