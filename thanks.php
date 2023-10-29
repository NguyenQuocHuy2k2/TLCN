<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
    include "headeruser.php";
} else {
    include "header.php";
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
    <img src="./img/thanks.png" style="height:400px;width:100%" alt="cam-on-ban">
    <label style="display: block; text-align: center; background-color: #80bb35; color: white; border-radius: 4px; padding: 4px; text-transform: uppercase;">
    <strong>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</strong></label>
    <?php
        $order_id = $_GET['vnp_TxnRef'];
        $total_cost = $_GET['vnp_Amount']/100;
        $bankcode = $_GET['vnp_BankCode'];
        $content = $_GET['vnp_OrderInfo'];
        $card_type = $_GET['vnp_CardType'];
        $status_cvt = $_GET['vnp_ResponseCode'];
        $status = 0;
        
        if($status_cvt == '00'){
            $status_bank = 'Thanh toán thành công';
            $status = 3;
        }else{
            $status_bank = 'Thanh toán thất bại';
            $status = 6;
        }
        $payment->addPayment($order_id,$total_cost,$bankcode,$content,$card_type,$status_bank);  
        $order->UpdatedStatusByOrderID($order_id, $status); 
  
    ?>
</body>
<?php include "footer.php" ?>