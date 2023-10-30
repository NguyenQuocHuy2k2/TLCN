<?php
class Order extends Db
{

    public function addOrder($user_id, $address, $phone, $coupon_discount, $total, $note, $checkout)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`user_id`, `address`, `phone`, `coupon_discount`, `total`, `note`, `checkout`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("issiisi", $user_id, $address, $phone, $coupon_discount, $total, $note, $checkout);
        $sql->execute();
        $order_id = self::$connection->insert_id;
        return $order_id;
    }
    
    public function getMaxOrderID(){
        $sql = self::$connection->prepare("SELECT MAX(order_id) as max_order_id FROM `orders`");
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['max_order_id']; 
    }

    public function getOrderByUserID($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `user_id`=? ORDER BY `order_id` DESC");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getOrderByOrderID($order_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function DeleteOrderByID($order_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `orders` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

    public function ReceivedOrder($order_id){
        $sql = self::$connection->prepare("UPDATE `orders` SET `status`=1 WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

    public function CanceledOrder($order_id){
        $sql = self::$connection->prepare("UPDATE `orders` SET `status`=5 WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();    
    }

    public function UpdatedStatusByOrderID($order_id, $status) {
        $sql = self::$connection->prepare("UPDATE `orders` SET `status` = ? WHERE `order_id` = ?");
        $sql->bind_param("ii", $status, $order_id);
        return $sql->execute();
    }
    
    public function get3OrderByUserID($user_id,$page, $perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `user_id`=? ORDER BY `order_id` DESC
        LIMIT ?, ?");
        $sql->bind_param("iii", $user_id,$firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function paginate($url, $total, $perPage, $page, $linksLimit = 3)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
    
        // Xác định trang đầu tiên và trang cuối cùng trong phạm vi liên kết
        $firstPage = max(1, $page - floor($linksLimit / 2));
        $lastPage = min($totalLinks, $firstPage + $linksLimit - 1);
    
        // Xử lý mũi tên trái đến trang đầu
        if ($page > 1) {
            $link .= "<li><a href='$url&page=1'>&lt;&lt;</a></li>";
            $link .= "<li><a href='$url&page=" . ($page - 1) . "'>&lt;</a></li>";
        }
    
        for ($j = $firstPage; $j <= $lastPage; $j++) {
            if ($page == $j) {
                $link .= "<li class='active'>$j</li>";
            } else {
                $link .= "<li><a href='$url&page=$j'>$j</a></li>";
            }
        }
    
        // Xử lý mũi tên phải đến trang cuối
        if ($page < $totalLinks) {
            $link .= "<li><a href='$url&page=" . ($page + 1) . "'>&gt;</a></li>";
            $link .= "<li><a href='$url&page=$totalLinks'>&gt;&gt;</a></li>";
        }
    
        return $link;
    }
    
    
}
