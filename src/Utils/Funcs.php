<?php
namespace App\Utils;

use App\Models\Auth\Auth;

class Funcs{

    public static function redirect(string $path)
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $path);
        exit;
    }

    public static function is_logged_in()
    {
        $user = Auth::getAuth();
        if($user !== null){
            return true;
        }
        return false;
    }

}