<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 22.07.2018
 * Time: 17:06
 */

namespace controllers;
use models\Catalog;
use models\User;
use models\Order;
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

        $userId['userId'] = User::checkLoggedCart();

        $view = new View();
        $view->render('/site/cart/cart.index.tmpl', $products+$totalPrice+$productsInCart+$userId);
        return true;
    }


    public function actionDelete($id)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }


    public static function actionCheckout()
    {
        $userId = User::checkLogged();
        $user['user'] = User::getUserById($userId);
        $productsInCart['productsInCart'] = Cart::getProducts();
        $productsIds = array_keys($productsInCart['productsInCart']);
        $products['products'] = Catalog::getProductsByIds($productsIds);
        $totalPrice['totalPrice'] = Cart::getTotalPrice($products['products']);


        if (isset($_POST['submit'])) {
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userAddress = $_POST['address'];
            $userComment = $_POST['comment'];
            $status = 1;
            Order::save($userName, $userEmail, $userAddress, $userComment, $userId, $productsInCart, $totalPrice, $status);
            Cart::clear();

            header("Location: /cabinet");
            }


        $view = new View();
        $view->render('site/cart/cart.checkout.tmpl', $products+$totalPrice+$productsInCart+$user);
        return true;

    }

}