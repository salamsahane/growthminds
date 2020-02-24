<?php

use App\Controllers\Router;

session_start();

define('WEBSITE_NAME', 'GrowthMinds');
define('WEBSITE_URL', 'localhost:8000');
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);
define('MODEL', SRC . 'Models' . DIRECTORY_SEPARATOR );
define('CONTROLLER', SRC . 'Controllers' . DIRECTORY_SEPARATOR );
define('VIEW', ROOT . 'public' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('LIBRARY', ROOT . 'libraries' . DIRECTORY_SEPARATOR);
define("MAILS", ROOT . 'public' . DIRECTORY_SEPARATOR . 'mails' . DIRECTORY_SEPARATOR);
// define('MODEL', SRC . 'Models' . DIRECTORY_SEPARATOR );

require('../vendor/autoload.php');

// dd($_SERVER);

new \App\Core\App;
