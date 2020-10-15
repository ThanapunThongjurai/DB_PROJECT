<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Confirm</title>
</head>

<body>

    <!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
    <?php
    /*
    $name = $_REQUEST["name"];
    $address = $_REQUEST["address"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    */

    //$total_qty = $_REQUEST["total_qty"];
    $total = $_SESSION["total"];
    //echo $total;
    $dttm = Date("Y-m-d G:i:s");
    $user_username = $_SESSION['user_username'];

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
    //หาMAX ของ track 
    $max_track = $conn->prepare("SELECT max(track_id) as track_id FROM `track` WHERE track_username = '$user_username'");
    $max_track->execute();
    while ($result = $max_track->fetch()) {
        $max_track_id = $result['track_id'];
    }
    //echo $max_track_id;

    //*insert order
    echo $user_username;
    $inster_orders = $conn->prepare("INSERT INTO `orders` (`order_id`, `order_username`, `pay_id`, `track_id`, `order_date`) 
    VALUES (NULL, '$user_username', '$max_pay_id', '$max_track_id', '$dttm');");
    $inster_orders->execute();
    //หาMAX ของ order
    $max_order = $conn->prepare("SELECT max(order_id) as order_id FROM `orders` WHERE order_username = '$user_username'");
    $max_order->execute();
    while ($result = $max_order->fetch()) {
        $max_order_id = $result['order_id'];
    }
    //echo $user_username;
    ///echo $max_order_id;
    //*prepare for order_no


    //echo $max_order_id;
    foreach ($_SESSION['cart'] as $id_item => $qty) {



        $item_to_order_calling = $conn->prepare("SELECT * FROM `item` WHERE id_item = '$id_item'");
        $item_to_order_calling->execute();
        $row = $item_to_order_calling->fetch();


        echo "ชื่อitem_name :: " . $row["item_name"];
        echo "ชื่อitem_price :: " .  $row['item_price'];
        echo "ชื่อ  qty :: " . $qty; //จำนวนของที่ต้องการ
        echo "<br />";

        $item_id = $row["item_name"];

        $item_to_order_no = $conn->prepare("INSERT INTO `orders_no` (`orders_no`, `order_no_id`, `order_no_item`, `order_no_amount`) 
        VALUES (NULL, '$max_order_id', '$item_id', '$qty');");

        //*update amount


        $item_to_order_no->execute();
        $cap = $row['item_amount'] - $qty;
        echo $cap;
        
        $inster_item_image = $conn->prepare("UPDATE `item` SET `item_amount`='$cap' WHERE `id_item` = '$id_item';");
        $inster_item_image->execute();



        /*
        $sql3    = "select * from product where p_id=$p_id";
        $query3    = mysqli_query($conn, $sql3);
        $row3    = mysqli_fetch_array($query3);
        $total    = $row3['p_price'] * $qty;

        $sql4    = "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total')";
        $query4    = mysqli_query($conn, $sql4);
        */
    }
    foreach ($_SESSION['cart'] as $id_item) {
        unset($_SESSION['cart'][$id_item]);
        unset($_SESSION['cart']);
        header("Location:order_user.php");
    }
    unset($_SESSION['total']);

    /*
    
    //PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
    foreach ($_SESSION['cart'] as $p_id => $qty) {
        $sql3    = "select * from product where p_id=$p_id";
        $query3    = mysqli_query($conn, $sql3);
        $row3    = mysqli_fetch_array($query3);
        $total    = $row3['p_price'] * $qty;

        $sql4    = "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total')";
        $query4    = mysqli_query($conn, $sql4);
    }

    if ($query1 && $query4) {
        mysqli_query($conn, "COMMIT");
        $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
        foreach ($_SESSION['cart'] as $p_id) {
            //unset($_SESSION['cart'][$p_id]);
           
            unset($_SESSION['cart']);
        }
         //unset($_SESSION['total']);
    } else {
        mysqli_query($conn, "ROLLBACK");
        $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
    }
    */
    ?>
    <script type="text/javascript">
        //alert("<?php echo $msg; ?>");
        //window.location = 'product.php';
    </script>

</body>

</html>