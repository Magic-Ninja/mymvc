<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 28.06.2018
 * Time: 22:00
 */

return array(

    'product/([0-9]+)' => 'catalog/view/$1', // actionView в ProductController
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController

    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index', // actionIndex in NewsController

        '' => 'site/index', // actionIndex в SiteController
);