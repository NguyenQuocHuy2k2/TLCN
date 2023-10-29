<?php
session_start();
$total_cost = $_SESSION['total_cost'];
require "config.php";
require "models/db.php";
require "models/order.php";
require "models/user.php";
require "models/product.php";
require "models/orderdetail.php";

$order = new Order;
$user = new User;
$product = new Product;
$orderdetail = new OrderDetail;
?>

<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

/**
 * 
 *
 * @author CTT VNPAY
 */
require_once("config.php");

if (isset($_GET['checkout'])){
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/123/thanks.php";
    $vnp_TmnCode = "QMDPZXRE";//Mã website tại VNPAY 
    $vnp_HashSecret = "KOOETMNNKHBDNPRBMVTKSRHYBPDNCZEQ"; //Chuỗi bí mật

    $order_idmax = $order->getMaxOrderID();
    $vnp_TxnRef = $order_idmax + 1;
    $vnp_OrderInfo = $order_idmax +1;
    $vnp_Amount = $total_cost;
    $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
    $vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount* 100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => "bill payment",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    header('Location: ' . $vnp_Url);
    die();

}