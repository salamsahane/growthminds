<?php

use App\Models\Auth\Auth;

$person = Auth::getAuth();



require("html/about.view.php");