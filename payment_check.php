<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
}

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>your_PAYMENT</title>
</head>


<body>
    <?php include_once (__DIR__) . ('/include/navbar2.php');

    ?>

    <div class="container mt-3 card">
        <h1 >เช็คการชำระเงินของลูกค้า</h1>
        <div class="col-12">
            <div class=" card table-responsive">
                <table class="table dark">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">รหัส ORDER</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">หลักฐาน</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $call_payment = $conn->prepare("SELECT * FROM payment where pay_status = 'check'");
                        $call_payment->execute();

                        





                        while ($result = $call_payment->fetch()) {
                            $pay_id =$result["pay_id"];
                            $find_order_id  = $conn->prepare("SELECT order_id FROM orders where pay_id = '$pay_id' ");
                            $find_order_id->execute();
                            $result_find_order_id  = $find_order_id->fetch();
                            $order_id = $result_find_order_id['order_id'];
                        ?>
                            <tr>
                                <th><a href="order_detail.php?order_id=<?php echo $order_id; ?>">#<?php echo $order_id; ?></a></th>
                                <td><?php echo $result["pay_time"]; ?><p>ราคา : <?php echo $result["pay_price"]; ?></p>
                                </td>
                                <td><a href="image/payment/<?php echo $result["pay_imagelocation"] ?>"><img src="image/payment/<?php echo $result["pay_imagelocation"] ?>" width="200px"></a></td>
                                <td>
                                    <a href="payment_check_SQL.php?pay_id=<?php echo $result["pay_id"]; ?>&action=ok" type="button" class="btn btn-outline-info">เรียบร้อยดีจัดส่งเลย</a>
                                    <a href="payment_check_SQL.php?pay_id=<?php echo $result["pay_id"]; ?>&action=fail" type="button" class="btn btn-outline-danger">หลักฐานใช้ไม่ได้ให้ไปส่งมาใหม่</a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>