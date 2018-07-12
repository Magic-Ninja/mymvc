<?php

// FRONT CONTROLLER

// 1. Обшие настройки

ini_set('display_errors' , 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', str_replace( "\\", "/", dirname( dirname( __FILE__ ) ) ));


//require_once (ROOT . '/components/Router.php');


// 3. Установка соединения с БД

//require_once (ROOT . '/components/Db.php');

// 4. Подключение TWIG

require_once (ROOT . '/vendor/autoload.php');


// 5. Вызов Router


$router = new components\Router();
$router->run();
