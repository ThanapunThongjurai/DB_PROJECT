<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
}
echo $pay_id = $_GET["pay_id"];
echo $action = $_GET["action"];
if ($action == "ok") {
    $insert_payment = $conn->prepare("UPDATE `payment` SET
    `pay_status`='pay' WHERE pay_id = '$pay_id'");
    $insert_payment->execute();
}

if ($action == "fail") {
    $insert_payment = $conn->prepare("UPDATE `payment` SET
    `pay_status`='wait' WHERE pay_id = '$pay_id'");
    $insert_payment->execute();
}
header("LOCATION:payment_check.php");