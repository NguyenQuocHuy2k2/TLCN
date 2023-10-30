<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $couponCode = $_POST['couponCode']; 
    
    $_SESSION['couponCode'] = $couponCode;

}else{
    $_SESSION['couponCode'] = '';
}

// Xử lý mã giảm giá thành công
// ...
// Cuối cùng, thêm mã JavaScript để tải lại trang
echo '<script>window.location.reload();</script>';

?>


