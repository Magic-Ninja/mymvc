<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 02.07.2018
 * Time: 0:08
 */

namespace controllers;

use models\News;
use components\View;

//include_once ROOT . '/models/News.php';
//include_once ROOT . '/components/View.php';


class NewsController
{
    public function actionIndex()
    {
        //$newsList = array();
        $newsList['newsList'] = News::getNewsList();
        //echo '<pre>';
        //print_r($newsList);
        //echo  '</pre>';
        $view = new View();
        $view->render('/news/news.index.tmpl', $newsList);
        return true;

    }

    public function actionView($id)
    {
        //$newsItem = array();
        $newsItem['newsItem'] = News::getNewsItemByID($id);
        //echo '<pre>';
        //print_r($newsItem);
        //echo  '</pre>';
        $view = new View();
        $view->render('/news/news.post.tmpl', $newsItem);
        return true;

    }
}