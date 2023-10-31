<?php
require "config.php";
require "models/db.php";
require "../models/coupon.php";

$coupon = new Coupon;

if (isset($_POST['submit'])) {
    $coupon_id = $_POST['coupon_id'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_type = $_POST['coupon_type'];
    $coupon_amount = $_POST['coupon_discount'];
    $min_order = $_POST['min_order'];
    $coupon_quantity = $_POST['coupon_quantity'];
    $coupon_used = $_POST['coupon_used'];
    $coupon_remain = $_POST['coupon_remain'];
    $coupon_expired = date("Y-m-d", strtotime($_POST['coupon_expired']));
    $coupon->updateCouponByID($coupon_id, $coupon_code, $coupon_type, $coupon_amount, $min_order, $coupon_quantity, $coupon_used, $coupon_remain, $coupon_expired);
    
    header('location:coupons.php');
}

