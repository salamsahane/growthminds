<?php
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Funcs;

$person = Auth::getAuth();

Funcs::number_visits();
Funcs::number_uniqueVisitors();

$query = (new QueryBuilder)
                ->from("courses")
                ->orderBy('course_name', 'asc')
                ->limit(8);
$courses = $query->fetchAll();

require 'html/home.view.php';