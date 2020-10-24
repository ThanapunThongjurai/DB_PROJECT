<?php
session_start();
require_once('connect.php');

$user = $_POST['USERNAME'];
$pass = $_POST['PASSWORD'];

//echo "username: " .  $user . "<br />";
//echo "password: " .  $pass . "<br />";

//$stmt = $conn->prepare("SELECT * FROM user"); // sql command
$stmt = $conn->prepare("SELECT user_username,user_password,user_fullname,user_status FROM `user` WHERE user_username = '$user'");
$stmt->execute();                               // run sql before

$result = $stmt->fetch();

// // $result = $stmt->fetch();

// //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

// while ($result = $stmt->fetch()) {
//     echo "ชื่อ-นามสกุล :: " . $result["user_fullname"] . "<br />";
//     echo '<pre>';
//     print_r($result);
//     echo '</pre>';
// }




if (($user == $result["user_username"]) && ($pass == $result["user_password"]) && $user != "") {

    //echo "ถูกต้อง";
    $_SESSION["user_username"] = $result['user_username'];
    $_SESSION["user_fullname"] = $result['user_fullname'];
    $_SESSION["user_status"] = $result['user_status'];
    //ไม่ทำ password เพราะมันไม่ปลอดภัย
    header("Location: index.php");
} else {
    //echo "ผิด";
    header("Location: login.php?msg=รหัสผิดหรือไม่มีชื่อผู้ใช้");
}
