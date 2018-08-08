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


    public function actionCreate()
    {
        self::checkAdmin();

        $category['category'] = Catalog::getCategoriesList();

        $options = array();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['author'] = $_POST['author'];
            $options['description'] = $_POST['description'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['image'] = '';
            $options['image_thumb'] = '';
            $options['availability'] = (isset($_POST['availability']) ? 1 : 0);
            $options['is_new'] = (isset($_POST['is_new']) ? 1 : 0);
            $options['is_recommended'] = (isset($_POST['is_recommended']) ? 1 : 0);
            $options['status'] = (isset($_POST['status']) ? 1 : 0);

            // echo "<br><br><br><br>";
            // echo "<pre>";
            // print_r($options);
            // echo "</pre>";

            $id = Catalog::createProduct($options);
            header("Location: /admin/product/update/$id");
        }

        $view = new View();
        $view->render('/admin/product/admin.product.create.tmpl', $category);
        return true;
    }




    public function actionUpdate($id)
    {
        self::checkAdmin();
        $product['product'] = Catalog::getProductById($id);
        $category['category'] = Catalog::getCategoriesList();

        $options = array();

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['author'] = $_POST['author'];
            $options['description'] = $_POST['description'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['image'] = '';
            $options['image_thumb'] = '';
            $options['availability'] = (isset($_POST['availability']) ? 1 : 0);
            $options['is_new'] = (isset($_POST['is_new']) ? 1 : 0);
            $options['is_recommended'] = (isset($_POST['is_recommended']) ? 1 : 0);
            $options['status'] = (isset($_POST['status']) ? 1 : 0);

            Catalog::updateProductById($id, $options);

            header("Location: /admin/product/update/$id");
        }

        $view = new View();
        $view->render('/admin/product/admin.product.update.tmpl', $product+$category);
        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        $product['product'] = Catalog::getProductById($id);

        if (isset($_POST['submit'])) {

            Catalog::deleteProductById($id);

            header("Location: /admin/product");
        }

        $view = new View();
        $view->render('/admin/product/admin.product.delete.tmpl', $product);
        return true;
    }

}