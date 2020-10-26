<?php
session_start();
require_once('connect.php'); 
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
}

echo $track_id = $_GET["track_id"];
echo $track_owner = $_POST["track_owner"];
echo $track_no = $_POST["track_no"];

$inster_user = $conn->prepare("UPDATE `track` SET
`track_owner`='$track_owner',
`track_no`='$track_no',
`track_status`='send'
WHERE track_id='$track_id';");
$inster_user->execute();
header("Location: order.php");
