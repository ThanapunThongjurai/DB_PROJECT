<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_type = $_POST['item_type'];
$item_disc = $_POST['item_disc'];
$item_preview = $_POST['item_preview'];
$item_amount = $_POST['item_amount'];


$target_dir = "image/item/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $itemlocation = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])).'';
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
echo $itemlocation;
//$stmt = $conn->prepare("SELECT * FROM user"); // sql command
$stmt = $conn->prepare("SELECT item_name FROM `item` WHERE item_name = '$item_name'");
$stmt->execute();                               // run sql before
$result = $stmt->fetch();
echo $itemlocation;
if (($item_name != $result["item_name"]) && $item_name != "") {

    $inster_item = $conn->prepare("INSERT INTO `item` (`id_item`, `item_name`, `item_price`, `item_type`, `item_disc`, `item_preview`, `item_amount`, `imagelocation`) 
    VALUES (NULL, '$item_name', '$item_price', '$item_type', '$item_disc', '$item_preview', '$item_amount', '$itemlocation');");
    $inster_item->execute();
    echo "<br>ไฟล์ถูกเก็บอยู่ที่นี้นะโว้ย ". $itemlocation;
    //header("Location: admin.php");
} else {
    echo "ผิด";
    //header("Location: item_insert.php?msg=invalid");
}
//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
/*  
while($result = $stmt->fetch()) {
    echo "ชื่อ-นามสกุล :: " . $result["user_fullname"] ."<br />";
    
  }
*/
