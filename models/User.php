<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 17.07.2018
 * Time: 22:38
 */

namespace models;
use components\Db;
use PDO;


class User
{
    // Регистрация пользователя
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, email, password)'.'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();

    }

    // Проверка не сушествует ли такой же емайл
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return true;
        return false;

    }

    // Проверка сушествования пользователя
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;

    }

    // Запоминаем пользователя и записываем в сессию
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
        $_SESSION['lastViewedProduct'] = array();
    }

    // Если пользователь авторизован, возврашаем его Id. Если нет - возврашаем на страницу входа
    public static  function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static  function checkLoggedCart()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

    }

    public static  function checkAdminLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /admin/login");
    }


    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }



    public static function getUsersList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id, name, email, role FROM user ORDER BY id DESC');
        $userList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $userList[$i]['id'] = $row['id'];
            $userList[$i]['name'] = $row['name'];
            $userList[$i]['email'] = $row['email'];
            $userList[$i]['role'] = $row['role'];
            $i++;
        }
        return $userList;
    }



}