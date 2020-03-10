<?php

use App\Utils\Funcs;
use App\Utils\Notify;

if(!isset($_COOKIE['accept-cookies'])){
    setcookie("accept-cookies", "true", time() + 31556926, '/');
    Funcs::redirect($_SERVER['HTTP_REFERER']);
}else{
    Notify::warning("Cookies Already set");
    Funcs::redirect('/');
}