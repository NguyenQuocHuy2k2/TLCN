<?php

class Coupon extends Db{
    public function getAllCoupon(){
        $sql = self::$connection->prepare("SELECT * FROM `coupons` WHERE `coupon_expired` > NOW()");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}

?>