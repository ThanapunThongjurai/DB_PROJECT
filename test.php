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
*/
/*
$dttm = Date("Y-m-d G:i:s");
$user_username = $_SESSION['user_username'];
$total = '30';
//*insert payment
$inster_paymebr = $conn->prepare("INSERT INTO `payment` (`pay_id`, `pay_username`, `pay_status`, `pay_price`, `pay_time`, `pay_imagelocation`) 
    VALUES (NULL, '$user_username', 'wait', '$total', NULL, NULL);");
$inster_paymebr->execute();
//หาMAX ของ payment
$stmt = $conn->prepare("SELECT max(pay_id) as pay_id FROM `payment` WHERE pay_username = '$user_username'");
$stmt->execute();
while ($result = $stmt->fetch()) {
    $max_pay_id = $result['pay_id'];
}
//echo $max_pay_id;

//*insert track 
$user_username = $_SESSION['user_username'];
$inster_track = $conn->prepare("INSERT INTO `track` (`track_id`, `track_username`, `track_owner`, `track_no`, `track_status`) 
        VALUES (NULL, '$user_username', NULL, NULL, 'wait');");
$inster_track->execute();
//หาMAX ของ payment
$max_track = $conn->prepare("SELECT max(track_id) as track_id FROM `track` WHERE track_username = '$user_username'");
$max_track->execute();
while ($result = $max_track->fetch()) {
    $max_track_id = $result['track_id'];
}
//echo $max_track_id;

//*insert order
$inster_orders = $conn->prepare("INSERT INTO `orders` (`order_id`, `order_username`, `pay_id`, `track_id`, `order_date`) 
    VALUES (NULL, '$user_username', '$max_pay_id', '$max_track_id', '$dttm');");
$inster_orders->execute();

*/
/*
foreach ($_SESSION['cart'] as $item_id => $qty) {

    $item_calling = $conn->prepare("SELECT * FROM item WHERE id_item='$item_id'");
    $item_calling -> execute();
    //$item_calling_result = $item_calling->fetch();
    
    echo $item_id["id_item"] ."<br />";


    
    $sql3    = "select * from product where p_id=$p_id";
    $query3    = mysqli_query($conn, $sql3);
    $row3    = mysqli_fetch_array($query3);
    $total    = $row3['p_price'] * $qty;

    $sql4    = "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total')";
    $query4    = mysqli_query($conn, $sql4);
    
}
*/
foreach ($_SESSION['cart'] as $id_item => $qty) {
    $item_to_order = $conn->prepare("SELECT * FROM `item` WHERE id_item = '$id_item'");
    $item_to_order->execute();                            
    $row = $item_to_order->fetch();
    //echo "ชื่อitem_name :: " . $row["item_name"];
    //echo "ชื่อitem_price :: " .  $row['item_price'];
    //echo "ชื่อ  qty :: " .$qty;//จำนวนของที่ต้องการ
    //echo "<br />";
}