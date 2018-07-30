<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 28.06.2018
 * Time: 22:00
 */

return array(
    // Catalog:
    'catalog/category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController
    'catalog/product/([0-9]+)' => 'catalog/view/$1', // actionView в CatalogController
    'catalog/showAjax' => 'catalog/showAjax',
    'catalog' => 'catalog/index', // actionIndex в CatalogController

    // News/Blog:
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index', // actionIndex in NewsController

    // User:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // Admin:
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',
    'admin/login' => 'admin/login',
    'admin/logout' => 'admin/logout',
    'admin' => 'admin/index',

    // Cart:
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add' => 'cart/add/$1',
    'cart/checkout' => 'cart/checkout',
    'cart' => 'cart/index',



    // Index:
    '' => 'site/index', // actionIndex в SiteController
);