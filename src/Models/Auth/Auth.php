<?php

namespace App\Models\Auth;

use App\Models\QueryBuilder;
use App\Utils\Funcs;

class Auth{

    public function login(string $email, string $password): ?Person
    {

        $query = new QueryBuilder();
        $query
            ->from('persons')
            ->where('email = :email')
            ->setParam('email', $email);

        $user = $query->fetchObj(Person::class);
  
        // return $user;

        if($user === false){
            return null;
        }

        if(password_verify($password, $user->password) && $user->active == 1){
            $_SESSION['auth'] = $user->person_id;
            return $user;
        }

        return null;
    }

    public function adminLogin(string $email, string $password): ?Person{
        $person = $this->login($email, $password);
        if(is_null($person) || $person->profil != 'admin'){
            self::logout();
            return null;
        }
        return $person;
    }

    public static function logout(?string $path = null)
    {
        session_destroy();
        $_SESSION = [];
        if($path != null){
            Funcs::redirect($path);
        }
    }

    public function person(): ?Person
    {
        $id = $_SESSION['auth'] ?? null;

        if($id === null){
            return null;
        }

        $query = new QueryBuilder();
        $query
            ->from('persons')
            ->where('person_id = :person_id')
            ->setParam('person_id', $id);

        $user = $query->fetchObj(Person::class);

        return $user ?: null;
    }

    public static function getAdminAuth(): ?Person
    {
        if(self::person()->profil == "admin"){
            return self::person();
        }else{
            self::logout('/admin/account/login');
        }
    }

    public static function getAuth(): ?Person
    {
        // if(self::person()->profil != "admin"){
        //     return self::person();
        // }else{
        //     self::logout('/account/login');
        // }
        return self::person();
    }

}