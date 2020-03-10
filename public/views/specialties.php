<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Funcs;

$person = Auth::getAuth();

if($person != null && $person->profil == "instructor"){
    Funcs::redirect("/instructor/instructor-profile/" . $person->person_id);
}

$query = (new QueryBuilder)
                ->from("specialties")
                ->orderBy('specialty_name', 'asc');
$specialties = $query->fetchAll();
$number_specialties = $query->count('specialty_id');

$sql = (new QueryBuilder)
                ->from("programs")
                ->orderBy('program_name', 'asc');
$programs = $sql->fetchAll();
require("html/specialties.view.php");