<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$id_item = $_GET['id_item'];
$stmt = $conn->prepare("DELETE FROM `item` WHERE id_item = $id_item");
$stmt->execute();
echo $id_item; 
header("Location: admin.php")
?>