<?php
require "config.php";
require "models/db.php";
require "models/order.php";

$order = new Order;


if (isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $order->UpdatedStatusByOrderID($order_id, $status);
    header('location:orders.php');
}
