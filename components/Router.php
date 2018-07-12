<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 01.07.2018
 * Time: 23:08
 */

namespace components;


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    //Возвращаем строку запроса

    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run()
    {
        // Получаем строку запроса

        $uri = $this->getURI();


        // Проверяем наличие запроса в routes.php

        foreach ($this->routes as $uriPattern => $path){

            // Сравниваем $uriPattern и $uri

            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определеям какой контроллер и action обработают запрос

                $segments = explode('/', $internalRoute); // Разбиваем на сегменты

                // Получаем имя контроллера

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                $controllerName = 'controllers'. '\\' . $controllerName;

                // Получаем имя метода/action

                $actionName = 'action'.ucfirst(array_shift($segments));

                // Получаем параметры

                $parameters = $segments;


                // Подключаем файл класса контроллера

               // $controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
               // if (file_exists($controllerFile)) {
                //    include_once ($controllerFile);
               // }


                // Создаём обьект, вызываем метод

               $controllerObject = new $controllerName;
                //$result = $controllerObject->$actionName($parameters);
               $result = call_user_func_array(array($controllerObject, $actionName), $parameters);


               if ($result !=null) {
                   break;
               }


            }


        }

    }


}