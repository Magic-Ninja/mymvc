<?php

namespace controllers;

use models\Catalog;
use components\View;

class CatalogController
{

    public function actionIndex()
    {
        $categories['categories'] = Catalog::getCategoriesList();
        $latestProducts['latestProducts'] = Catalog::getLatestProducts(10);

        $view = new View();
        $view->render('/catalog/catalog.index.tmpl', $categories, $latestProducts);

        return true;
    }
    
    public function actionCategory($categoryId)
    {
        $categories['categories'] = Catalog::getCategoriesList();
        $categoryProducts['categoryProducts'] = Catalog::getProductsListByCategory($categoryId);
       
        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

    public function actionView($productId)
    {

        $categories['categories'] = Catalog::getCategoriesList();
        $product['product'] = Catalog::getProductById($productId);

        require_once(ROOT . '/views/product/view.php');

        return true;
    }

}
