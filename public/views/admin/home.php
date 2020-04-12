<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Funcs;

Filter::guest('admin');

$person = Auth::getAdminAuth();

if($person->profil != "admin"){
    Auth::logout("/admin/account/login");
}

$req = (new QueryBuilder)
            ->from("persons")
            ->where("profil = :profil")
            ->setParam('profil', 'prospect')
            ->orderBy("person_id", 'desc')
            ->limit(10);

$numberProspects = $req->count('person_id');
$prospects = $req->fetchAll();

//get number of propects male and female
function getNumberProspectByRef(string $ref, $value)
{
    $q = (new QueryBuilder)
        ->from("persons")
        ->where("profil = :profil AND $ref = :$ref")
        ->setParam('profil', 'prospect')
        ->setParam($ref, $value);
    return $q->count('person_id');
}

$numberVisits = Funcs::getVisits();
$numberUniqueVisitors = Funcs::getUniqueVisitors();
$uniqueVisitorsProgress = ($numberUniqueVisitors / 5000) * 100;
$visitsProgress = ($numberVisits / 10000) * 100;
require('html/home.view.php');