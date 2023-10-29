<?php
class Payment extends Db
{
    public function getAllPayments(){
        $sql = self::$connection->prepare("SELECT * FROM `payments` ORDER BY `order_id` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
?>