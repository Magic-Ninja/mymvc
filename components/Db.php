<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 04.07.2018
 * Time: 21:59
 */

namespace components;
use PDO;

class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);


        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");
        return $db;
    }
}