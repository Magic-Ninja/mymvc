<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 22.07.2018
 * Time: 23:49
 */

namespace components;


class Cart
{
    public static function addProduct($id, $amount)
    {
        $id = intval($id);
        $amount = intval($amount);

        // Созадём пустой массив
        $productInCart = array();

        // Проверяем товары в корзине, если корзина пустая, то заполняем массив
        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }
        // Проверяем наличие конкретного товара в корзине, добавляем или корректируем количество
        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id] = $productInCart[$id] + $amount;
        } else {
            $productInCart[$id] = $amount;
        }

        // Записываем в сессию
        $_SESSION['products'] = $productInCart;
        return self::countItems();

    }

    public static function countItems() // Подсчёт количества товаров в корзине
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() // Возвращает массив с ID и количеством товаров
    {
        if (isset($_SESSION['products'])) {
            return($_SESSION['products']);
        }
        return false;
    }

    public static function clear() //Очищаем корзину
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function getTotalPrice($products) // Получаем общую стоимость корзины
    {
        $productsInCart = self::getProducts();

        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function deleteProduct($id) //Удаляем товар с заданным Id из корзины
    {
        $id = intval($id);
        $productsInCart = self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

}