<?php

use App\Controllers\Router;

session_start();

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);
define('MODEL', SRC . 'Models' . DIRECTORY_SEPARATOR );
define('CONTROLLER', SRC . 'Controllers' . DIRECTORY_SEPARATOR );
define('VIEW', ROOT . 'public' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('LIBRARY', ROOT . 'libraries' . DIRECTORY_SEPARATOR);
// define('MODEL', SRC . 'Models' . DIRECTORY_SEPARATOR );

require('../vendor/autoload.php');

new \App\Core\App;

// $router = new Router(__DIR__ . '/views');
// $router
//     ->get('/', 'home', 'home')
//     ->get('/Home', 'home', 'Home')
//     ->get('/login', 'login', 'login')
//     ->run();