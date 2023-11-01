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
                                            <th class="order-id" style="width:5%">MÃ ĐƠN HÀNG</th>
                                            <!-- <th class="product-thumbnail" style="width:13%">SẢN PHẨM</th> -->
                                            <th class="product-cost">THÀNH TIỀN</th>
                                            <th class="product-address">ĐỊA CHỈ</th>
                                            <th class="product-phone">SỐ ĐIỆN THOẠI</th>
                                            <th class="product-checkout">THANH TOÁN</th>
                                            <th class="product-status">TÌNH TRẠNG</th>
                                            <th class="product-date-create">NGÀY ĐẶT HÀNG</th>
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
                                        $perPage = 5;
                                        // Lấy số trang trên thanh địa chỉ
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        // Tính tổng số dòng, ví dụ kết quả là 18
                                        $total = count($getOrderByUserId);
                                        // lấy đường dẫn đến file hiện hành
                                        $url = $_SERVER['PHP_SELF'] . "?user_id=" . $user_id;
                                        $get3OrderByUserID = $order->get3OrderByUserID($user_id, $page, $perPage);
                                        foreach ($get3OrderByUserID as $orderInfo) {
                                            $orderDetails = $orderdetail->getAllOrderDetailsByOrderId($orderInfo['order_id']);
                                            ?>
                                            <tr>
                                                <td class="order-id"><strong>
                                                        <?php echo $orderInfo['order_id']; ?>
                                                    </strong></td>

                                                <td class="product-cost"><strong>
                                                        <?php echo number_format($orderInfo['total'], 0, ',', '.'); ?>đ</td>
                                                </strong>
                                                <td class="product-address"><strong>
                                                        <?php echo $orderInfo['address']; ?>
                                                </td></strong>
                                                <td class="product-phone"><strong>
                                                        <?php echo $orderInfo['phone']; ?>
                                                </td></strong>
                                                <td class="product-checkout"><strong>
                                                        <?php if ($orderInfo['checkout'] == 0) {
                                                            echo 'Chuyển khoản ngân hàng';
                                                        } else {
                                                            echo 'Thanh toán khi nhận hàng';
                                                        } ?>
                                                </td></strong>
                                                <td class="product-status">
                                                    <strong>
                                                        <?php
                                                        $statusInfo = $status->getAllStatus();
                                                        foreach ($statusInfo as $values1) {
                                                            if ($values1['status'] == $orderInfo['status']) {
                                                                echo $values1['status_name'];
                                                            }
                                                        }
                                                        ?>
                                                    </strong>
                                                </td>
                                                <td class="product-date-create">
                                                    <strong>
                                                        <?php echo date_format(date_create($orderInfo['date_create']), "d/m/Y H:i:s"); ?>
                                                    </strong>
                                                </td>
                                                <td class="product-action">

                                                    <button class="btn btn-info" style="margin-bottom:5px;background-color:#FE9705;border-color:#FE9705">
                                                        <a style="text-decoration: none; color:#fff;"
                                                            href="./orderdetails.php?order_id=<?php echo $orderInfo['order_id']; ?>">
                                                            <i class="fa fa-pencil"></i> XEM CHI TIẾT
                                                        </a>
                                                    </button>

                                                    <?php if ($orderInfo['status'] == 4): ?>
                                                        <button class="btn btn-received">
                                                            <a style="text-decoration: none; color:#fff;"
                                                                href="./received.php?order_id=<?php echo $orderInfo['order_id']; ?>">
                                                                <i class="fa fa-check"></i> ĐÃ NHẬN HÀNG
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($orderInfo['status'] == 1 || $orderInfo['status'] == 5 || $orderInfo['status'] == 6): ?>
                                                        <!-- Thêm nút đặt hàng lại cho đơn đã nhận hàng -->
                                                        <?php
                                                        $orderDetails = $orderdetail->getAllOrderDetailsByOrderId($orderInfo['order_id']);
                                                        $productIds = array();

                                                        foreach ($orderDetails as $orderDetail) {
                                                            $productIds[] = $orderDetail['product_id'];
                                                        }

                                                        // Tạo URL với danh sách các ID sản phẩm (ids)
                                                        $ids = implode(',', $productIds);
                                                        $type_id = $protype->getAllProtype();
                                                        foreach ($type_id as $value) {
                                                            $type_id = $value['type_id'];
                                                        }
                                                        ?>
                                                        <button class="btn btn-reorder" style="background-color: #80bb35">
                                                            <a style="text-decoration: none;color:#fff;"
                                                                href="./addcarts.php?id=<?php echo $ids; ?>&type_id=<?php echo $type_id ?>">
                                                                <i class="fa fa-refresh"></i> ĐẶT HÀNG LẠI
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($orderInfo['status'] == 0): ?>
                                                        <button class="btn btn-reorder" style="background-color:red;">
                                                            <a style="text-decoration: none;color:#fff;"
                                                                href="./canceled.php?order_id=<?php echo $orderInfo['order_id']; ?>">
                                                                <i class="fa fa-trash-o"></i> HỦY ĐƠN HÀNG
                                                            </a>
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                            <div class="store-filter clearfix">
                                <!-- <span class="store-qty">Showing 20-100 products</span> -->
                                <ul class="store-pagination">
                                    <?php echo $order->paginate($url, $total, $perPage, $page); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<?php include "footer.php" ?>