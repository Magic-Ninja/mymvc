<?php

namespace controllers;

use components\View;

class SiteController
{

    public function actionIndex()
    {
        $view = new View();
        $view->render('/site/main/main.index.tmpl', array());

        return true;

    }

}
