<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 28.07.2018
 * Time: 22:08
 */

namespace controllers;


use components\AdminBase;
use components\View;
use models\Catalog;


class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $productList['productList'] = Catalog::getProductsList();
        $view = new View();
        $view->render('/admin/product/admin.product.index.tmpl', $productList);
        return true;
    }

}