<?php
class Status extends Db
{
    public function getAllStatus(){
        $sql = self::$connection->prepare("SELECT * FROM `status`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
?>