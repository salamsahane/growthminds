<?php

use App\Models\Register;

$faker = Faker\Factory::create();

for($i = 1; $i <= 10; $i++){
    $fname = $faker->firstName;
    $lname = $faker->lastName;
    $email = $faker->email;
    $gender = $faker->randomElement(['male', 'female']);
    $profile = 'admin';
    $avatar = '/assets/images/avatars/avatar.png';
    $password = password_hash('1234567890', PASSWORD_DEFAULT);
    $active = $faker->randomElement(['0', '1']);
    $creation = $faker->date();
    
    $admin = Register::register('persons', ['first_name', 'last_name', 'email', 'gender', 'profil', 'password', 'avatar', 'active' ,'creation_date'], '?,?,?,?,?,?,?,?,?', [$fname, $lname, $email, $gender, $profile, $password, $avatar, $active, $creation]);
}

if($admin){
    echo "Okay";
}else{
    echo "Error";
}