<?php
session_start();
require_once('connect.php');
 
$user_username  = $_SESSION['user_username'];
$user_fullname  = $_REQUEST['user_fullname'];
$user_address = $_REQUEST['user_address'];
$user_email  = $_REQUEST['user_email'];
$user_tel  = $_REQUEST['user_tel'];

$inster_user = $conn->prepare("UPDATE user SET 
user_fullname='$user_fullname',
user_address='$user_address',
user_email='$user_email',
user_tel='$user_tel'
WHERE user_username = '$user_username';");
$inster_user->execute();
header("Location: user_data.php");
