<?php
date_default_timezone_set('Asia/Bangkok');
$servername = "localhost";
$dbname = "thanapun.th";
$username = "thanapun.th";
$password = "yOwd1uaehg8AIKBt";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec ("SET NAMES \"utf8\"");
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
