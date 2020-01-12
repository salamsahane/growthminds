<?php

namespace App\Models\Auth;

use App\Models\QueryBuilder;
use App\Utils\Funcs;

class Auth{

    public function login(string $email, string $password): ?User
    {

        $query = new QueryBuilder();
        $query
            ->from('users')
            ->where('email = :email')
            ->setParam('email', $email);

        $user = $query->fetchObj(User::class);
  
        // return $user;

        if($user === false){
            return null;
        }

        if(password_verify($password, $user->password)){
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

    public function user(): ?User
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

        $user = $query->fetchObj(User::class);

        return $user ?: null;
    }

    public static function getAuth(): ?User
    {
        return self::user();
    }

}