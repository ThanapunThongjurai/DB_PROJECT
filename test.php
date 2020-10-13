<?php
session_start();
include("connect.php");
/*
$dttm = Date("Y-m-d G:i:s");
$user_username = $_SESSION['user_username'];

//insert payment
$inster_paymebr = $conn->prepare("INSERT INTO `payment` (`pay_id`, `pay_username`, `pay_status`, `pay_price`, `pay_time`, `payimagelocation`) 
    VALUES (NULL, '$user_username', 'wait', NULL, '$dttm', NULL);");
$inster_paymebr->execute();

*/
$user_username = $_SESSION['user_username'];
$stmt = $conn->prepare("SELECT max(pay_id) as pay_id FROM `payment` WHERE pay_username = '$user_username'");
$stmt->execute();   
while ($result = $stmt->fetch()) {
    $max_pay_id= $result['pay_id'];
}
echo $max_pay_id;