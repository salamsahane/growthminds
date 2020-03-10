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

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";

$browser = get_browser(null, true);

dd($browser);

die();

require 'html/home.view.php';