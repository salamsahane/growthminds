<?php
namespace App\Utils;

class Filter{

    public static function auth()
    {
        if(isset($_SESSION['auth']) && !is_null($_SESSION['auth'])){
            Funcs::redirect('/');
        }
    } 

    public static function guest()
    {
        if(!isset($_SESSION['auth']) && is_null($_SESSION['auth'])){
            Funcs::redirect('login');
        }
    } 

}