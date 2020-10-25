<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$item_type = $_GET['item_type'];
$stmt = $conn->prepare("DELETE FROM `item_type` WHERE item_type_id = $item_type");
$stmt->execute();
echo $id_item; 
header("Location: admin.php")
?>