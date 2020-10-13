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
$inster_track = $conn->prepare("INSERT INTO `track` (`track_id`, `track_username`, `track_owner`, `track_no`, `track_status`) 
    VALUES (NULL, '$user_username', NULL, NULL, 'wait');");
$inster_track->execute();
$max_track= $conn->prepare("SELECT max(track_id) as track_id FROM `track` WHERE track_username = '$user_username'");
$max_track->execute();
while ($result = $max_track->fetch()) {
    $max_track_id = $result['track_id'];
}
echo $max_track_id;
