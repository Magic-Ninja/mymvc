<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 26.07.2018
 * Time: 22:53
 */

namespace controllers;


use components\AdminBase;
use components\View;
use models\User;

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin(); //Проверка доступа

        $view = new View();
        $view->render('/admin/main/admin.main.tmpl', array());

        return true;

    }

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
                header("Location: /admin");
            }
        }
        $view = new View();
        $view->render('/admin/main/admin.index.tmpl', $errors);
        return true;
    }

    // Action для выхода
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /admin/login");
    }

}