<?php

use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Models\Register;
use App\Utils\{
    Filter,
    Form,
    Funcs,
    Notify
};

Filter::guest('admin');

$person = Auth::getAuth();

$query = (new QueryBuilder)->from('specialties');
$specialties = $query->fetchAll();

require("html/all-specialties.view.php");