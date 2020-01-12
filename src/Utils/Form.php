<?php

namespace App\Utils;

class Form{

    public static $fields = [];
    public static $errors = [];

    public static function setFields(array $fields)
    {
        foreach($fields as $field){
            self::$fields[] = $field;
        }
    }

    public static function NotEmpty(): bool
    {
        if (count(self::$fields) != 0) {
            foreach (self::$fields as $field) {
                if (empty($_POST[$field]) || trim($field) == '') {
                    return false;
                }
            }
            return true;
        }
    }

    public static function isValid(): bool
    {
        return empty(self::$errors);
    }

    public static function setError(string $error)
    {
        self::$errors[] = $error;
    }

    public static function getErrors()
    {
        if(isset(self::$errors) && count(self::$errors) != 0){
            echo "<div class='alert alert-danger'>";
            foreach(self::$errors as $error){
                echo $error . '<br/>';
            }
            echo "</div>";
        }
    }

    public static function saveInputData(): void
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }
        }
    }

    public static function getInput(string $key): ?string
    {
        return !empty($_SESSION['input'][$key])
          ? $_SESSION['input'][$key]
          : null;
    }

    public static function clearInput(): void
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }

}