<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}

$track_owner_id= $_POST['track_owner_id'];
$track_owner_name= $_POST['track_owner_name'];

$inster_item = $conn->prepare("UPDATE `track_owner_id` SET ,`track_owner_name`='$track_owner_name' WHERE `track_owner_id`='$track_owner_id';");
$inster_item->execute(); 
header("Location:admin.php?msg=track_owner"); 