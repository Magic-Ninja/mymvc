<?php

namespace controllers;

use models\Catalog;
use components\View;

class CatalogController
{

    public function actionIndex()
    {
        $categories['categories'] = Catalog::getCategoriesList();
        $latestProducts['latestProducts'] = Catalog::getLatestProducts(3);

        $view = new View();
        $view->render('/site/catalog/catalog.index.tmpl', $latestProducts+$categories);

        return true;
    }

    public function actionShowAjax()
    {
        if(isset($_POST['num'])) {
            $num = $_POST['num'];
            $latestProductsAjax['latestProductsAjax'] = Catalog::loadProductsAjax($num);
            $view = new View();
            $view->render('/site/catalog/catalog.load.tmpl', $latestProductsAjax);
            //echo "<pre>";
            //print_r($latestProductsAjax);
            //echo "</pre>";
            //echo $num;
            return true;
        }

    }
    
    public function actionCategory($categoryId)
    {
        $categories['categories'] = Catalog::getCategoriesList();
        $categoryProducts['categoryProducts'] = Catalog::getProductsListByCategory($categoryId);

        $view = new View();
        $view->render('/site/catalog/catalog.category.index.tmpl', $categoryProducts+$categories);

        return true;
    }

    public function actionView($productId)
    {

        $categories['categories'] = Catalog::getCategoriesList();
        $product['product'] = Catalog::getProductById($productId);
        Catalog::lastViewedProduct($productId);
        $view = new View();
        $view->render('/site/catalog/catalog.product.tmpl', $product+$categories);

        return true;
    }

}
