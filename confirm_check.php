<?php
session_start();
include("connect.php");

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id_item => $qty) {
        $stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = '$id_item'");
        $stmt->execute();                               // run sql before
        $row = $stmt->fetch();

        
        if ($_SESSION['cart'][$id_item] > $row['item_amount']) {
            $qty = $row['item_amount'];

            //$act = isset($_POST['amount']) ? $_POST['amount'] : '0';

            header("Location: cart.php?act=update");
        }
        else
        {
            header("Location: confirm.php");
        }
    }
}
