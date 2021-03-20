<?php
//erros para transporte de API's
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//VERSAO DA API
define('API_VERSION', 'v1.0.0');


// my sql
define('DB_SERVER',    'localhost');
define('DB_USERNAME',    'root');
define('DB_PASSWORD',    '');
define('DB_NAME',    'projetogeral');
define('DB_CHARSET',    'utf8');

// image storage
define('IMG_PATH', 'http://localhost/projetogeral/public/assets/product_images/');