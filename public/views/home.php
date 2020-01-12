<?php
use App\Models\Auth\Auth;

$user = Auth::getAuth();

require 'html/home.view.php';