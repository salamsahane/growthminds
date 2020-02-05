<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\{
    Filter,
};

Filter::guest('admin');

$person = Auth::getAuth();

$query = (new QueryBuilder)->from('courses')->orderBy('course_name', 'asc');
$courses = $query->fetchAll();

require("html/courses.view.php");