<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Utils\{
    Filter,
};

Filter::guest('admin');

$person = Auth::getAuth();

$instructors = Model::getAll('persons', 'profil = ?', 'instructor', 'first_name');

require("html/instructors.view.php");