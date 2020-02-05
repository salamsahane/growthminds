<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\{
    Filter,
};

Filter::guest('admin');

$person = Auth::getAuth();

$query = (new QueryBuilder)->from('courses');
$courses = $query->fetchAll();

require("html/instructors.view.php");