<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 17.07.2018
 * Time: 22:00
 */

namespace controllers;

use models\User;
use components\View;

class UserController
{
    // Action для регистрации
    public function actionRegister()
    {

        $result ['result'] = false;
        $errors ['errors'] = false;


        if (isset($_POST['submit'])) {
            $name = $_POST ['name'];
            $email = $_POST ['email'];
            $password = $_POST ['password'];


            if (User::checkEmailExists($email)) {
                $errors['errors'] = 'Такой емайл уже используется';
            }

            if ($errors ['errors'] == false) {
                $result['result'] = User::register($name, $email, $password);
            }
        }


        $view = new View();
        $view->render('/site/user/user.register.tmpl', $result+$errors);
        return true;
    }

    // Action для авторизации
    public function actionLogin()
    {
        $errors['errors'] = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors['errors'] = 'Неправильные данные для входа на сайт';
            }else {
                User::auth($userId);
                header("Location: /cabinet");
            }
        }
        $view = new View();
        $view->render('/site/user/user.login.tmpl', $errors);
        return true;
    }

    // Action для выхода
    public function actionLogout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['lastViewedProduct']);
        header("Location: /");
    }

}