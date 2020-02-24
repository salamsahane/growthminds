<?php
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;

Filter::Auth();

$person = Auth::getAuth();


$query = (new QueryBuilder)
                ->from("courses")
                ->orderBy('course_name', 'asc')
                ->limit(8);
$courses = $query->fetchAll();

require 'html/home.view.php';