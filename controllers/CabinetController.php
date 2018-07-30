<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 18.07.2018
 * Time: 22:39
 */

namespace controllers;
use models\User;
use models\Catalog;
use components\View;


class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user['user'] = User::getUserById($userId);
        if ($_SESSION['lastViewedProduct']) {
            $lastViewedProduct['lastViewedProduct'] = Catalog::getLastViewedProductsByIds($_SESSION['lastViewedProduct']);
        } else {
            $lastViewedProduct['lastViewedProduct'] = 0;
        }
        //echo "<pre>";
        //print_r($_SESSION['lastViewedProduct']);
        //print_r($lastViewedProduct);
        //print_r($idsString);
        //echo "</pre>";
        $view = new View();
        $view->render('/site/cabinet/cabinet.index.tmpl', $user+$lastViewedProduct);
        return true;
    }

}