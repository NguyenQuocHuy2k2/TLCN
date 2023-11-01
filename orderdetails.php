<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
}
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sd') {
        echo "<script> alert('Hủy đơn hàng thành công'); </script>";
    }
    if ($_GET['status'] == 's') {
        echo "<script> alert('Đặt hàng thành công'); </script>";
    }
    if ($_GET['status'] == 'sr') {
        echo "<script> alert('Nhận hàng thành công'); </script>";
    }
}
ob_end_flush();
?>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="order-id">MÃ ĐƠN HÀNG</th>
                                            <th class="product-thumbnail">SẢN PHẨM</th>
                                            <th class="product-thumbnail">GIẢM GIÁ</th>
                                            <th class="product-action" style="width:3%">HÀNH ĐỘNG</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
                                        foreach ($getInfoByUsername as $value) {
                                            $user_id = $value['user_id'];
                                        }
                                        $getOrderByUserId = $order->getOrderByUserID($user_id);                             
                                        $orderDetails = $orderdetail->getAllOrderDetailsByOrderId($_GET['order_id']);
                                            ?>
                                            <tr>
                                                <td class="order-id"><strong>
                                                        <?php echo $_GET['order_id']; ?>
                                                    </strong></td>
                                                <td class="product-thumbnail">
                                                    <?php foreach ($orderDetails as $orderDetail): ?>
                                                        <?php if($orderDetail['order_id']==$_GET['order_id']): ?>
                                                        <div class="product-thumbnail-item">
                                                            <img src="img/<?php echo $orderDetail['product_image']; ?>"
                                                                alt="<?php echo $orderDetail['product_name']; ?>">
                                                            <div class="product-thumbnail-info">
                                                                <h5><a
                                                                        href="detail.php?id=<?php echo $orderDetail['product_id']; ?>&type_id=<?php echo $orderDetail['type_id']; ?>">
                                                                        <?php echo $orderDetail['product_name']; ?>
                                                                    </a></h5>
                                                                <h5>
                                                                    <?php echo number_format($orderDetail['discount_price'], 0, ',', '.'); ?>đ
                                                                </h5>
                                                                <?php $totalPrice = $orderDetail['discount_price'] * $orderDetail['product_quantity']; ?>
                                                                <h5>
                                                                    <p>Số lượng: x
                                                                        <?php echo $orderDetail['product_quantity']; ?>
                                                                    </p>
                                                                </h5>
                                                                <h5>
                                                                    <p>Tổng:
                                                                        <?php echo number_format($totalPrice, 0, ',', '.'); ?>đ
                                                                    </p>
                                                                </h5>
                                                                <hr style="border-top:1px solid gray;">
                                                            </div>
                                                        </div>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $orders = $order->getOrderByOrderID($_GET['order_id']); foreach($orders as $orderInfo)?>
                                                <td class="product-action">
                                                    <strong>
                                                        <p>Giảm giá:
                                                            <?php
                                                            if ($orderInfo['coupon_discount'] > 100) {
                                                                echo number_format(-$orderInfo['coupon_discount'], 0, ',', '.');
                                                            } else {
                                                                echo number_format(-($orderInfo['coupon_discount'] * ($orderInfo['total'] / (1 - ($orderInfo['coupon_discount'] / 100)))) / 100, 0, ',', '.');
                                                            }
                                                            ?>đ
                                                    </strong>
                                                </td>
                                                <td class="product-action">
                                                    <button class="btn btn-info">
                                                        <a style="text-decoration: none;color:#fff;" href="./orders.php">
                                                            <i class="fa fa-arrow-left"></i> QUAY LẠI
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                       
                                    </tbody>
                                </table>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<?php include "footer.php" ?>