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
use models\Order;
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

        $userOrdersList['userOrdersList'] = Order::getUserOrdersList($userId);
        $userOrdersCount = array_keys($userOrdersList['userOrdersList']);
        $userOrdersCount = count($userOrdersCount);

        for ($i = 0; $i < $userOrdersCount; $i++)
        {
            $statusId = $userOrdersList['userOrdersList'][$i]['status'];
            $status[$i] = Order::getStatusText($statusId);
            $userOrdersList['userOrdersList'][$i]['status'] = $status[$i]['status_text'];
        }
        //echo "<pre>";
        //print_r($userOrdersCount);
        //echo "</pre>";
        $view = new View();
        $view->render('/site/cabinet/cabinet.index.tmpl', $user+$lastViewedProduct+$userOrdersList);
        return true;
    }

}