<?php

use App\Models\Auth\Auth;
use App\Utils\Filter;
use App\Utils\Funcs;

Filter::guest('admin');

$person = Auth::getAdminAuth();

if($person->profil != "admin"){
    Auth::logout("/admin/account/login");
}

require('html/home.view.php');