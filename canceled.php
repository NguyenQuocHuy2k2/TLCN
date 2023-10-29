<?php 
require "config.php";
require "models/db.php";
require "models/order.php";
require "models/orderdetail.php";

$order = new Order;

if(isset($_GET['order_id'])){
    $order->CanceledOrder($_GET['order_id']);
    header('location:./orders.php?status=sd');
}
