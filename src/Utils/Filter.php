<?php
namespace App\Utils;

use App\Models\Auth\Auth;

class Filter{

    /**
     * @param ?string $root
     * 
     * @return void
     */
    public static function auth(?string $root = null)
    {
        if(isset($_SESSION['auth']) && !is_null($_SESSION['auth'])){
            $person = Auth::getAuth();
            if(is_null($root)){
                Funcs::redirect('/' . strtolower($person->profil) . '/' . strtolower($person->profil) . '-profile/' . $person->person_id);
            }else{
                Funcs::redirect('/admin');
            }
        }
    } 

    /**
     * @param ?string $root
     * 
     * @return void
     */
    public static function guest(?string $root = null)
    {
        if(!isset($_SESSION['auth']) && is_null($_SESSION['auth'])){
            if(is_null($root)){
                Funcs::redirect('login');
            }else{
                Funcs::redirect('/admin/account/login');
            }
        }
    } 



}