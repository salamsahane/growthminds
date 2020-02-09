<?php

use App\Core\Model;
use App\Models\Auth\Auth;
use App\Models\QueryBuilder;
use App\Utils\Filter;
use App\Utils\Form;
use App\Utils\Funcs;
use App\Utils\Image;
use App\Utils\Notify;

Filter::guest('admin');

$person = Auth::getAuth();

if(!empty($this->view_data)){

    //$course = Model::find('course_name', 'courses', 'course_id', $this->view_data['course_id']);

    $q = (new QueryBuilder)
                ->from('specialties')
                ->where('specialty_id = :specialty_id')
                ->setParam("specialty_id", $this->view_data['specialty_id']);
    $specialty = $q->fetchObj();

    if($specialty != null){
        //change Cover Image
        if(isset($_POST['change_cover'])){
            $form_pic = new Form;
            if(!empty($_FILES['coverpicture']['name'])){
                $fileName = $_FILES['coverpicture']['name'];
                $fileTemp = $_FILES['coverpicture']['tmp_name'];
                
                //image sources
                $sourceProperties = getimagesize($fileTemp);
    
                //get file extension
                $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
                $authorise_extension = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif'];
        
                $file_destination = 'assets/images/specialty/' . $this->view_data['specialty_id'];
                $file_path = $file_destination . '/' . $fileName . '.' . $file_extension;
                
                //image properties
                $uploadImageType = $sourceProperties[2];
                $sourceImageWidth = $sourceProperties[0];
                $sourceImageHeight = $sourceProperties[1];

                if($fileTemp != ''){
                    if (!in_array($file_extension, $authorise_extension)) {
                        $form_pic::setError('Image format not accepted');
                    }elseif (!file_exists($file_destination)) {
                        mkdir($file_destination, 0755, true);
                    }
        
                    if($form_pic::isValid() && Image::resize($uploadImageType, $fileTemp, $sourceImageWidth, $sourceImageHeight, 300, 300, $file_path)){
                        $query = new QueryBuilder;
                        $query
                            ->update('specialties')
                            ->set("specialty_image = '/{$file_path}'")
                            ->where('specialty_id = :specialty_id')
                            ->setParam('specialty_id', $this->view_data['specialty_id']);
        
                        $result = $query->updateTable();
        
                        if($result){
                            Notify::success("Cover Picture Changed");
                            Funcs::redirect('/admin/specialty/specialty-infos/' . $this->view_data['specialty_id']);
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

        if(isset($_POST['update_infos'])){
            $form_update = new Form;
        
            $form_update::setFields(['specialty_name', 'specialty_price', 'description']);
            if($form_update::NotEmpty()){
        
                extract($_POST);
                
                if(strlen($specialty_name) < 3){
                    $form_update::setError('Specialty Name too short');
                }

                if(!ctype_digit($specialty_price) || strlen($specialty_price) < 4){
                    $form_update::setError("Price invalid");
                }
        
                if(strlen($description) < 40){
                    $form_update::setError("Specialty description short");
                }
        
                if($form_update::isValid()){
                    
                    $query = new QueryBuilder;
                    $query
                        ->update('specialties')
                        ->set("specialty_name = '{$specialty_name}', specialty_price = '{$specialty_price}', specialty_description = :description")
                        ->where('specialty_id = :specialty_id')
                        ->setParam('specialty_id', $specialty->specialty_id)
                        ->setParam('description', $description);
                    $update = $query->updateTable();
        
                    if($update){
                        Notify::success("Information Updated");
                        Funcs::redirect('/admin/specialty/specialty-infos/' . $this->view_data['specialty_id']);
                    }else{
                        $form_update::setError("An error has occur");
                    }
                }
        
            }else{
                $form_update::setError("Fill all the fields please");
            }
        
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect('/admin/course/course-infos/' . $this->view_data['course_id']);
    }
    
    
}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect('/admin/course/course-infos/' . $this->view_data['course_id']);
}

require('html/edit-specialty.view.php');