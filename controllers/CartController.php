<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 22.07.2018
 * Time: 17:06
 */

namespace controllers;
use models\Catalog;
use components\Cart;
use components\View;



class CartController
{
    public function actionAdd()
    {
        if (isset($_POST['submit'])){
            $id = $_POST['productId'];
            $amount = $_POST['addAmount'];
            //print_r($id);
            //print_r($amount);
            Cart::addProduct($id, $amount);
        }

        header("Location: /cart");

    }

    public  function actionIndex()
    {
        $productsInCart['productsInCart'] = Cart::getProducts();

        if ($productsInCart['productsInCart']) {
            $productsIds = array_keys($productsInCart['productsInCart']);
            $products['products'] = Catalog::getProductsByIds($productsIds);
            $totalPrice['totalPrice'] = Cart::getTotalPrice($products['products']);

        } else {
            $products['products'] = 0;
            $totalPrice['totalPrice'] = 0;
        }

        $view = new View();
        $view->render('/site/cart/cart.index.tmpl', $products+$totalPrice+$productsInCart);
        return true;
    }

    public function actionDelete($id)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

}