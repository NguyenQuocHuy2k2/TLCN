<?php
class OrderDetail extends Db
{
    public function getAllOrderDetails(){
        $sql = self::$connection->prepare("SELECT * FROM order_details");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrderDetailsByOrderId($order_id){
        $sql = self::$connection->prepare("SELECT * FROM order_details WHERE order_id=? ORDER BY order_id DESC");
        $sql->bind_param("i", $order_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function addOrderDetail($order_id, $product_name, $product_price, $product_quantity, $cost, $product_id, $type_id, $product_image)
    {
        $sql = self::$connection->prepare("INSERT INTO `order_details`(`order_id`, `product_name`,`discount_price`,`product_quantity`, `cost`, `product_id`, `type_id`, `product_image`) VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("isiiiiis", $order_id, $product_name, $product_price, $product_quantity, $cost, $product_id, $type_id, $product_image);
        $sql->execute();
    }
    public function DeleteOrderDetailByID($order_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `order_details` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

    public function get3OrderDetailsByOrderId($order_id,$page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `order_details` WHERE `order_id`=?
        LIMIT ?, ?");
        $sql->bind_param("iii",$order_id, $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
