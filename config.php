<?php 
/** The name of the database for WordPress */
define( 'DB_NAME', 'bandoan' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', '' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** port number of DB */
define( 'PORT', 3306);
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
?>

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "QMDPZXRE"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "KOOETMNNKHBDNPRBMVTKSRHYBPDNCZEQ"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "localhost/123/thanks.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
$apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
?>