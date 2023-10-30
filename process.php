<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $couponCode = $_POST['couponCode']; 
    
    $_SESSION['couponCode'] = $couponCode;

}else{
    $_SESSION['couponCode'] = null;
}

?>
