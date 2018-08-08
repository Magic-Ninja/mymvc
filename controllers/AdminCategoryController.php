<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 07.08.2018
 * Time: 15:16
 */

namespace controllers;


use components\AdminBase;
use components\View;
use models\Catalog;

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList['categoriesList'] = Catalog::getCategoriesListAdmin();

        $view = new View();
        $view->render('/admin/category/admin.category.index.tmpl', $categoriesList );
        return true;
    }


    public function actionCreate()
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = (isset($_POST['status']) ? 1 : 0);

                $id = Catalog::createCategory($name, $sortOrder, $status);

                header("Location: /admin/category/update/$id");
            }

        $view = new View();
        $view->render('/admin/category/admin.category.create.tmpl', array() );
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category['category'] = Catalog::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = (isset($_POST['status']) ? 1 : 0);

            Catalog::updateCategoryById($id, $name, $sortOrder, $status);

            header("Location: /admin/category");
        }

        $view = new View();
        $view->render('/admin/category/admin.category.update.tmpl', $category );
        return true;
    }


    public function actionDelete($id)
    {

        self::checkAdmin();

        $category['category'] = Catalog::getCategoryById($id);

        if (isset($_POST['submit'])) {

            Catalog::deleteCategoryById($id);

            header("Location: /admin/category");
        }

        $view = new View();
        $view->render('/admin/category/admin.category.delete.tmpl', $category);
        return true;
    }

}