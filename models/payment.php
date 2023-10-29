<?php
class Payment extends Db{
    public function addPayment($order_id, $total_cost, $bankcode, $content, $card_type, $status){
        $sql = self::$connection->prepare("INSERT INTO `payments`(`order_id`,`total_cost`,`bankcode`,`content`,`card_type`,`status`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("iissss", $order_id, $total_cost, $bankcode, $content, $card_type, $status);
        $sql->execute();
    }
}
?>