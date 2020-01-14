<?php
use App\Models\Auth\Auth;
use App\Utils\Filter;

//Filter::guest();

$user = Auth::getAuth();

require 'html/home.view.php';