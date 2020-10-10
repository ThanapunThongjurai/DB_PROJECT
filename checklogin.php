<?php

require_once('connect.php');

$user = $_POST['USERNAME'];
$pass = $_POST['PASSWORD'];

echo "username: " .  $user . "<br />";
echo "password: " .  $pass . "<br />";

$stmt = $conn->prepare("SELECT * FROM user"); // sql command
$stmt->execute();                               // run sql before

//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
while($result = $stmt->fetch()) {
    echo "ชื่อ-นามสกุล :: " . $result["user_fullname"] ."<br />";
  }
