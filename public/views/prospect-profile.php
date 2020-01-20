<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Utils\Filter;
use App\Utils\Funcs;

Filter::guest();

$user = Auth::getAuth();

$user_exit = Model::find('email', 'persons', 'person_id', $user->person_id);

if($user_exit == null || (int)$this->view_data['id'] != $user->person_id){
    Funcs::redirect('/');
}

require("html/prospect-profile.view.php");  