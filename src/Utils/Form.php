<?php

namespace App\Utils;

class Form{

    /**
     * @var array
     */
    public static $fields = [];
    /**
     * @var array
     */
    public static $errors = [];

    /**
     * @param array $fields
     * 
     * @return void
     */
    public static function setFields(array $fields)
    {
        foreach($fields as $field){
            self::$fields[] = $field;
        }
    }

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
    public static function isValid(): bool
    {
        return empty(self::$errors);
    }

    /**
     * @param string $error
     * 
     * @return void
     */
    public static function setError(string $error)
    {
        self::$errors[] = $error;
    }

    /**
     * @return void
     */
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

    /**
     * saveInputData
     *
     * @return void
     */
    public static function saveInputData(): void
    {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'password') === false) {
                $_SESSION['input'][$key] = $value;
            }
        }
    }

    /**
     * getInput
     *
     * @param  string $key
     *
     * @return string
     */
    public static function getInput(string $key): ?string
    {
        return !empty($_SESSION['input'][$key])
          ? $_SESSION['input'][$key]
          : null;
    }

    /**
     * clearInput
     *
     * @return void
     */
    public static function clearInput(): void
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }

}