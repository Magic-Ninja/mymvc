<?php

// FRONT CONTROLLER

// Обшие настройки
ini_set('display_errors' , 1);
error_reporting(E_ALL);

session_start();

define('ROOT', str_replace( "\\", "/", dirname( dirname( __FILE__ ) ) ));

// Composer Autoloader
require_once (ROOT . '/vendor/autoload.php');


// Вызов Router
$router = new components\Router();
$router->run();
