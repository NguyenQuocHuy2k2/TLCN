<?php
session_start();

// Kiểm tra xem biến $total_cost có tồn tại trong SESSION không
if (isset($_SESSION['cart'])) {
    $total_cost = $_SESSION['cart']['total_cost'];

    // In giá trị $total_cost ra màn hình
    echo "Total Cost: " . $total_cost;
}
?>
