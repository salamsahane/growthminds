<?php

namespace App\Utils;

class Notify{

    public static function success(string $message): string
    {
        return self::content('success', $message);
    }

    public static function danger(string $message): string
    {
        return self::content('error', $message);
    }

    public static function warning(string $message): string
    {
        return self::content('warning', $message);
    }


    private static function content(string $type, string $message): string
    {
        $script = 'alertify.set("notifier", "position", "top-center");
                        var delay = alertify.get("notifier", "delay");
                        alertify.set("notifier", "delay", 5);
                        alertify.'.$type.'("'.$message.'");
                        alertify.set("notifier", "delay", delay)';
        $_SESSION['alertify'] = '<script>'.$script.'</script>';

        return $_SESSION['alertify'];
    }


}