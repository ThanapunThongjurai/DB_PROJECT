<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connect.php');
$pay_id = $_REQUEST['pay_id'];
$find_pay_id  = $conn->prepare("SELECT order_id FROM orders where pay_id = '$pay_id' ");
$find_pay_id->execute();
$result_find_pay_id  = $find_pay_id->fetch();
$order_id = $result_find_pay_id["order_id"];
//echo $order_id;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Hello, world!</title>
</head>
<style tpye="text/css">
    body {
        background-image: url('image/wall.jpg');
        -webkit-background-size: cover;
        background-attachment: fixed;
    }
</style>

<body>
<?php include ('header.inc.php'); ?>
    <?php include_once (__DIR__) . ('/include/navbar.php');

    ?>

    <div class="container mt-3">
        <h1>แจ้งชำระเงิน </h1>
        <h2>หมายเลขธุระกรรม #<?php echo $pay_id; ?> หมายเลข <a href="order_detail.php?order_id=<?php echo $order_id; ?>">ORDER #<?php echo $order_id; ?></a></h2>
        <div class="col-12">
            <div class=" card table-responsive">
                <h3>สิ่งของใน order</h3>
                <table class="table dark">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">รวม</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $count = 1;
                        $total = 0;
                        $call_order_item = $conn->prepare("SELECT * FROM orders_no where order_no_id ='$order_id' ");
                        $call_order_item->execute();


                        while ($result = $call_order_item->fetch()) { ?>
                            <tr>
                                <?php
                                $item_id = $result["order_no_item"];
                                $call_item = $conn->prepare("SELECT * FROM item where id_item ='$item_id' ");
                                $call_item->execute();
                                $result_item = $call_item->fetch();
                                ?>

                                <th scope="row"><?php echo $count; ?></th>
                                <td><a href="item_detail.php?id_item=<?php echo $result_item['id_item']; ?>"><img src="image/item/<?php echo $result_item["imagelocation"] ?>" alt="..." class="   " height="50px"> <?php echo $result_item["item_name"]; ?></a></td>
                                <td><?php echo $result["order_no_amount"]; ?> ชิ้น</td>
                                <td><?php echo $result["order_no_amount"] * $result_item["item_price"]; ?> บาท</td>
                                <!-- <?php $total = $total + $result["order_no_amount"] * $result_item["item_price"]; ?> -->
                            </tr>
                        <?php
                            $count++;
                        }
                        ?>
                        <!-- //*! datepicker */ -->

                    </tbody>

                </table>


                <h3 style="text-align:right">ราคารวม <?php
                                                        $call_price = $conn->prepare("SELECT pay_price FROM `payment` WHERE pay_id ='$pay_id' ");
                                                        $call_price->execute();
                                                        $result_price = $call_price->fetch();
                                                        echo $result_price["pay_price"]; ?> บาท.</h3>

                <form action="paymnet_update_SQL.php?pay_id=<?php echo $pay_id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">วันที่ชำระเงิน* : </label>
                        <input type="date" name="DATE" required>
                    </div>
                    <div class="form-group">
                        <label for=""> เวลาโดยประมาณ* : </label>
                        <input type="time" id="TIME" name="TIME" required>
                    </div>

                    <label for=""> หลักฐานการโอน* : </label>

                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>