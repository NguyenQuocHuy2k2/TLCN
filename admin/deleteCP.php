<?php
require "config.php";
require "models/db.php";
require "../models/coupon.php";

$coupon = new Coupon;
if(isset($_GET['coupon_id'])){
    $coupon->deleteCoupon($_GET['coupon_id']);
    header('location:coupons.php?status=sc');
}else{
    header('location:coupons.php?status=sf');
}
