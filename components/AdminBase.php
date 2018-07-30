<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 26.07.2018
 * Time: 22:40
 */

namespace components;
use models\User;


abstract class AdminBase
{
    public  static function checkAdmin()
    {
        $userId = User::checkADminLogged(); //Проверяем авторизацию

        $user = User::getUserById($userId); // Получаем данные о пльзователе

        if ($user['role'] == 'admin') { //Если админ, пускаем в панель
            return true; //
        }

        die('Access denied'); // Если нет, запрещаем доступ
    }

}