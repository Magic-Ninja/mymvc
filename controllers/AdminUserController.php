<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 08.08.2018
 * Time: 22:47
 */

namespace controllers;
use components\AdminBase;
use components\View;
use models\User;

class AdminUserController extends AdminBase
{
    public static function actionIndex()
    {
        self::checkAdmin();

        $users['users'] = User::getUsersList();

        $view = new View();
        $view->render('/admin/user/admin.user.index.tmpl', $users);
        return true;


    }

}