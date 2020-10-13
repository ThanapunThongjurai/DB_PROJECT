<?php
session_start();
require_once('connect.php');

$user = $_POST['USERNAME'];
$pass = $_POST['PASSWORD'];
$email = $_POST['EMAIL'];
$fullname = $_POST['FULLNAME'];
$address = $_POST['ADDRESS'];
$tel = $_POST['TEL'];
$email = $_POST['EMAIL'];




//$stmt = $conn->prepare("SELECT * FROM user"); // sql command
$stmt = $conn->prepare("SELECT user_username,user_fullname FROM `user` WHERE user_username = '$user'");
$stmt->execute();                               // run sql before

$result = $stmt->fetch();
if (($user != $result["user_username"]) && $user != "") {

    $inster_user = $conn->prepare("INSERT INTO `user` (`user_username`, `user_password`, `user_fullname`, `user_address`, `user_tel`, `user_status`,`user_email`) 
                                VALUES ('$user', '$pass', '$fullname', '$address', '$tel', '0','$email');");
    $inster_user->execute();
    //echo "ถูกต้อง";
    $_SESSION["user_username"] = $user;
    $_SESSION["user_fullname"] = $fullname;
    $_SESSION["user_status"] = $result['0'];
    //ไม่ทำ password เพราะมันไม่ปลอดภัย
    header("Location: index.php");
} else {
    //echo "ผิด";
    header("Location: register.php?msg=invalid");
}
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
/*  
while($result = $stmt->fetch()) {
    echo "ชื่อ-นามสกุล :: " . $result["user_fullname"] ."<br />";
    
  }
*/
