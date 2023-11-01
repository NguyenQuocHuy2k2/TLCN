<?php
session_start();

if (isset($_GET['id']) && isset($_GET['type_id'])) {
    $ids = explode(',', $_GET['id']);
    $type_ids = $_GET['type_id'];
    
    foreach ($ids as $key => $id) {
       

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
    }
}

header('Location: cart.php?type_id=' . $type_ids);
?>
