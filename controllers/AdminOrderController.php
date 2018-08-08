<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 02.08.2018
 * Time: 1:14
 */

namespace controllers;
use components\AdminBase;
use components\View;
use models\Catalog;
use models\Order;

class AdminOrderController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $statusList['statusList'] = Order::getStatus();

        $ordersList['ordersList'] = Order::getOrdersList();
        $ordersCount = array_keys($ordersList['ordersList']);
        $ordersCount = count($ordersCount);

        for ($i = 0; $i <$ordersCount; $i++)
        {
            $statusId = $ordersList['ordersList'][$i]['status'];
            $status[$i] = Order::getStatusText($statusId);
            $ordersList['ordersList'][$i]['status'] = $status[$i]['status_text'];
        }
       // echo "<pre>";
       // print_r($ordersList);
       // echo "</pre>";
       $view = new View();
       $view->render('/admin/order/admin.order.index.tmpl', $ordersList+$statusList);
        return true;
    }

    public function actionView($id)
    {

        self::checkAdmin();


        $order['order'] = Order::getOrderById($id);

        $productsInOrder['productsInOrder'] = json_decode($order['order']['products'], true);

        $productsIds = array_keys($productsInOrder['productsInOrder']['productsInCart']);

        $productsInCart = $productsInOrder['productsInOrder'];

        $products['products'] = Catalog::getProductsByIds($productsIds);

      // echo "<pre>";
      // print_r($order);
      // echo "<br>";
      // print_r($productsInCart);
      // echo "<br>";
      // print_r($productsIds);
      // echo "<br>";
      // print_r($products);
      // echo "</pre>";



        $view = new View();
        $view->render('/admin/order/admin.order.view.tmpl', $order+$productsInCart+$products);
        return true;
    }

    public function actionDelete($id)
    {

        self::checkAdmin();

        $order['order'] = Order::getOrderById($id);


        if (isset($_POST['submit'])) {

            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }


        $view = new View();
        $view->render('/admin/order/admin.order.delete.tmpl', $order);
        return true;
    }


    public function actionUpdateStatus()
    {
        self::checkAdmin();

        if (isset($_POST['updateStatus'])){
            $id = $_POST['orderId'];
            $orderStatus = $_POST['orderStatus'];
            //print_r($id);
            //print_r($orderStatus);
            Order::updateOrderStatus($id, $orderStatus);


        }


        header("Location: /admin/order");
    }

}