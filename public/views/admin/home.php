<?php

use App\Models\Auth\Auth;
use App\Utils\Filter;

Filter::guest('admin');

$person = Auth::getAuth();

require('html/home.view.php');