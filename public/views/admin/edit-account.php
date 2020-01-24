<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Form;
use App\Utils\Funcs;
use App\Utils\Notify;

Filter::guest('admin');

$person = Auth::getAuth();

if(isset($_POST['change_picture'])){
    $form_pic = new Form;
    if(!empty($_FILES['profilepicture']['name'])){
        $fileName = $_FILES['profilepicture']['name'];
        $fileTemp = $_FILES['profilepicture']['tmp_name'];

        $file_extension = strrchr($fileName, '.');
        $authorise_extension = ['.png', '.PNG', '.jpg', '.JPG', '.jpeg', '.JPEG'];

        $file_destination = 'assets/images/avatars/' . $person->person_id;
        $file_path = $file_destination . '/' . $fileName;

        if($fileTemp != ''){
            if (!in_array($file_extension, $authorise_extension)) {
                $form_pic::setError('Image format not accepted');
            }elseif (!file_exists($file_destination)) {
                mkdir($file_destination, 0755, true);
            }

            if($form_pic::isValid() && move_uploaded_file($fileTemp, $file_path)){
                $query = new QueryBuilder;
                $query
                    ->update('persons')
                    ->set("avatar = '/{$file_path}'")
                    ->where('person_id = :person_id')
                    ->setParam('person_id', $person->person_id);

                $result = $query->updateTable();

                if($result){
                    Notify::success("Profile Picture Changed");
                    Funcs::redirect('/admin');
                }
            }else{
                $form_pic::setError('An error has occur during uploading');
            }
        }else{
            $form_pic::setError('Select a valid image');
        }
    }else{
        $form_pic::setError('Select an Image');
    }
}

if(isset($_POST['change_password'])){
    $form_pass = new Form;

    $form_pass::setFields(['actual_password', 'new_password', 'new_password_confirm']);
    if($form_pass::NotEmpty()){

        extract($_POST);

        if(!password_verify($actual_password, $person->password)){
            $form_pass::setError("Actual password not correct");
        }

        if(strlen($new_password) < 6){
            $form_pass::setError("New password too short");
        }elseif($new_password_confirm != $new_password){
            $form_pass::setError("The two(2) passwords do not match");
        }

        if($form_pass::isValid()){
            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

            $query = new QueryBuilder;
            $query
                ->update('persons')
                ->set("password = '{$password_hash}'")
                ->where('person_id = :person_id')
                ->setParam('person_id', $person->person_id);
            $update = $query->updateTable();

            if($update){
                Notify::success("Password Changed");
                Funcs::redirect("/admin");
            }else{
                $form_pass::setError("An error has occur");
            }
        }else{
            $form_pass::setError("Invalid Form");
        }

    }else{
        $form_pass::setError("Fill all the fields please");
    }

}

require('html/edit-account.view.php');