<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Utils\Filter;

Filter::guest('admin');

$person = Auth::getAuth();

$admins = Model::getAll('persons', 'profil = ?', 'admin');

require('html/all-admins.view.php');