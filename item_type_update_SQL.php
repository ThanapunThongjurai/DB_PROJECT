<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$item_type = $_POST['item_type'];
$item_type_id = $_POST['item_type_id'];

$inster_item = $conn->prepare("UPDATE `item_type` SET `item_type_name`='$item_type' WHERE `item_type_id`='$item_type_id';");
$inster_item->execute(); 
header("Location:admin.php?msg=item_type"); 