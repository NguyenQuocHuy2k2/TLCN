<?php
require "config.php";
require "models/db.php";
require "../models/coupon.php"; 

$coupon = new Coupon;
if(isset($_POST['submit'])){
    $coupon_code = $_POST['coupon_code'];
    $coupon_type = $_POST['coupon_type'];
    $coupon_discount = $_POST['coupon_discount'];
    $min_order = $_POST['min_order'];
    $coupon_quantity = $_POST['coupon_quantity'];
    $coupon_expired = date("Y-m-d", strtotime($_POST['coupon_expired']));
    $coupon->addCoupon($coupon_code, $coupon_type, $coupon_discount, $min_order, $coupon_quantity, $coupon_expired);
    $coupon->updateCouponRemain($coupon_quantity, $coupon_code);
    header('location:coupons.php?status=ac');
}