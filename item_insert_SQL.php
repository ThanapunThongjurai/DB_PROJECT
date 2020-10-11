<?php
session_start();
require_once('connect.php');

$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_type = $_POST['item_type'];
$item_disc = $_POST['item_disc'];
$item_preview = $_POST['item_preview'];
$item_amount = $_POST['item_amount'];

//$stmt = $conn->prepare("SELECT * FROM user"); // sql command
$stmt = $conn->prepare("SELECT item_name FROM `item` WHERE item_name = '$item_name'");
$stmt->execute();                               // run sql before

$result = $stmt->fetch();
if (($item_name != $result["user_username"]) && $item_name != "") {

    $inster_item = $conn->prepare("INSERT INTO `item` (`id_item`, `item_name`, `item_price`, `item_type`, `item_disc`, `item_preview`, `item_amount`, `imagelocation`) 
    VALUES (NULL, '$item_name', '$item_price', '$item_type', '$item_disc', '$item_preview', '$item_amount', '.png');");
    $inster_item->execute();
    header("Location: admin.php");
} else {
    //echo "ผิด";
    header("Location: item_insert.php?msg=invalid");
}
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
/*  
while($result = $stmt->fetch()) {
    echo "ชื่อ-นามสกุล :: " . $result["user_fullname"] ."<br />";
    
  }
*/
