<?php
session_start();
$total_cost = $_SESSION['total_cost'];
$coupon_discount = $_SESSION['couponAmount'];
require "config.php";
require "models/db.php";
require "models/order.php";
require "models/orderdetail.php";
require "models/user.php";
require "models/product.php";

$order = new Order;
$user = new User;
$product = new Product;
$orderdetail = new OrderDetail;


if (isset($_POST['submit'])) {
    $address = $_POST['address'];
    $note = $_POST['note'];
    $phone = $_POST['phone'];
    $checkout = $_POST['payment_method'];
    $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
    foreach ($getInfoByUsername as $value) {
        $user_id = $value['user_id'];
    }
    $ids = $_GET['ids'];
    $ids_array = explode(',', $ids); 
    foreach ($ids_array as $id) :
        $getProductById = $product->getProductById($id);
        foreach ($getProductById as $value) :
            $price = $value['discount_price'];
        endforeach;

    endforeach;
    
    $order_id = $order->addOrder($user_id, $address, $phone, $coupon_discount, $total_cost, $note, $checkout);
    foreach ($ids_array as $id) :
        $getProductById = $product->getProductById($id); 
        foreach ($getProductById as $value) :
            $pro_name = $value['name'];
            $price = $value['discount_price'];
            $type_id = $value['type_id'];
            $pro_image = $value['pro_image'];
        endforeach;
        $quantity = $_SESSION['cart'][$id]; 
        $pro_id = $id;
        $total = $price * $quantity;
        $orderdetail->addorderdetail($order_id,$pro_name, $price, $quantity, $total, $pro_id, $type_id, $pro_image);      
    endforeach;
    foreach ($ids_array as $id) {
        unset($_SESSION['cart'][$id]);
    }
    if($checkout == 1){
        header('location:./orders.php?status=s');
    } else if($checkout == 0){
        $status = 2;
        $order_idmax = $order->getMaxOrderID();
        $order->UpdatedStatusByOrderID($order_idmax, $status);
        header('location:./onlinepayment.php?checkout=' . $checkout);
    }
    
}

