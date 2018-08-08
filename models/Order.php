<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 01.08.2018
 * Time: 22:35
 */

namespace models;
use components\Db;
use PDO;


class Order
{
    public static function save($userName, $userEmail, $userAddress, $userComment, $userId, $products, $totalPrice, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $totalPrice = $totalPrice['totalPrice'];

        // Текст запроса к БД
        $sql = 'INSERT INTO product_order (user_name, user_email, user_address, user_comment, user_id, products, total_price, status) '
            . 'VALUES (:user_name, :user_email, :user_phone, :user_comment, :user_id, :products, :total_price, :status)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        $result->bindParam(':total_price', $totalPrice, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrdersList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, user_name, user_email, user_address, date, total_price, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_email'] = $row['user_email'];
            $ordersList[$i]['user_address'] = $row['user_address'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['total_price'] = $row['total_price'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    public static function getUserOrdersList($userId)
    {

        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query("SELECT id, date, total_price, status FROM product_order WHERE user_id='$userId' ORDER BY date DESC");
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['total_price'] = $row['total_price'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    public static function getStatus()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, status_id, status_text FROM order_status ORDER BY status_id ASC');
        $statusList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $statusList[$i]['id'] = $row['id'];
            $statusList[$i]['status_id'] = $row['status_id'];
            $statusList[$i]['status_text'] = $row['status_text'];
            $i++;
        }
        return $statusList;

    }

    public static function getStatusText($statusId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT status_text FROM order_status WHERE status_id = :statusId';
        $result = $db->prepare($sql);
        $result->bindParam(':statusId', $statusId, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();



    }

    public static function updateOrderStatus($id, $orderStatus)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product_order SET status = :status WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $orderStatus, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function getOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }


    public static function deleteOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product_order WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}