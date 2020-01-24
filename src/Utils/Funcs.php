<?php
namespace App\Utils;

use App\Models\Auth\Auth;
use \DateTime;

class Funcs{

    public static function redirect(string $path)
    {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: " . $path);
        exit;
    }

    public static function is_logged_in(): bool
    {
        $user = Auth::getAuth();
        if($user !== null){
            return true;
        }
        return false;
    }

    public static function is_super_admin(): bool
    {
        $user = Auth::getAuth();
        if($user->person_id == 2){
            return true;
        }
        return false;
    }

    public static function random(int $length):string
    {
        $string = '';
        $chaine = 'abcdefghijklmnopqrstuvwxyz0123456789';
        srand((float) microtime() * 1000000);
        for ($i = 0; $i < $length; ++$i) {
            $string .= $chaine[rand() % strlen($chaine)];
        }

        return $string;
    }

    public static function timeDifference(int $start_timestamp, int $end_timestamp): String
    {
        $start_time = new DateTime("@$start_timestamp");
        $end_time = new DateTime("@$end_timestamp");

        $interval = $start_time->diff($end_time);
        return $interval->format('%H');
    }

}