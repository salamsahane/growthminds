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
            $_SESSION['auth'] = $user->user_id;
            return $user;
        }

        return null;
    }

    public static function logout()
    {
        session_destroy();
        $_SESSION = [];
        Funcs::redirect('/');
    }

    public function user(): ?Person
    {
        $id = $_SESSION['auth'] ?? null;

        if($id === null){
            return null;
        }

        $query = new QueryBuilder();
        $query
            ->from('users')
            ->where('id = :id')
            ->setParam('id', $id);

        $user = $query->fetchObj(Person::class);

        return $user ?: null;
    }

    public static function getAuth(): ?Person
    {
        return self::user();
    }

}