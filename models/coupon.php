<?php

class Coupon extends Db{
    public function getAllCoupon(){
        $sql = self::$connection->prepare("SELECT * FROM `coupons` WHERE `coupon_expired` > NOW()");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCouponAmountByName($coupon_code){
        $sql = self::$connection->prepare("SELECT * FROM `coupons` WHERE `coupon_expired` > NOW() && `coupon_code` = ?");
        $sql->bind_param("s",$coupon_code);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function updateCoupon($coupon_code, $coupon_quantity, $coupon_used, $coupon_remain) {
        $sql = self::$connection->prepare("UPDATE coupons SET coupon_quantity = ?, coupon_used = ?, coupon_remain = ? WHERE coupon_code = ?");
        $sql->bind_param("iiis", $coupon_quantity, $coupon_used, $coupon_remain, $coupon_code);
        $sql->execute();
    }

    public function updateCouponRemain($coupon_remain,$coupon_code) {
        $sql = self::$connection->prepare("UPDATE coupons SET coupon_remain = ? WHERE coupon_code = ?");
        $sql->bind_param("is", $coupon_remain, $coupon_code);
        $sql->execute();
    }
    
    public function getCoupon(){
        $sql = self::$connection->prepare("SELECT * FROM `coupons` ORDER BY coupon_id DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCouponType(){
        $sql = self::$connection->prepare("SELECT coupons_type.type_name, coupons_type.coupon_type FROM coupons INNER JOIN coupons_type ON coupons.coupon_type = coupons_type.coupon_type");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCouponTypeName(){
        $sql = self::$connection->prepare("SELECT * FROM `coupons_type`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function addCoupon($coupon_code, $coupon_type, $coupon_discount, $min_order, $coupon_quantity, $coupon_remain, $coupon_expired) {
        $sql = self::$connection->prepare("INSERT INTO coupons(coupon_code, coupon_type, coupon_amount, min_order, coupon_quantity, coupon_remain,coupon_expired) VALUES(?, ?, ?, ?, ?, ?,?)");

        if (!$sql) {
            die('Câu truy vấn SQL không hợp lệ: ' . self::$connection->error);
        }

        $sql->bind_param("sidiiis", $coupon_code, $coupon_type, $coupon_discount, $min_order, $coupon_quantity, $coupon_remain, $coupon_expired);

        if (!$sql->execute()) {
            die('Lỗi khi thực hiện truy vấn: ' . $sql->error);
        }

        $sql->execute();
    }    
    
    public function deleteCoupon($coupon_id){
        $sql = self::$connection->prepare("DELETE FROM `coupons` WHERE `coupon_id`=?");
        $sql->bind_param("i", $coupon_id);
        $sql->execute();
    }

    public function getCouponByID($coupon_id){
        $sql = self::$connection->prepare("SELECT * FROM `coupons` WHERE coupon_id=?");
        $sql->bind_param("i", $coupon_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function updateCouponByID($coupon_id, $coupon_code, $coupon_type, $coupon_amount, $min_order, $coupon_quantity, $coupon_used, $coupon_remain, $coupon_expired) {
        $sql = self::$connection->prepare("UPDATE coupons SET coupon_code=?, coupon_type=?, coupon_amount=?, min_order=?, coupon_quantity=?, coupon_used=?, coupon_remain=?, coupon_expired=? WHERE coupon_id=?");
        $sql->bind_param("siiiiiisi", $coupon_code, $coupon_type, $coupon_amount, $min_order, $coupon_quantity, $coupon_used, $coupon_remain, $coupon_expired, $coupon_id);
        $sql->execute();
    }
    
}

?>