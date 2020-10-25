<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$track_owner_id = $_GET['track_owner_id'];
$stmt = $conn->prepare("DELETE FROM `track_owner_id` WHERE track_owner_id = '$track_owner_id'");
$stmt->execute(); 
header("Location: admin.php?msg=track_owner")
?>