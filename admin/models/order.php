<?php
class Order extends Db
{
    public function getAllOrdersDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` ORDER BY `order_id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }

    public function get10OrdersDESC($page,$perPage)
    {
        // Tính số thứ tự trang bắt đầu
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM `orders` ORDER BY `order_id` DESC
        LIMIT ?, ?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAllOrders()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` ");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrdersDelivered()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `status`=0");
        $sql->execute(); //return an object 
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrdersHasDelivered()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `status`=1");
        $sql->execute(); //return an object 
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }


    public function addOrder($user_id, $pro_id, $pro_name, $quantity, $address, $phone, $status, $total, $note)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`user_id`, `pro_id`, `pro_name`, `quantity`, `address`, `phone`, `status`,`total`,`note`) VALUES(?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("iisisiiis", $user_id, $pro_id, $pro_name, $quantity, $address, $phone, $status, $total, $note);
        return $sql->execute(); //return an object
    }
    public function getAllUserID()
    {
        $sql = self::$connection->prepare("SELECT `user_id` FROM `orders`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllProID()
    {
        $sql = self::$connection->prepare("SELECT `pro_id` FROM `orders`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getOrderByID($order_id){
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function UpdatedStatusByOrderID($order_id, $status) {
        $sql = self::$connection->prepare("UPDATE `orders` SET `status` = ? WHERE `order_id` = ?");
        $sql->bind_param("ii", $status, $order_id);
        return $sql->execute();
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
